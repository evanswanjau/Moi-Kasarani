<?php
  session_start();
  //Importing the database connection
  require 'connection.php';
 ?>
<!DOCTYPE html>
<html>
<!--Beggining of the header-->
  <head>
    <meta charset="utf-8">
    <title>Login | Moi Kasarani Ticket Booking System</title>
    <!--Link for CSS styling-->
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="container">
      <h2>Moi Kasarani Online Ticketing System</h2>
      <h3>Login</h3>
      <!--Here is the login form-->
      <div class="login">
        <form class="login_form" action="" method="post"><br>
          <input type="text" name="username" placeholder="username"><br>
          <input type="password" name="password" placeholder="password"><br>
          <input class="button" type="submit" name="submit" value="Submit"><br>
          <a class="link" href="register.php">Not yet registered?</a><br><br>
        </form>
        <?php
        //This will only happen when the submit button is clicked
          if(isset($_POST['submit'])){
            //This then creates the array for the errors that we are going to append(add) to it
            $errors = array();
            //We have to ensure that the inputs are not empty
            if(!empty($_POST['username']) && !empty($_POST['password'])){
              //If the inputs are not empty we assign the variables with the inputs given
              $username = $_POST['username'];
              $password = sha1($_POST['password']);
            }else {
              //Error if the inputs are empty
              $errors[] = '<p class="err">You need to input both values</p>';
            }
            //If the errors array is empty then
            if(empty($errors)){
              //Select the data with the specific username and check whether the data is the same with the input given
              $query = "SELECT username FROM users WHERE username = '$username' AND password = '$password'";
              $result = $conn->query($query);
              //If the number of rows returned is less than one that means the user doesn't exist or has put incorrect details
              if($result->num_rows < 1){
                echo '<p class="err">Login details incorrect</p>';
              }else if($result->num_rows == 1){
                //If its equal to one then the details are correct
                echo '<p class="err">login successful</p>';
                $_SESSION["username"] = $username;
                header('Location: events.php');
              }
            }else{
              //Using foreach function to echo out the errors
             foreach ($errors as $error) {
               echo $error;
             }
           }
          }
         ?>
      </div>
    </div>
  </body>
</html>
