<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location:index.php');
  }
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
  <body class="events">
    <!--Here the menu html code-->
    <div class="menu">
      <ul>
        <a href="upload.php"><li>Upload Event</li></a>
        <!--Logout button-->
        <form action="" method="post">
          <input class="button" type="submit" name="logout" value="Logout">
        </form>
        <?php
        //When the user hits the logout button
          if(isset($_POST['logout'])){
            //His session is destroyed
            session_destroy();
            //And the website is redirected to the login page
            header("Location: index.php");
          }
         ?>
      </ul>
    </div>
    <!--Welcome message when the user logs in-->
    <?php echo "<p class='success' style='text-align: center; color:black;'>Welcome " . $_SESSION['username']. "</p>" ?>
    <div class="container-fluid">
      <div class="row">
        <?php
        //Selects all the fields from the events table by order of date from the closest date
          $sql = "SELECT * FROM events ORDER BY `startdate` DESC";
          $result = $conn->query($sql);
          //If the number of rows is greater than zero. It means that data exists
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              //The data is displayed in html tags
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
                </div>";//The form in the code above gets the event id to the ticket page
            }
          }
         ?>
      </div>
    </div>
  </body>
</html>
