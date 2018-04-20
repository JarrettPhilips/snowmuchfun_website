<?php
session_start();

$username = "";
$location = "";
$errors = array();

//Connect to database
$db = new mysqli("fdb18.awardspace.net", "2685963_snowmuchfun", "allthesnow45", "2685963_snowmuchfun");

//Runs when 'registerUser' is called
if(isset($_POST['registerUser'])){
  //Receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $password1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  //Check for empty fields
  if (empty($username)){array_push($errors, "Username is required");}
  if (empty($location)){array_push($errors, "Location is required");}
  if (empty($password1)){array_push($errors, "Password is required");}
  if($password1 != $password2){array_push($errors, "Passwords do not match");}

  //Make sure username is not already in use
  $user_check_query = "SELECT * FROM Users WHERE Username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if($user){if($user['Username'] === $username){ array_push($errors, "Username already exists");}//Throws error if user exist

  //If no errors, insert info into user table
  if(count($errors) == 0){
  	//Eventually we can encrypt passwords here
    
  	$query = "INSERT INTO Users (Username, Password, Location) VALUES ('$username', '$location', '$password1')";
  	mysqli_query($db, $query);

    $_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.html');
  }
}
?>
