<?php
session_start();
/*


--THIS IS WHERE LOGIN  REQUEST ARE HANDLED------

*/

require "../../config/config.php";



 if(isset($_POST['remember'])){
  
    }

//header('Access-Control-Allow-Origin: *');

   
   
    $email = $_POST['email'];
    $password= $_POST['pswd'];
   $_SESSION['email'] = $email;
   $email = $_SESSION['email'];
   $auth =  "SELECT * FROM `registerd_candidates` WHERE `email` = '$email' AND `password` = '$password'";
    $exeauth= mysqli_query($conn,$auth);
    $row = mysqli_fetch_assoc($exeauth);
   
    if(mysqli_num_rows($exeauth)<=0){
        $_SESSION['login_failed'] = " Invalid credentials!!";
        header("location:/auth/login");

    }
   else if($row['verification'] != 1){
    $_SESSION['login_failed'] = " Email not Verified!!";
        header("location:../verification?email=$email");
    }
else if ($row['subscribed'] != 1){
    $_SESSION['login_failed'] = "Please subscribe to a plan to start practing!!";
    header("location:/subscription/sub.php?email=$email");
    
}
   
    
    else{
       
      $_SESSION['email'] = $email;
      unset($_SESSION['login_failed']);
     header("location:/auth/authenticate.php?email=$email");
       
    
    }
    
?>                