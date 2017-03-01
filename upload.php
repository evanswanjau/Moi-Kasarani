<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location:index.php');
  }
  require 'connection.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--Beginning of the tickets header-->
    <title>POST | Moi Kasarani Ticket Booking System</title>
    <!--Link for CSS styling-->
    <link rel="stylesheet" href="main.css">
  </head>
  <body  style="background-color:#727272;">
    <!--Here the menu html code-->
    <div class="menu">
      <ul>
        <a href="events.php"><li>View Events</li></a>
        <!--Logout button-->
        <form action="" method="post">
            <input class="button" type="submit" name="logout" value="Logout">
        </form>
        <?php
        //When the user hits the logout button
          if(isset($_POST['logout'])){
            //His session is destroyed
            session_destroy();
            //And is redirected to the login page
            header("Location: index.php");
          }
         ?>
      </ul>
    </div>
    <!--This is the upload form-->
    <div style="text-align:center; padding-top:5%;">
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
      //If the user hits submit then..
        if(isset($_POST['submit'])){
          //The code checks if the important fields are empty
          if(empty($_POST['event']) && empty($_POST['rprice']) && empty($_POST['sdate']) && empty($_POST['tickets'])){
            //If they are are it returns this error
            echo '<p class="err">Some important values may have not been input<br>Event Name*<br>Regular Price*<br>Start Date*<br>Number of tickets*</p>';
          }else {
            //If there are none they are assigned to the variables below
            $event = $_POST['event'];
            $rprice = $_POST['rprice'];
            $vprice = $_POST['vprice'];
            $sdate = $_POST['sdate'];
            $edate = $_POST['edate'];
            $tickets = $_POST['tickets'];
            //After beign assigned they are inserted to the database
            $sql = "INSERT INTO events (eventname, regular, vip, startdate, enddate, tickets)
                  VALUES ('$event', '$rprice', '$vprice', '$sdate', '$edate', '$tickets')";
                  //If they have been insterted then...
                  if ($conn->query($sql) === TRUE) {
                    //Echo this success paragraph
                    echo "<p class='success'>Event created succesfully</p>";
                    header('Location: events.php');
                  }else{
                    //If not return this error
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
          }
        }
       ?>
    </div>
  </body>
</html>
