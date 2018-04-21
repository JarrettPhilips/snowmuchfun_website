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
        <td>
          <div id="webtitle">
            <h1>Snow Much Fun!</h1>
          </div>
        </td>
        <td style="text-align: right;">
          <div id="snowflake">
            <img src="Images/SnowFlake.jpg" alt="SnowFlake" style="width:5%;height:5%;" >
          </div>
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
  		<button type="submit" class="btn" name="loginUser">Login</button>
  	</div>
  	<p>
      No account?<a href="UserRegistrationFrontend.php">Sign up Here</a>
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
      <a href="./UserRegistrationFrontend.php" class="button">Sign up</a>
      <a href="./formActivity.html" class="button">Add Activities</a>
      <a href="./formWeather.html" class="button">Add Weather Conditions</a>
      <a href="./AboutUs.html" class="button">About</a>

      <form action="/action_page.php" method="get">
      <input type='checkbox' data-bind='checked: Locations' value='Climbing'><label for="Climbing"> Display Climbing</label><br>
      <input type="checkbox" name="activity" value="Biking"/><label for="Biking"> Display Biking</label><br>
      <input type="checkbox" name="activity" value="Climbing"/><label for="Climbing"> Display Climbing</label><br>
      <input type="checkbox" name="activity" value="Hiking"/><label for="Hiking"> Display Hiking</label><br>
      <input type="checkbox" name="activity" value="Skiing"/><label for="Skiing"> Display Skiing</label><br>
      </form>
    </div>

    <!-- Page content -->
    <div id="map"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQK0exnojgLgHApfdgjn6Km32cPxIXQZo&libraries=places&callback=initMap"></script>
  </body>
</html>
