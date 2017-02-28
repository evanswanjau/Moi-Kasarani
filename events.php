<?php
  session_start();
  require 'connection.php';
 ?>
<!DOCTYPE html>
<html>
<!--Beginning of the tickets header-->
  <head>
    <meta charset="utf-8">
    <title>Events | Moi Kasarani Ticket Booking System</title>
    <!--Link for CSS styling-->
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="menu">
      <ul>
        <a href="upload.php"><li>Upload Event</li></a>
        <form action="" method="post">
          <button type="submit" name="logout">Logout</button>
        </form>
        <?php
          if(isset($_POST['logout'])){
            session_destroy();
            header("Location: index.php");
          }
         ?>
      </ul>
    </div>
    <?php echo 'Welcome ' . $_SESSION['username'] ?>
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
                <p><b>" . $row['startdate'] . "</b></p>
                <p><b>Tickets remaining:<b>" . $row['tickets'] . "</p><br><br>
                <form action='ticket.php' method = 'GET'>
                <input type='hidden' name='ticket' value=".$row['id']."'>
                <button type='submit'>book ticket</button>
                </form>
                </div>";
            }
          }
         ?>
      </div>
    </div>
  </body>
</html>
