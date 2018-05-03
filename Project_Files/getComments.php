<?php
include('UserDatabaseBackend.php');
$comments=array();
$users=array();
$dates=array();
$num=0;
//$location = $_POST['location'];
//if(mysqli_real_escape_string($db, $_POST['showComments'])){
        $location = mysqli_real_escape_string($db, $_POST['location']);
        /*Pull comments from db based on selected location */
        $query = "SELECT * FROM Submissions2 WHERE LocationName='$location'";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
        // output data of each row
                while($row = $result->fetch_assoc()) {
                        array_push($comments,$row["Comment"]);
                        array_push($users,$row["Username"]);
                        array_push($dates,$row["Date"]);
                        $num++;
                }
        } else {
                array_push($comments,"No comments for location.");
                array_push($users,"");
                array_push($dates,"");
                $num=-1;
        }
        $_SESSION['loc_users'] = $users;
        $_SESSION['loc_comments'] = $comments;
        $_SESSION['loc_dates'] = $dates;
        $_SESSION['loc_com_num'] = $num;
        $_SESSION['location']=$location;
        header('location: index.php');
//}
?>
