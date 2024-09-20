<?php
session_start();
require '../config/config.php';
$name = $_POST['name'];
$feedback = $_POST['feedback'];
$email = $_POST['email'];


$query = " INSERT INTO `feedback`(`name`, `email`, `feedback`, `isresolved`) VALUES('$name', '$email','$feedback',0)";
$result = mysqli_query($conn,$query);
if($result){
    $_SESSION['feedback'] = "your feedback has been submited succesfully. We Will respond via email.. ";
    header("location:/feedback");
}
else{
    $_SESSION['feedback'] = "your feedback could not be submited try again ";
    header("location:/feedback");
}
?>