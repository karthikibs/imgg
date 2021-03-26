<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');
$con = mysqli_connect("localhost","root","","photo");
mysqli_set_charset($con, "utf8");

if($_FILES["stphoto"])  
 {  
   $tmporary = $_FILES["stphoto"]["tmp_name"];
   $file_name = $_FILES["stphoto"]["name"];
      if(move_uploaded_file($tmporary,"E:photos\_"."$file_name"))
    {
       if($file = addslashes(file_get_contents("E:photos\_"."$file_name")))
       {
            $sql = "INSERT INTO phototb (`imagefile`) VALUES ('$file')";
            mysqli_query($con,$sql);
            mysqli_query($con,"ALTER TABLE imagedb AUTO_INCREMENT = 1");
            echo json_encode("successfully injected");
       }
    }
       else
        echo json_encode("error");
 }
?> 