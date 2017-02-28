<?php
  require 'connection.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ticket | Moi Kasarani Ticket Booking System</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body style="background-color:grey">
    <?php
      if(isset($_GET['ticket'])){
        $id = intval($_GET['ticket']);
        $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $shuffle = str_shuffle($string);

        $half = substr($shuffle, 0, strlen($string)/4);
        $sql = "SELECT * FROM events WHERE id = ".$id."";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
          while($row = $result->fetch_assoc()) {
            $eventname = $row['eventname'];
            $regular = $row['regular'];
            $vip = $row['vip'];
            $date = $row['startdate'];
            $code = $half;
          }
      }
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

      if(isset($_POST['submit'])){
        $category = $_POST['category'];
        $price = null;
        if ($category == 'Regular'){
          $price = $regular;
        }
        elseif ($category == 'VIP') {
          $price = $vip;
        }

        $sql_insert = "INSERT INTO tickets (eventname, category, price, startdate, code)
                VALUES ('$eventname', '$category', '$price', '$date', '$code')";

                if ($conn->query($sql_insert) === TRUE) {
                  echo "<p class='success' style='text-align:center'>Your ticket has been generated successfully</p>";
                }else{
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
                ob_start();
                require('fpdf/fpdf.php');
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',16);
                $pdf->Cell(40,10, 'Moi Kasarani Ticket Booking System','C');
                $pdf->Cell(60,10,$eventname,0,1,'C');
                $pdf->Output();
                ob_end_flush();
      }

    }
     ?>
     <?php

      ?>

  </body>
</html>
