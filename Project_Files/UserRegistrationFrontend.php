<?php include('UserDatabaseBackend.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Create an account</title>
  <link rel="stylesheet" type="text/css" href="UserRegistrationStyle.css">
</head>
<body>
  <div class="header">
  	<h2>Sign Up</h2>
  </div>

  <form method="post" action="UserRegistrationFrontend.php">
    <?php include('UserRegistrationError.php'); ?>

  	<div class="input-group">
  	  <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
  	</div>
    <div class="input-group">
  	  <input type="text" placeholder="Where are you from?" name="location">
  	</div>
  	<div class="input-group">
  	  <input type="password" placeholder="Password" name="password1">
  	</div>
  	<div class="input-group">
  	  <input type="password" placeholder="Confirm Password" name="password2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="registerUser">Submit</button>
      <button class="btn"><a href="index.php" class="btn" style="text-decoration:none; padding:0px;">Back</a></button>
  	</div>
  </form>
</body>
</html>
