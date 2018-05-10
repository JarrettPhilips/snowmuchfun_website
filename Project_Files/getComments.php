<?php
error_reporting(0);
ini_set('display_errors', 0);
include('UserDatabaseBackend.php');
$comments=array();
$users=array();
$num=0;
$location = 'Shelf Road';//mysqli_real_escape_string($db, $_POST['location_name']);
/*Pull comments from db based on selected location */
//if(isset($_POST['comments'])){
$query = "SELECT * FROM Submissions WHERE LocationName='Shelf Road'";
$result = $db->query($query);
if ($result->num_rows > 0) {
// output data of each row
	while($row = $result->fetch_assoc()) {
		array_push($comments,$row["Comment"]);
		array_push($users,$row["Username"]);
                $num++;
	}
} else {
	array_push($comments,"No comments for location.");
	array_push($users,"");
	$comment='';
        $num++;
}
$_SESSION['loc_users'] = $users;
$_SESSION['loc_comments'] = $comments;
$_SESSION['loc_com_num'] = $num;
//}
?>
