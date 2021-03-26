<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');
$con = mysqli_connect("localhost","root","","photo");
mysqli_set_charset($con, "utf8");

$sql = "SELECT imagefile FROM phototb";
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);
echo $row['imagefile'];

?>