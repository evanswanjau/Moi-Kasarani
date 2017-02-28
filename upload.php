<?php
  require 'connection.php'
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>POST | Moi Kasarani Ticket Booking System</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="container" style="background-color:#727272">
      <form class="upload_form" action="" method="post">
        <input type="text" name="event" placeholder="Event Name*"><br>
        <input type="text" name="rprice" placeholder="Regular Price*"><br>
        <input type="text" name="vprice" placeholder="VIP Price"><br>
        <input type="date" name="sdate" placeholder="Start Date*"><br>
        <input type="date" name="edate" placeholder="End date"><br>
        <input type="text" name="tickets" placeholder="Number of tickets*"><br>
        <input class="button"type="submit" name="submit" value="Submit">
      </form>
      <?php
        if(isset($_POST['submit'])){
          if(empty($_POST['event']) && empty($_POST['rprice']) && empty($_POST['sdate']) && empty($_POST['tickets'])){
            echo '<p class="err">Some important values may have not been input<br>Event Name*<br>Regular Price*<br>Start Date*<br>Number of tickets*</p>';
          }else {
            $event = $_POST['event'];
            $rprice = $_POST['rprice'];
            $vprice = $_POST['vprice'];
            $sdate = $_POST['sdate'];
            $edate = $_POST['edate'];
            $tickets = $_POST['tickets'];

            $sql = "INSERT INTO events (eventname, regular, vip, startdate, enddate, tickets)
                  VALUES ('$event', '$rprice', '$vprice', '$sdate', '$edate', '$tickets')";

                  if ($conn->query($sql) === TRUE) {
                    echo "<p class='success'>Event created succesfully</p>";
                    header('Location: events.php');
                  }else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
          }
        }
       ?>
    </div>
  </body>
</html>
