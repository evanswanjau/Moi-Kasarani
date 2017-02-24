<?php
  session_start();
  require 'connection.php';
 ?>
<!DOCTYPE html>
<html>
<!--Beginning of the tickets header-->
  <head>
    <meta charset="utf-8">
    <title>Tickets | Moi Kasarani Ticket Booking System</title>
    <!--Link for CSS styling-->
    <link rel="stylesheet" href="main.css">
  </head>
  <body style="background-color:black">
    <div class="events container-fluid">
      <div class="row">
        <?php
          $sql = "SELECT * FROM events ORDER BY `startdate` DESC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<div class='event col-sm-3'>
                <h1>". $row['eventname'] . "</h1>
                <p><b>Regular:</b> " . $row['regular'] . "Ksh</p>
                <p><b>VIP:</b> " . $row['vip'] . "Ksh</p><br>
                <p><b>" . $row['startdate'] . "</b></p><br><br>
                <button class='button'>book</button>
                </div>";
            }
          }
         ?>
      </div>
    </div>
  </body>
</html>
