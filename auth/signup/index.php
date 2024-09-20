<?php session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTER | Common entrance past questions (NMS)</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4964099203895467"
     crossorigin="anonymous"></script>
  <link rel="icon" href="/nms-logo.webp" type="image/x-icon">


  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- MetisMenu CSS -->
  <link href="assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link href="/jitassets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!--    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet"> 


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/jitassets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/jitassets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/jitassets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/jitassets/css/style.css" rel="stylesheet">
  <style>
    *{
      font-family:Arial, Helvetica, sans-serif;
    }
    body {
      margin: 0px;
    }

    .container-fluid {
      height: 100%;
    }

    .side {
      position: fixed;
      width: 50%;
      height: 100%;
      right: 0px;
      text-align: center;
      border-bottom-left-radius: 100%;

    }

    .side .bg {
      position: absolute;
      width: 100%;
      height: 100%;
      background: url('/assets/bust.jpeg');
      background-position: center;
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      transform: scale(1);
      z-index: -2;
      border-bottom-left-radius: 100%;
      opacity: 0.8;
    }

    .content {
      margin-top: 25%;
      font-family: 'Courier New', Courier, monospace;
      font-size: 25px;
      z-index: -1;
    }

    .img {
      width: 60px;
    }
    @media screen and (max-width:600px){
        .side{
        display:none;
        }
        body{
       
        }
        .img{
            width:40px;
        }
        .form-inline{
         padding:20px;
            
        }
        .col-4{
            width:350px;
        }
     
    }

    form {
      padding-right: 70px;
    }

    .su {
       background: #163020;
      color: white;
      border: 2px solid white;
      border-radius: 10px;
      width: 500px;
      height:50px;
      padding:10px;
      font-family:sans sans-serif;
      font-size: 20px;
      margin-top:60px;
      margin-bottom:100px;
    }
    .su:hover{
      border: 2px solid  #163020;;
   
    }
    .inp{
      width: 400px;
      height: 40px;
      border: 1px solid brown;
      border-radius: 20px;

    }
    label{
      font-size: 17px;
    }
    .back{
      background:transparent;
      border-radius: 5px;
      border: 2px solid brown;
      color:white
    }
    .back:hover{
      transform:scale(1.2)
    }
    a{
      text-decoration:none;
      color:white
    }
    b{
      font-size:30px;
    }
     @media screen and (max-width:600px){
        .su{
    margin:10px;
    width:80vw;
        }
  </style>
</head>

<body>
    
     <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="/jitassets/img/nms-logo-trsns.png" style="width:7.5%; height:auto" /> NMS Compendium</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="https://nmscompendium.com.ng/" class="nav-item nav-link active">Home</a>
                <a href="https://nms1954.sch.ng/about-us/brief-history/" class="nav-item nav-link">About NMS</a>
                <!-- <a href="https://nmscompendium.com.ng/guide/" class="nav-item nav-link">Quick Guide</a> -->
                <a href="https://nmscompendium.com.ng/feedback/" class="nav-item nav-link">Contact Us</a>
            </div>
            <a href="/auth/signup/" class="btn btn-danger py-4 px-lg-5 d-none d-lg-block">Subscribe Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
  <div class="container-fluid">
    <div class="side bg-dark ">

      <div class="bg"></div>
      <div class="content p-5 text-light">
        ready to begin your journey at the Nigerian Military School? <br><br>
        
        <button class="btn back" id="sub" type="submit"><a href="/">back home</a> </button>
        
        <button class="btn back" id="sub" type="submit"><a href="/auth/login">Login</a> </button>

      </div>

    </div>
    <script>
      function validatePassword() {
        var password = document.getElementById("pass").value;
        var confirmPassword = document.getElementById("cpass").value;

        if (password != confirmPassword) {
          document.getElementById("message").innerHTML = "Passwords do not match!";
          return false;
        } else {
          document.getElementById("message").innerHTML = "";
          return true;
        }
      }
    </script>



    <div class="col    bg-light">
     <b>Kindly Signup here to use past questions</b>
      <?php
      if(isset($_SESSION['failed'])) {
    ?>
    <div class="col-4 pt-3">
    <div
      class="alert alert-sm alert-danger alert-dismissible fade show"
      role="alert"
    >
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>
      <strong>ERROR</strong> <?php echo $_SESSION['failed'] ?>
    </div>
    </div>
    <script>
      
      var alertList = document.querySelectorAll(".alert");
      alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
      });
    </script>
    <?php
      }
      unset($_SESSION['failed']);
      ?>

      <!-- Error handling-->

     
      <!-- End of error handling-->

      <form action="register.php" onsubmit=" return validatePassword()" method="post"
        class="col  form-inline shadow g-5 rounded p-2 was-validated" formvalidate>
     

        <div class="col-4 md-2 form-group">
          <label for="validationCustom01" class="form-label">First name </label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="firstname" pattern="[A-Za-z]{2,}" class="form-control rounded" id="validationCustom01"
              aria-describedby="inputGroupPrepend" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        </div>
        <div class="col-4 md-2 form-group">
          <label for="validationCustom02" class="form-label">Last name</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="lastname" pattern="[A-Za-z]{1,}" class="form-control rounded" id="validationCustom02"
              aria-describedby="inputGroupPrepend" required>
          </div>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <br>
        <div class="col-4 md-2">
          <label for="email" class="form-label">Email</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope"
                aria-hidden="true"></i></span>
            <input name="email" type="email" class="form-control rounded id="email" autocomplete="email"
              aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Please enter a valid email.
            </div>
            <div class="valid-feedback">
              An authentication code will be sent to <span id="em">to your email address please ensure its valid </span>.
              <script>
                const display = document.getElementById('em');
                const email = document.getElementById('email');
                email.onchange = () => {
                  display.innerHTML = email.value;
                }
              </script>
            </div>
          </div>
        </div>
        <div class="col-4 md-2">
          <label for="pass" class="form-label">password</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input minlength="6" type="password" class="form-control rounded" id="pass" aria-describedby="inputGroupPrepend"
              name="pswd" required>
            <div class="invalid-feedback">
              Please provide a secure password.
            </div>
          </div>

          <div class="col-12 md-2">
            <label for="cpass" class="form-label" required>confrim password</label>
            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock" aria-hidden="true"></i></span>
              <input minlength="6" type="password" class="inp form-control rounded" name="confrim" id="cpass"
                aria-describedby="inputGroupPrepend" placeholder="retype password" required />


              <div class=" text-danger col p-2" id="message">

              </div>
            </div>

            <div class="valid-feedback">
              all good.
            </div>
          </div>


        </div>
        <div class="col-4 md-2">
          <label for="validationCustom05" class="form-label">Mobile</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-phone" aria-hidden="true"></i></span>
          <input type="tel" class="form-control rounded" name="mobile" pattern="[0-9]{11,}" id="validationCustom05" required>
          <div class="invalid-feedback">
            Please provide a valid phone number eg <i>08145931080</i>
          </div>
          </div>
        </div>
<div class="form-check col-4 md-2" id="check">
  <input class="form-check-input" checked type="checkbox" value="" id="box">
  <label class="form-check-label" for="flexCheckDefault"> <br>
     <span class="small">I acknowledge that by submitting this form, I am committing to a subscription fee to access the online compendium of past questions. I understand that this fee is required for continued access to the platform.</spam>
  </label>
</div>
        <div class="col-4 mt-2 ">
          <button class="btn su" id="submit" type="submit">Sign up</button>
        </div>
      </form>
    </div>
  </div>
  
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var checkbox = document.getElementById('box');
    var submitButton = document.getElementById('submit');

    // Add event listener to checkbox
    checkbox.addEventListener('change', function() {
      // If checkbox is checked, enable submit button
      if (checkbox.checked) {
        submitButton.disabled = false;
      } else {
        // If checkbox is not checked, disable submit button
        submitButton.disabled = true;
      }
    });
  });
</script>






  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65a847e10ff6374032c184c6/1hkclhk3c';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>

</html>