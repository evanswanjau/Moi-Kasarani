<?php
  //Importing the database connection
  session_start();
  require 'connection.php';
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
    <div class="container">
      <h2>Moi Kasarani Online Ticketing System</h2>
      <h3>Register</h3>
      <!--Here's the registration form-->
      <form class="register" action="" method="post">
        <input type="email" name="email" placeholder="email"><br>
        <input type="text" name="username" placeholder="username"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="password" name="password2" placeholder="confirm password"><br>
        <input class="button" type="submit" name="submit" value="Submit"><br><br>
      </form>
      <?php
        //This will only happen when the buttin is clicked
        if(isset($_POST['submit'])){
          //We have created an array that will store all our errors
          $errors = array();

          //We need to ensure that no field is empty
          if(!empty($_POST['email']) && !empty($_POST['username']) && !empty('password') && !empty('password2')){
            /*
              If all the fields have been input then...
              we initiate varibles that will store the data that has been input in the forms
            */
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            //Check whether the passwords are similar
            if($password === $password2){
              $password = sha1($password);
            }else {
              //Add the error in the errors array if passwords are not similar
              $errors[] = '<p class="err">Passwords are not similar</p>';
            }
          }
          else {
            //If one of the fields is empty then store this error in the variable
            $errors[] = '<p class="err">You have not input all the values</p>';
          }

          //If the errors array is empty add the data to the database
          if(empty($errors) == true){
            //Now that we have all the user data we need to store it in the database
            $sql = "INSERT INTO users (email, username, password)
            VALUES ('$email', '$username', '$password')";
            //if the query is true return the success notification
            if ($conn->query($sql) === TRUE) {
              echo '<p class="success">You have been registered successfully</p>';
              $_SESSION["username"] = $username;
              header('Location: events.php');
            }else{
              //else if the query is not true return an sql error
              $errors[] = "Error: " . $sql . "<br>" . $conn->error;
            }
          }else{
            foreach ($errors as $key) { ///If there are errors in the errors array. print out the errors using the the for each statement
              echo $key;
            }
          }
        }
       ?>
    </div>
  </body>
</html>
