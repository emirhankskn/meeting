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
      <table class="table table-hover table-bordered text-center">
        <thead class="table-info">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">User ID</th>
            <th scope="col">User IP</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $log_data = getLogData($db, 100);
          if ($log_data):
            foreach ($log_data as $log):
              $ID = $log['ID'];
              $userID = $log['userID'];
              $userIP = $log['userIP'];
              $msg = $log['msg'];
              $date_time = $log['date_time'];
              ?>
              <tr>
                <th scope="row"><?php echo $ID; ?></th>
                <td><?php echo $userID; ?></td>
                <td><?php echo $userIP; ?></td>
                <td><?php echo $msg; ?></td>
                <td><?php echo $date_time ?></td>
                
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