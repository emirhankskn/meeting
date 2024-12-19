<?php
include ('config.php');

session_start();

function emailExists($email, $db)
{
  $query_admins = "SELECT COUNT(*) as count FROM admins WHERE email = :email";
  $statement_admins = $db->prepare($query_admins);
  $statement_admins->bindParam(':email', $email);
  $statement_admins->execute();
  $result_admins = $statement_admins->fetch(PDO::FETCH_ASSOC);

  $query_users = "SELECT COUNT(*) as count FROM users WHERE email = :email";
  $statement_users = $db->prepare($query_users);
  $statement_users->bindParam(':email', $email);

  $statement_users->execute();
  $result_users = $statement_users->fetch(PDO::FETCH_ASSOC);

  if ($result_admins['count'] > 0 or $result_users['count'] > 0) {
    return true;
  } else {
    return false;
  }
}

function IP()
{
  // Gerçek IP adresini almak için kontrol edilecek olası başlıklar
  $headers = array(
    'HTTP_CLIENT_IP',
    'HTTP_X_FORWARDED_FOR',
    'REMOTE_ADDR'
  );

  foreach ($headers as $header) {
    if (isset($_SERVER[$header]) && !empty($_SERVER[$header])) {
      // Birden çok IP adresi varsa, sadece ilkini al
      $ip_list = explode(',', $_SERVER[$header]);
      return trim($ip_list[0]);
    }
  }

  // Hiçbir IP adresi bulunamazsa boş döndür
  return '';
}




if (isset($_POST['register'])) {
  $email = $_POST['email'];
  if (emailExists($email, $db)) {
    echo "<script> flash('E-mail you entered already exists.', 'alert-warning'); </script>";
  } else {
    $add = $db->prepare("INSERT INTO Users SET
          fname = :fname,
          surname = :surname,
          username = :username,
          email = :email,
          passwd = :passwd,
          agree_terms = :agree_terms
      ");

    $control = $add->execute(
      array(
        'fname' => $_POST['name'],
        'surname' => $_POST['surname'],
        'username' => $_POST['username'],
        'email' => $email,
        'passwd' => $_POST['password'],
        'agree_terms' => isset($_POST['agree_terms']) ? 1 : 0
      )
    );
    if ($control) {
      $newUserID = $db->lastInsertId();

      $log_query = "INSERT INTO log_data SET
          userID = :userID,
          userIP = :userIP,
          msg = :msg";
      $log_add = $db->prepare($log_query);
      $log_control = $log_add->execute([
        'userID' => $newUserID,
        'userIP' => IP(),
        'msg' => "Register process successful for email: $email."
      ]);

      if (!$log_control)
        echo "<script> flash('Error while adding log entry.', 'alert-danger'); </script>";


      $_SESSION['register_success'] = true;

      header('Location: index.php');
      exit;
    } else {
      $log_query = "INSERT INTO log_data SET
          userIP = :userIP,
          msg = :msg";
      $log_add = $db->prepare($log_query);
      $log_control = $log_add->execute([
        'userIP' => IP(),
        'msg' => "Register attempt failed for email: $email !",
      ]);
      echo "<script> flash('Unknown Error !.', 'alert-danger'); </script>";
    }


  }
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = $db->prepare("
      SELECT * FROM 
      (
          SELECT 'users' AS user_type, ID, username, email, passwd FROM users
          UNION
          SELECT 'admins' AS user_type, ID, username, email, passwd FROM admins
      )
      AS combined WHERE email = :email AND passwd = :password ");

  $query->execute(['email' => $email, 'password' => $password]);
  $user = $query->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    $log_query = "INSERT INTO log_data SET
          userID = :userID,
          userIP = :userIP,
          msg = :msg";
    $log_add = $db->prepare($log_query);

    $msg = '';
    if ($user['user_type'] == 'users')
      $msg = "Login succesfull for email: $email";
    elseif ($user['user_type'] == 'admins')
      $msg = "[ADMIN] Login successfully";

    $log_control = $log_add->execute([
      'userID' => $user['ID'],
      'userIP' => IP(),
      'msg' => $msg
    ]);

    $_SESSION['ID'] = $user['ID'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['user_type'] = $user['user_type'];
    $_SESSION['logged_in'] = true;
    $_SESSION['login_success'] = true;

    if ($user['user_type'] == 'admins') {
      $_SESSION['user_type'] = "admin";
      header('Location: index.php');
    } else {
      $_SESSION['user_type'] = "user";
      header('Location: index.php');
    }
    exit;
  } else {
    $log_query = "INSERT INTO log_data SET
          userIP = :userIP,
          msg = :msg";
    $log_add = $db->prepare($log_query);
    $log_control = $log_add->execute([
      'userIP' => IP(),
      'msg' => "Login attempt failed for email: $email"
    ]);

    header('Location: index.php');
    exit;
  }
}



if (isset($_POST['logout'])) {
  $log_query = "INSERT INTO log_data SET
      userID = :userID,
      userIP = :userIP,
      msg = :msg";
  $log_add = $db->prepare($log_query);

  $msg = '';
  if ($_SESSION['user_type'] == 'user')
    $msg = "Logout succesfull for email: " . $_SESSION['email'];
  elseif ($_SESSION['user_type'] == 'admin')
    $msg = "[ADMIN] Logout successfully";

  $log_control = $log_add->execute(
    array(
      'userID' => $_SESSION['ID'],
      'userIP' => IP(),
      'msg' => $msg
    )
  );

  if (!$log_control)
    echo "<script> flash('Error while adding log entry.', 'alert-danger'); </script>";

  session_destroy();
  header("Location:index.php");
  exit;
}




function createSerial()
{
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789';
  $part_length = 5;
  $part_times = 5;
  $parts = array();

  for ($i = 1; $i <= $part_times; $i++) {
    $part = '';
    for ($j = 1; $j <= $part_length; $j++) {
      $part .= $characters[rand(0, strlen($characters) - 1)];
    }
    $parts[$i] = $part;
  }
  return implode('-', $parts);
}
#NOT: Sadece %0.00000000000000000000000000000000000000000000000000000000002036 olasılıkla aynı serial üretilebilir. 


function definePlan()
{
  if (isset($_POST['create-serial-pro']))
    return ['pro', 10];
  else
    return ['def', 5];
}

if (isset($_POST['create-serial-pro']) or isset($_POST['create-serial-def'])) {
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    $user_email = $_SESSION['email'];
    $plan = definePlan()[0];
    $price = definePlan()[1];
    $serial_key = createSerial();

    $validity_days = 30;
    $expire_date = date("Y-m-d H:i:s", strtotime("+{$validity_days} days"));

    $statement = $db->prepare("UPDATE users SET plan = :plan, price = :price, serial = :serial, expire_date = :expire_date WHERE email = :email");
    $statement->bindParam(':plan', $plan);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':serial', $serial_key);
    $statement->bindParam(':expire_date', $expire_date);
    $statement->bindParam(':email', $user_email);

    if ($statement->execute()) {
      $log_query = "INSERT INTO log_data SET
      userID = :userID,
      userIP = :userIP,
      msg = :msg";
      $log_add = $db->prepare($log_query);

      $log_control = $log_add->execute(
        array(
          'userID' => $_SESSION['ID'],
          'userIP' => IP(),
          'msg' => "Serial key created succesfully for email: $user_email"
        )
      );

      if (!$log_control)
        echo "<script> flash('Error while adding log entry.', 'alert-danger'); </script>";


      echo '<script> alert("Serial key created successfully. Your serial key: \n' . $serial_key . '"); window.location.href = "index.php"; </script>';
    } else {
      echo '<script> alert("Error occurred while creating serial key."); window.location.href = "index.php"; </script>';
    }

  } else {
    echo '<script> alert("You have to log in before subscribing to the application."); window.location.href = "index.php"; </script>';
  }
}



if (isset($_POST['send-message'])) {
  $add = $db->prepare("INSERT INTO messages SET
      cname = :cname,
      cemail = :cemail,
      csubject = :csubject,
      cmessage = :cmessage
  ");
  $control = $add->execute(
    array(
      'cname' => $_POST['name'],
      'cemail' => $_POST['email'],
      'csubject' => $_POST['subject'],
      'cmessage' => $_POST['message']
    )
  );

  if ($control) {
    $log_query = "INSERT INTO log_data SET
      userIP = :userIP,
      msg = :msg";
    $log_add = $db->prepare($log_query);

    $log_control = $log_add->execute(
      array(
        'userIP' => IP(),
        'msg' => "Sended contact message for email: " . $_POST['email']
      )
    );
    if (!$log_control)
      echo "<script> alert('Error while adding log entry.'); </script>";

    $_SESSION['msg_success'] = true;
    header('Location: index.php');
  } else
    echo "<script> flash('Unknown Error !', 'alert-danger'); </script>";
}




?>