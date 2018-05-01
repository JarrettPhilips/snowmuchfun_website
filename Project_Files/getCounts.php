<?php
//session_start();
$q = intval($_GET['locationName']);

//Connect to database
$db = new mysqli("fdb18.awardspace.net", "2685963_snowmuchfun", "allthesnow45", "2685963_snowmuchfun");
$query = "SELECT Hiking, Biking, Skiing, Climbing FROM Locations WHERE LocationName = '".$q."'";
$results = mysqli_query($db, $query);
echo json_encode($results);
?>
