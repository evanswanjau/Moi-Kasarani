<?php
    //This is the code that connects us to the database
    /*The code below assigns variable login properties*/
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "kasarani_db";

    // Create connection using the assigned varibales
    $conn = new mysqli($servername, $user, $password, $dbname);
    // Check connection | if connection is not connected it will return an errror
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
 ?>
