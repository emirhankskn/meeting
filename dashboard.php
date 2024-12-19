<!DOCTYPE html>
<html lang="en">

<?php include ("templates/_adminhead.php"); ?>

<body>

  <?php include ("templates/_adminheader.php") ?>

  <div class="main-container">

    <?php include ("templates/_adminnav.php"); ?>

    <!-- CONTENT -->
    <?php include ("dash-properties.php"); ?>
    <div class="main">
      <div class="box-container">

        <div class="box box1">
          <div class="text">
            <h2 class="topic-heading">18.7k</h2>
            <h2 class="topic">Page View</h2>
          </div>
          <ion-icon class="icn-boxes" name="eye-outline"></ion-icon>
        </div>

        <div class="box box2">
          <div class="text">
            <h2 class="topic-heading"><?php echo calculate($db, 'count_members'); ?></h2>
            <h2 class="topic">Members</h2>
          </div>

          <ion-icon class="icn-boxes" name="people-outline"></ion-icon>
        </div>

        <div class="box box3">
          <div class="text">
            <h2 class="topic-heading"><?php echo calculate($db, 'count_users'); ?></h2>
            <h2 class="topic">Users</h2>
          </div>

          <ion-icon class="icn-boxes" name="radio-outline"></ion-icon>
        </div>

        <div class="box box4">
          <div class="text">
            <h2 class="topic-heading"><?php echo calculate($db, 'calculate_gain') ?> $</h2>
            <h2 class="topic">Per / Month</h2>
          </div>

          <ion-icon class="icn-boxes" name="cash-outline"></ion-icon>
        </div>
      </div>

      <table class="table table-hover table-bordered text-center mt-5">
        <thead class="table-info">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Days Left</th>
            <th scope="col">Plan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $userData = getAllUserData($db, 9);
          if ($userData):
            foreach ($userData as $user):
              $ID = $user['ID'];
              $full_name = $user['full_name'];
              $email = $user['email'];
              $plan = $user['plan'];
              $expire_date = $user['expire_date'];
              ?>
              <tr>
                <th scope="row"><?php echo $ID; ?></th>
                <td><?php echo $full_name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo isset($expire_date) ? $expire_date : '-'; ?></td>
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