<?php 
$email = $_GET['email'];
require '../../config/config.php';
echo 'verification code sent to '. $email;

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
<link rel="icon" href="/nms-logo.webp" type="image/webp">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../style.css">
<link rel="shortcut icon" href="../nms-logo.webp" type="image/x-icon">
    <link rel="icon" href="../../nms-logo.webp">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title> email Verification</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Verification Account</a>
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Email Verification</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Authentication Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" name="verify">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="alert alert-info "> we have sent the verification code to your email address which you provided please check your email and input the code here . call +2348145931080 for support. </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<?php 



    if(isset($_POST["verify"])){
       
    
    
      $retotp= mysqli_query($conn, "SELECT verification_code from registerd_candidates WHERE email = '$email'");
      if(mysqli_num_rows($retotp)>0){ }
      else{die('code was not sent');}
    $row = mysqli_fetch_assoc($retotp);
    $otp =  $row['verification_code'] ;
      
     
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
        
            ?>
           <script>
               alert("Invalid OTP code");
                    

           </script>
           <?php
           
        }else{
            mysqli_query($conn, "UPDATE registerd_candidates SET verification = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                window.location.replace("/auth/login");
             </script>
             <?php
        }

    }

?>