<?php
echo "outside";
echo "submitComment:", $_POST['submitComment'];

if(isset($_POST['submitComment'])){
  echo "inside";
  $errors = array();

  //Receive all input values from the form
  $username = $_SESSION['username'];
  //$location = $_SESSION['currentLocation']

  $activities = $_GET['activities'];

  if(isset($_GET['activities'])){
      foreach ($activities as $color){
          echo $color."<br />";
          print $color;
      }
  } else {
      //echo "You did not choose an activity.";
  }

  $comment = mysqli_real_escape_string($db, $_POST['comment']);
  $date = mysqli_real_escape_string($db, $_POST['password1']);

  //Check for empty date field
  if (empty($date)){array_push($errors, "Date is required");}

  //If no errors, insert info into location and comment table
  if(count($errors) == 0){
    //Increment location activities

    //Add location, comment, user, and date to comment table
    $query = "INSERT INTO Submissions (Location, Username, Comment, Date) VALUES ('$username', '$location', '$comment')";
  	mysqli_query($db, $query);

  	header('location: index.php');
  } else {
    echo "error found";
  }
}

?>
