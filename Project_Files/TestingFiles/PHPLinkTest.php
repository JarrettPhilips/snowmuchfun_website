<?php
  $db = mysqli_connect('localhost','2685963_snowmuchfun','allthesnow45','2685963_snowmuchfun')
  or die('Error connecting to MySQL server.');
?>


<html>
  <head>
    <title>PHP / MySql Link Test</title>

  </head>
  <body>
    <h1>PHP connect to MySQL</h1>
    <?php
      $query = "SELECT * FROM users";
      mysqli_query($db, $query) or die('Error querying database.');
    ?>
  </body>
</html>
