<?php

DEFINE ('DB_USER','root');
DEFINE ('DB_PSWD','password');
DEFINE ('DB_HOST','127.0.0.1');
DEFINE ('DB_NAME','Users');

$dbcon=mysqli_connect(DB_USER,DB_PSWD,DB_HOST,DB_NAME);

if (!$dbcon){
	die('error connecting to database');
}
echo 'you have connected successfully';

?>