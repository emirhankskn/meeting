<?php

include ("config.php");

#CALCULATE NUMBERS
function calculate($db, $process)
{
  if ($process == 'count_members')
    $query = "SELECT COUNT(*) AS member_count FROM users";
  else if ($process == 'count_users')
    $query = "SELECT COUNT(*) AS user_count FROM users WHERE serial IS NOT NULL";
  else if ($process == 'calculate_gain')
    $query = "SELECT SUM(price) AS total FROM users";

  try {
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($process == 'count_members')
      return $result['member_count'];
    else if ($process == 'count_users')
      return $result['user_count'];
    else if ($process == 'calculate_gain')
      return $result['total'];

  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
  }
}
#CALCULATE NUMBERS


#READ USER DATA
function getAllUserData($db, $limit = null)
{
  $query = "SELECT ID, CONCAT(fname, ' ', surname) AS full_name, username, email, serial, 
    plan, TIMESTAMPDIFF(DAY, CURDATE(), expire_date) AS expire_date, reg_date FROM users ORDER BY ID DESC";

  if ($limit != null)
    $query .= " LIMIT $limit";

  try {
    // Sorguyu hazırla ve çalıştır
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return null;
  }
}
#READ USER DATA


#READ MESSAGE
function getMessages($db)
{
  $query = "SELECT ID, cname, cemail, csubject, cmessage, msg_date FROM messages ORDER BY ID DESC";
  try {
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;

  } catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    return null;
  }
}
#READ MESSAGE



#DELETE MESSAGE
if (isset($_POST['delete-msg'])) {
  $msg_id = $_POST['msg_id'];

  // JavaScript onay kutusu oluştur
  echo '<script>
            var confirmDelete = confirm("Are you sure you want to delete this message?");
            if (confirmDelete) {
                window.location.href = "dash-properties.php?delete=true&msg_id=' . $msg_id . '";
            } else {
                window.location.href = "inbox.php";
            }
        </script>';
}

if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
  $msg_id = $_GET['msg_id'];
  $delete_query = $db->prepare("DELETE FROM messages WHERE ID = :msg_id");
  $delete_result = $delete_query->execute(array('msg_id' => $msg_id));

  if ($delete_result) {
    echo "<script>alert('Message deleted successfully.');</script>";
    header('Location: inbox.php');
    exit;

  } else
    echo "<script>alert('Failed to delete message.');</script>";
}
#DELETE MESSAGE


#TAKE USER IP FOR LOG DATA
function IP()
{
  if (getenv("HTTP_CLIENT_IP"))
    $ip = getenv("HPPT_CLIENT_IP");
  elseif (getenv("HTTP_X_FORWARDED_FOR")) {
    $ip = getenv("HTTP_X_FORWARDED_FOR");

    if (strstr($ip, ',')) {
      $tmp = explode(',', $ip);
      $ip = trim($tmp[0]);
    }
  } else {
    $ip = getenv("REMOTE_ADDR");
  }
  return $ip;
}
#TAKE USER IP FOR LOG DATA


#READ LOG DATA
function getLogData($db, $limit = null)
{
  $query = "SELECT ID, userID, userIP, msg, date_time FROM log_data ORDER BY ID DESC";

  if ($limit != null)
    $query .= " LIMIT $limit";

  try {
    // Sorguyu hazırla ve çalıştır
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return null;
  }
}
#READ LOG DATA

?>