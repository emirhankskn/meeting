<!DOCTYPE html>
<html lang="en">

<?php include ("templates/_adminhead.php") ?>


<body>
  <?php include ("templates/_adminheader.php") ?>


  <div class="main-container">

    <?php include ("templates/_adminnav.php") ?>

    <!-- CONTENT -->
    <?php include ("dash-properties.php"); ?>
    <div class="table-container">
      <table class="table table-hover table-bordered text-center ">
        <thead class="table-info">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Serial</th>
            <th scope="col">Days Left</th>
            <th scope="col">Register Date</th>
            <th scope="col">Plan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $userData = getAllUserData($db);
          if ($userData):
            foreach ($userData as $user):
              $ID = $user['ID'];
              $full_name = $user['full_name'];
              $username = $user['username'];
              $email = $user['email'];
              $serial = $user['serial'];
              $expire_date = $user['expire_date'];
              $reg_date = $user['reg_date'];
              $plan = $user['plan'];
              ?>
              <tr>
                <th scope="row"><?php echo $ID; ?></th>
                <td><?php echo $full_name; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo isset($serial) ? $serial : '_____-_____-_____-_____-_____'; ?></td>
                <td><?php echo isset($expire_date) ? $expire_date : '-'; ?></td>
                <td><?php echo $reg_date; ?></td>
                <td>
                  <p class="label-tag-<?php echo $plan ?>"><?php echo isset($plan) ? $plan : 'none'; ?></p>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- CONTENT -->

  </div>


  <?php include ("templates/_adminscripts.php"); ?>

</body>

</html>