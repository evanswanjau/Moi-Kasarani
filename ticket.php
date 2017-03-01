<?php
session_start();
if(!isset($_SESSION['username'])){
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
  <body style="background-color:grey">
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
    <?php
    //After the book button is clicked in the events button
      if(isset($_GET['ticket'])){
        //Assign the ticket id to a variable called id
        $id = intval($_GET['ticket']);//The id has been converted to an integer using the inval built-in function
        $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';//This is the string that's going to generate our unique code
        $shuffle = str_shuffle($string);//str_function is a built-in function that's mixing up the values

        $half = substr($shuffle, 0, strlen($string)/4);//This is going to truncate the number of characters by 4 to create a shorter unique code
        //Here we select from the events table where the id is similar to the event clicked in events book button
        $sql = "SELECT * FROM events WHERE id = ".$id."";
        $result = $conn->query($sql);
        //The returned query should be equal to one. Since it exists
        if ($result->num_rows == 1) {
          while($row = $result->fetch_assoc()) {
            //We then assign the values to thier respective data
            $eventname = $row['eventname'];
            $regular = $row['regular'];
            $vip = $row['vip'];
            $date = $row['startdate'];
            $code = $half;
          }
      }
      //After that we echo out the data in a presentable form using html tags
      echo "<div class='event'>
          <form action='' method='POST'>
          <h1 style='color:white'>" . $eventname . "</h1>
          <select class='dropper' name='category'>
            <option value='Regular'>Regular</option>
            <option value ='VIP'>Vip</option>
          </select>
          <p style='color:white'>". $date ."</p>
          <p style='color:white'>" . $code . "</p>
          <button type='submit' name='submit'>Generate Ticket</button>
          </form>
          </div>";
          //When the user hits submit
      if(isset($_POST['submit'])){
        //We assign a varaible for the input option in category
        $category = $_POST['category'];
        //We also create a null variable..
        $price = null;
        //Where if the value is true of the given conditions it's given its assigned value in integers
        if ($category == 'Regular'){
          $price = $regular;
        }
        elseif ($category == 'VIP') {
          $price = $vip;
        }
        //After that... We insert the data into the database
        $sql_insert = "INSERT INTO tickets (eventname, category, price, startdate, code)
                VALUES ('$eventname', '$category', '$price', '$date', '$code')";
                //If inserted correctly echo out a success paragraph
                if ($conn->query($sql_insert) === TRUE) {
                  echo "<p class='success' style='text-align:center'>Your ticket has been generated successfully</p>";
                }else{
                  //Else echo out the error bellow
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
                //Once done require the fpdf function
                ob_start();
                require('fpdf/fpdf.php');
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',16);
                $pdf->Cell(200,10,'----------------------------------',0,2,'C');
                $pdf->Cell(200,10, 'MOI KASARANI TICKET BOOKING SYSTEM',0,2,'C');
                $pdf->Cell(200,10,'----------------------------------',0,2,'C');
                $pdf->Cell(200,10,$eventname,0,2,'C');
                $pdf->Cell(200,10,'CATEGORY: '.$category,0,2,'C');
                $pdf->Cell(200,10,'PRICE: ' .$price,0,2,'C');
                $pdf->Cell(200,10,'DATE: '.$date,0,2,'C');
                $pdf->Cell(200,10,'CODE: '.$code,0,2,'C');
                $pdf->Cell(200,10,'--------------------------------',0,2,'C');
                $pdf->Output();
                ob_end_flush();
                /*This is now going to generate a pdf page where it going to be downloaded by the user
                  He can print or keep it in his phone where he is going to display it at the entrance of the
                  gate.
                */
                /*
                  # If anything doesn't make sense I'll be ready to answer anything
                  # Delete these comments when you fully understand the project
                  # I've tried my best to make this project and code as simple as possible
                  # If you think I need to delete or add anything please dont hesitate to ask me
                  # Otherwise... All the best in this project bro.
                */
      }

    }
     ?>
  </body>
</html>
