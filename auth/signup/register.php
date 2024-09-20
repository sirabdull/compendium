<?php
session_start();
require "../../config/config.php";
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Headers: *');

    #$user = $_POST['user'];
    $password = $_POST['pswd'];
    $email = $_POST['email'];
    $fullname =$_POST['firstname'].' '.$_POST['lastname'];
    $mobile =$_POST['mobile'];
    $times_stamp = date('y/m/d/h-M-s');
    $otp = rand(100000,999999);


   $query = " INSERT INTO `registerd_candidates`( `fullname`,  `password`, `mobile`, `email`, `reg_date`, `subscribed`, `subscription_type`,`verification`, `verification_code`) VALUES ('$fullname','$password','$mobile','$email','$times_stamp','false','NULL', 'false', '$otp')";
    ##$result=mysqli_query($conn,$query);
##AUTHERNTICATION
    $authenticate_email =  "SELECT * FROM `registerd_candidates` WHERE `email` = '$email'";
    $authenticate_mobile =  "SELECT * FROM `registerd_candidates` WHERE `mobile` = '$mobile'";
   
    
    $execute_authenticate_email= mysqli_query($conn,$authenticate_email);
    $execute_authenticate_mobile= mysqli_query($conn,$authenticate_mobile);
   
    
    if(mysqli_num_rows($execute_authenticate_mobile) > 0 and mysqli_num_rows($execute_authenticate_email) > 0)
    {
        $_SESSION['failed'] =  " the provided email address  and mobile number is already registered to an account , please login.";
       

        header("location:/auth/signup");
     
                
    }
   else if(mysqli_num_rows($execute_authenticate_email) > 0){
    $_SESSION['failed'] = "The email you provided is already associated with an account, please login";
    header("location:/auth/signup");
 
    }
    else if(mysqli_num_rows($execute_authenticate_mobile) > 0){
        $_SESSION['failed'] = "The provided mobile number is already associated with an account";
        header("location:/auth/signup");
        
   
    }
    
   else{
    unset($_SESSION['failed']);
   
require "../../Mail/phpmailer/sendmail.php";

$mail->Subject ='Verification code';
$mail->Body="<p>Dear ". $fullname .", </p> <h3>Your verification code is  <span style='color:blue;text-decoration:underline;font-family:sans serif tahoma;font-size:20px;letter-spacing:3px;'>$otp </span><br>
<div
<img src='nms-logo.png'alt='nmsLogo'><br> Thank you for your registeration,  we are glad  to have  you onboard. <br>Please Authenticate your email with the code above. choose your prefered subscription to start  practicing, To impove chances of gaining admission into the <span style='font-family:lucida sanserif; margin:5px; color:purple;'>NIGERIAN MILITARY SCHOOL ZARIA</span>.
<ul>
<li>Practice NMS entrance examination and Likely interview questions</li>
<li> A leaderboard system which allows you to compete amongst other applicants</li>
<li> Admission guides and tips</li>
<li>Progress and Experience tracking </li>
<li> 24/7 support </li>
</ul>

<div class='child'>

<span></span>
</div>
</div>
 </h3>
<br><br>
<p>With regrads,</p>";


//try sending OTP

try{
$mail->send();
}
catch(Exception $e){
    echo "Mailer Error: ". $mail->ErrorInfo;
  die($mail->ErrorInfo);
}

// extra handler if emial was not sent
if(!$mail->send()){
            
   $_SESSION['failed'] = "Register Failed, Authentication email could not be sent.. check your connection or email and try  again.";
    header("location:/auth/signup");
}
else{  
    ##if email is sent register the user
mysqli_query($conn,$query);
echo " <br> <br> Register Successfully, Authenntication code was  sent to " . $email . 'PLEASE!! check your email';  
header("location:/auth/verification?email=$email")   ; 
            }
   }
    
?>