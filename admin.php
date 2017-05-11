<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location:index.php');
}
if($_SESSION["username"] != 'admin'){
  header('Location:index.php');
}
//Importing the database connection
  require 'connection.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <!--Beggining of the header-->
    <meta charset="utf-8">
    <title>Ticket | Moi Kasarani Ticket Booking System</title>
    <!--Link for CSS styling-->
    <link rel="stylesheet" href="main.css">
  </head>
  <body style="background-color:#282C34">
    <!--Here the menu html code-->
    <div class="menu">
      <ul>
        <a href="events.php"><li>View Events</li></a>
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
            //And is redirected to the login page
            header("Location: index.php");
          }
         ?>
      </ul>
    </div>
    <!--Welcome message when the user logs in-->
    <?php echo "<p class='success' style='text-align: center; color:black;'>Welcome " . $_SESSION['username']. "</p>" ?>
    <div class="container-fluid userdata">
      <div class="row">
        <h1>USERS</h1>
      <table>
        <tr>
          <th>ID</th>
          <th>USERNAME</th>
          <th>EMAIL</th>
        </tr>
        <?php
        //Selects all the fields from the events table by order of date from the closest date
          $sql = "SELECT * FROM users";
          $result = $conn->query($sql);
          //If the number of rows is greater than zero. It means that data exists
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              //The data is displayed in html tags
              echo "
                <div class='users'>
                <tr><td>". $row['id'] . "</td>
                <td> " . $row['username'] . "</td>
                <td> " . $row['email'] . "</td><tr>
                </div>";//The form in the code above gets the event id to the ticket page
            }
          }
         ?>
       </table>
       <h1>EVENTS</h1>
       <table>
         <tr>
           <th>ID</th>
           <th>EVENTNAME</th>
           <th>REGULAR</th>
           <th>VIP</th>
           <th>STARTDATE</th>
           <th>ENDDATE</th>
           <th>TICKETS</th>
         </tr>
         <?php
         $sql2 = "SELECT * FROM events";
         $result2 = $conn->query($sql2);
         //If the number of rows is greater than zero. It means that data exists
         if ($result2->num_rows > 0) {
           while($row2 = $result2->fetch_assoc()) {
             //The data is displayed in html tags
             echo "
               <div class='eve'>
               <tr><td>". $row2['id'] . "</td>
               <td> " . $row2['eventname'] . "</td>
               <td> " . $row2['regular'] . "</td>
               <td> " . $row2['vip'] . "</td>
               <td> " . $row2['startdate'] . "</td>
               <td> " . $row2['enddate'] . "</td>
               <td> " . $row2['tickets'] . "</td><tr>
               </div>";//The form in the code above gets the event id to the ticket page
           }
         }
          ?>
       </table>
       <h1>TICKETS</h1>
       <table>
         <tr>
           <th>ID</th>
           <th>EVENTNAME</th>
           <th>CATEGORY</th>
           <th>PRICE</th>
           <th>STARTDATE</th>
           <th>CODE</th>
         </tr>
         <?php
         $sql3 = "SELECT * FROM tickets";
         $result3 = $conn->query($sql3);
         //If the number of rows is greater than zero. It means that data exists
         if ($result3->num_rows > 0) {
           while($row3 = $result3->fetch_assoc()) {
             //The data is displayed in html tags
             echo "
               <div class='tick'>
               <tr><td>". $row3['id'] . "</td>
               <td> " . $row3['eventname'] . "</td>
               <td> " . $row3['category'] . "</td>
               <td> " . $row3['price'] . "</td>
               <td> " . $row3['startdate'] . "</td>
               <td> " . $row3['code'] . "</td><tr>
               </div>";//The form in the code above gets the event id to the ticket page
           }
         }
          ?>
       </table>
     </div>
   </div>
  </body>
</html>
