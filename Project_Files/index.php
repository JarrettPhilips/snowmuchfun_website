<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Snow much fun!</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js'></script>
<script type='text/javascript' src='app.js'></script>

  </head>

  <body id="index">
      <tr>
        <h1> Snow Much Fun!
            <img align="right" src="Images/SnowFlake.jpg" alt="SnowFlake" style="width:4%;height:4%;" >
	    </h1>
        </td>

      </tr>
    </table>
     <!-- Side navigation -->
     <div class="sidenav">
	<div class="container">
    <form method="post" action="index.php">
  	<?php include('UserRegistrationError.php'); ?>
    <?php include('UserDatabaseBackend.php'); ?>
  	<div class="input-group">
  		<input type="text" placeholder="Username" name="username" >
  	</div>
  	<div class="input-group">
  		<input type="password" placeholder="Password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn btn-success mb-2" name="loginUser">Login</button>
  	</div>
  	<p style="font-size:14px, text-align:center">
      No account?<a href="UserRegistrationFrontend.php" style="font-size:18px">Sign up Here</a>
  	</p>
  </div>
  <div class="content">
  	<?php if(isset($_SESSION['success'])) : ?>
      <div class="error success">
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <?php  if(isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
  </div>
</form>
      <div id="activities"> 
      <input type="checkbox" name="Biking" value="Biking" onclick="checkBike()" id="Biking"checked/><label for="Biking"> Display Biking</label><br>
      <input type="checkbox" name="Climbing" value="Climbing" onclick="checkClimb()" id="Climbing"checked/><label for="Climbing"> Display Climbing</label><br>
      <input type="checkbox" name="Hiking" value="Hiking" onclick="checkHike()" id="Hiking"checked/><label for="Hiking"> Display Hiking</label><br>
      <input type="checkbox" name="Skiing" value="Skiing" onclick="checkSki()" id="Skiing"checked/><label for="Skiing"> Display Skiing</label><br><br>
      </div>
      <a href="./AboutUs.html" class="button">About</a>
    </div>
    
<!--Right sidebar -->
<div class="sidenav_right">

<body>
    <h2 id="location_name" align="center"><b>LOCATION NAME</b><br> </h2>
    <div><h2><img id="side_icon" src="Images/climb.png" alt="climb icon"></h2></div>
    <p id="results_S" align="center">Summary</p>
    <p id="results_T" align="center">Temperature</p>
    <p id="results_H" align="center">Humidity</p>
    <div><h2><img id="side_weather" src="Images/clear-day.png" alt="weather icon"></h2></div>

      <form style="margin-left: 20px">
<h3 align="center"><u>Comments</u></h3>
<div class="comments">
SomeUser-
<p>
Hello
All of his comments. <br>
saying some random shit
</p>
</div>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</div>

    <!-- Page content -->
    <div id="map"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQK0exnojgLgHApfdgjn6Km32cPxIXQZo&libraries=places&callback=initMap"></script>


  </body>
</html>
