<?php
//importing the database connection
  require 'connection.php';

  //This will only happen when the buttin is clicked
  if(isset($_POST['submit'])){
    //We have created an array that will store all our errors
    $errors = array();

    //We need to ensure that no field is empty
    if(!empty($_POST['email']) && !empty($_POST['username']) && !empty('password') && !empty('password2')){
      /*
        If all the fields have been input then...
        we initited varibles that will store the data that has been input in the forms
      */
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password2 = $_POST['password2'];

      //Check whether the passwords are similar
      if $password === $password2{
        $password = $password;
      }else {
        echo 'Passwords are not similar';
      }
    }
    else {
      //If one of the fields is empty then store this error in the variable
      $errors[] = '<p class = err>You have not input all the values</p>';
    }

    //Now that we have all the user data we need to store it in the database
    $sql = "INSERT INTO users (email, username, password)
    VALUES ('$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
      echo '<p class="success">You have been registred successfully</p>';
    }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
 ?>
<!DOCTYPE html>
<html>
<!--This is the header for registration page-->
  <head>
    <meta charset="utf-8">
    <title>Register | Moi Kasarani Ticket Booking System</title>
    <!--Link for CSS styling-->
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <!--Here's the registration form-->
    <form class="register" action="index.html" method="post">
      email:<input type="email" name="email">
      username<input type="text" name="username">
      password<input type="password" name="password">
      Confirm password<input type="password" name="password2">
      <input type="button" name="submit" value="Submit">
    </form>
  </body>
</html>
