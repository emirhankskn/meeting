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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $messagesData = getMessages($db);
          if ($messagesData):
            foreach ($messagesData as $message):
              $ID = $message['ID'];
              $name = $message['cname'];
              $email = $message['cemail'];
              $subject = $message['csubject'];
              $message = $message['cmessage'];
              ?>
              <tr>
                <th scope="row"><?php echo $ID; ?></th>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $subject; ?></td>
                <td><?php echo $message ?></td>
                <td>
                  <form action="dash-properties.php" method="POST">
                    <input type="hidden" name="msg_id" value="<?php echo $ID; ?>">
                    <button type="submit" name="delete-msg" class="btn btn-sm btn-danger">Delete</button>
                  </form>
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