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
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js'></script>
  <script type='text/javascript' src='script.js'></script>
  <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Oxygen|Raleway|Work+Sans:100" rel="stylesheet">
  <title>WEATHER</title>
</head>

<body>
  <!--
    Title Banner
  -->
  <div>
    <div id="titleDiv">
      <div id="title">WEATHER</div>
      <img class="bannerImage" src="Images/IMG_1176-4.jpg">
    </div>

    <div id="subbar">
      <div class="activityDiv">
        <button class="activityButton">Hiking</button>
      </div>
      <div class="activityDiv">
        <button class="activityButton">Biking</button>
      </div>
      <div class="activityDiv">
        <button class="activityButton">Skiing</button>
      </div>
      <div class="activityDiv">
        <button class="activityButton">Climbing</button>
      </div>

      <!-- Button triggers login modal -->
      <div class="activityDiv" id="loginDiv">
          <button class="activityButton" id="loginBtn">User Portal</button>
      </div>

      <!-- This div holds the login modal -->
      <div id="loginModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>

          <div class="header"><h1>Log In</h1></div>

          <div class="everythingButTheHeader">
              <!-- Login Form -->
              <p style="font-size:18px; text-align:center"><b>Sign In</b></p>
              <form method="post" action="index.php">
                <?php include('UserRegistrationError.php'); ?>
                <?php include('UserDatabaseBackend.php'); ?>
                <div class="input-group"><input type="text" placeholder="Username" name="username" ></div>
                <div class="input-group"><input type="password" placeholder="Password" name="password"></div>
                <div cla ss="input-group">
                  <button type="submit" class="btn btn-success mb-2" name="loginUser">Log In</button>
                  <button type="submit" class="btn tbn-success mb-2" name="signUp">Sign Up</button>
                </div>


                <div class="content">
                  <?php if(isset($_SESSION['success'])) : ?>
                  <div class="error success"><h3><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></h3></div>

                  <?php endif ?>
                  <?php  if(isset($_SESSION['username'])) : ?>
                  <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                  <?php endif ?>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>

  <div>
    <!--
      Side Menu
    -->
    <div id="sidebar">
      <!-- Button triggers comment modal -->
      <button id="commentBtn">Add a Comment</button>

      <!-- This div holds the comment modal -->
      <div id="commentModal" class="modal">
        <div class="modal-content">
          <span id="commentClose" class="close">&times;</span>

          <div class="header"><h1>Location</h1></div>

          <div class="everythingButTheHeader">
            <form method="post" action="index.php">
              <label>What did you do there?</label>
              <div class="input-group">
                Hiking <input type="checkbox" name="activities[]" id="activities" value="hiking">
                Biking <input type="checkbox" name="activities[]" id="activities" value="biking">
                Skiing <input type="checkbox" name="activities[]" id="activities" value="skiing">
                Climbing <input type="checkbox" name="activities[]" id="activities" value="climbing">
              </div>

              <div class="input-group"><textarea placeholder="Write your comment here" cols="40" rows="5" name="comment"></textarea></div>
              <label>When were you there?</label>
              <div class="input-group"><input type="date" name="date"</button></div>
              <div class="input-group"><button type="submit" class="btn" name="submitComment">Submit Comment</button></div>
            </form>
          </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src='ModalScript.js'></script>

    <!--
      Map
    -->
    <div id="mapDiv">
    </div>
  </div>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQK0exnojgLgHApfdgjn6Km32cPxIXQZo&libraries=places&callback=initMap"></script>

</body>
</html>
