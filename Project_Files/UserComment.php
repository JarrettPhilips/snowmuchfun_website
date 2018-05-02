<?php
//session_start();

$username = "";
$location = "";
$comment = "";
$date = "";
$errors = array();
 
/*
  Comment Submission System
*/
if(isset($_POST['submitComment'])){
  //Receive all input values from the form
  $username= $_SESSION['username']; 
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $comment = mysqli_real_escape_string($db, $_POST['comment']);
  $date = mysqli_real_escape_string($db, $_POST['date']);

  //Check for empty fields
  if (empty($username)){array_push($errors, "Username is required");}
  if (empty($location)){array_push($errors, "Location is required");}
  if (empty($comment)){array_push($errors, "Comment is required");}
  if (empty($date)){array_push($errors, "Date is required");}
  if(count($errors) == 0){
          $query = "INSERT INTO Submissions2 (Username, LocationName, Comment, Date) VALUES ('$username', '$location','$comment','$date')";
          mysqli_query($db, $query);
  }
  header('location: index.php');
}

