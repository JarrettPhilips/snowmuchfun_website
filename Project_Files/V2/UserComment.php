<?php
//session_start();

$username = "";
$location = "";
$errors = array();

//Connect to database
$db = new mysqli("fdb18.awardspace.net", "2685963_snowmuchfun", "allthesnow45", "2685963_snowmuchfun");

if ($db->connect_error){
        die("Connection failed:" . $db->connect_error);
    }
    
/*
  Registration System
*/
if(isset($_POST['submitComment'])){
  //Receive all input values from the form
  $username= $_SESSION['username'] ; //might work for pulling username
  //$username = mysqli_real_escape_string($db, $_POST['username']);
  $location = "Boulder";//need to figure out which location it is
  $comment = mysqli_real_escape_string($db, $_POST['comment']);
  $date = mysqli_real_escape_string($db, $_POST['date']);

  //Check for empty fields
  //if (empty($username)){array_push($errors, "Username is required");}
  //if (empty($location)){array_push($errors, "Location is required");}
  if (empty($comment)){array_push($errors, "Comment is required");}
  if (empty($date)){array_push($errors, "Date is required");}
  
  $query = "INSERT INTO Submissions (Username, LocationName, Comment, Date) VALUES ('$username', '$location','$comment','$date')";
  
  mysqli_query($db, $query);
  if ($db->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}
  
    header('location: index.php');
}

