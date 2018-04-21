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
    <title>Snow Much Fun!</title>
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
      <a href="./formActivity.html" class="button">Add Activities</a>
      <a href="./formWeather.html" class="button">Add Weather Conditions</a>
      <a href="./AboutUs.html" class="button">About</a>

      <div id="activities"> 
      <input type="checkbox" name="Biking" value="Biking" onclick="checkBike()" id="Biking"checked/><label for="Biking"> Display Biking</label><br>
      <input type="checkbox" name="Climbing" value="Climbing" onclick="checkClimb()" id="Climbing"checked/><label for="Climbing"> Display Climbing</label><br>
      <input type="checkbox" name="Hiking" value="Hiking" onclick="checkHike()" id="Hiking"checked/><label for="Hiking"> Display Hiking</label><br>
      <input type="checkbox" name="Skiing" value="Skiing" onclick="checkSki()" id="Skiing"checked/><label for="Skiing"> Display Skiing</label><br>
      </div>
    </div>
    
<!--Right sidebar -->
<div class="sidenav_right">

<body>
    <h2 align="center"><b>LOCATION NAME</b><br>
    <img src="Images/climb.png" alt="climb icon" style="width:20%;height:20%;" >
    </h2>
    
      <form style="margin-left: 20px">

        <div style="font-size:0;height:10px;margin-top:0px;padding: 0px"></div>

        <div style="font-size:0;height:0px;margin-top:0px;padding: 0px"></div>
        <p style="margin-bottom: 0px"><b>Road Conditions</b></p>
        <div class="form-group" style="width: 75%">
          <input type="text" class="form-control" id="Road Conditions" placeholder="Describe road conditions to activity">
        </div>
      
        <div style="font-size:0;height:10px;margin-top:0px;padding: 0px"></div>
        <p style="margin-bottom: 0px"><b>Location Description</b></p>
        <textarea class="form-control" id="LocationDescription" style="resize: vertical; max-width: 75%" rows="3"></textarea>
        <div style="font-size:0;height:10px;margin-top:0px;padding: 0px"></div>

        <div style="font-size:0;height:10px;margin-top:0px;padding: 0px"></div>
        <p style="margin-bottom: 0px"><b>Activity Description</b></p>
        <textarea class="form-control" id="ActivityDescription" style="resize: vertical; max-width: 75%" rows="3"></textarea>
        <div style="font-size:0;height:10px;margin-top:0px;padding: 0px"></div>

        <div class="form-inline">
          <button type="submit" class="btn btn-success mb-2">Submit</button>
        </div>
      </form>
<h3 align="center"><u>Comments</u></h3>
<div class="comments">
SomeUser-
<p>
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
