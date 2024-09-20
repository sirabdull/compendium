<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="the official Nigerian Military School (NMS) examination past question compendium, designed to aid aspiring candidates throughout their screening process">
  <meta name="keywords" content="past questions, Nigerian Military School, School, exam, NMS exam, compedium , Nigerian Army , learn, How to enter NMS, How to join Army , NMS past question , common entra">
  <title>LOGIN | Nigerian Military School Zaria NMS official compendium Past Questions </title>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4964099203895467"
     crossorigin="anonymous"></script>

  <link rel="favicon/nms-logo.webp" type="image/x-icon" alt="nigerian military school logo" >     

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Bootstrap Core CSS -->
      <link  rel="stylesheet" href="/assets/css/bootstrap.min.css"/>

      <!-- MetisMenu CSS -->
      <link href="/assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

      <!-- Custom CSS -->
   
      <!-- Custom Fonts -->
      <link href="/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

        .side-nav-login{
          position:fixed;
          right: 0px;
         max-width:40vw;
          z-index: 1;
      
          top:20px;
          height: 100vh;
          text-align: center;
        }
        @media screen and (max-width:1024px ){

   .side-nav-login{
          position:fixed;
          right: 0px;
         min-width:100vw;
        top:0px;
     
        }
        .input{
          width: 65vw;
          margin-left:-10:px;
        }
        .lab{
display:none;
  
        }

        .carry{
          margin-top: 167vh;
        }
        .imgt{
      display: none;
        }

        }



        .cover{
          padding:5px ;
          margin: 10px;
          text-align: left;
         
        }
        input{
          height:40px;
          width: 20vw;
    
          margin-left: 27px;
          border: 2px solid brown ;
          font-family: 'Courier New', Courier, monospace;
          
        }
        .carry{
          margin-top: 14vh;
          margin-left: 20px;
          margin-right: 20px;
          min-height: 55%;
        }
        .img{
          width: 60px;
        }
        .imgt{
          width: 60px;
          float:right;
          margin-left:31vw;
          margin-bottom: 10px;
        }
        .left{
          position:fixed;
          height: 100%;
    
        }
        
        .left .bg{
          width:100%;
          background-image: url('/assets/busted.jpg');
          height: 100%;
          opacity: 1;
          
          background-attachment: fixed;
        background-position: center;
        background-size:contain;
        background-repeat: no-repeat;


        }
        .left .content{
          padding-top: 20%;
        }
        .submit{
          background-color: brown;
          color: white;
          border-radius: 10px;
          font-family:' sans-serif';
          padding: 10px;
        }
        .submit:hover{
          opacity: .5;
          background-color: transparent;
          border: 2px solid brown;
        }
        .content{
          z-index:1;
          position: absolute;
          text-align: center;
          font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
          font-size: large;
          left: 0px;
          right: 70%;
          
        }
        .alert{
          z-index:10;
      
        
        }
          
        a{
        text-decoration:none;
        }
        .lab{
            font-family:sans sans-serif;
            font-size:20px;
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


  
  <div class="container  float-start left">
    <a href="/"> <img src="/nms-logo.webp" alt="" style="position: absolute;" class="img" srcset=""></a>
  
  
   
    <div class="content">
      <p class="p-5 text-dark">
    <strong>  Welcome back comerade,</strong>  <br> constistent learning is essential for examination success 
      </p>
    </div>
    <div class="bg">
    
      </div>
    
  </div>
  
  
  
  <div class="side-nav-login bg-light">
  <div class="p-5 carry shadow">
 
    <h1>Login</h1>
    <h6>please login to use compendium</h6>
    <?php
    if(isset($_SESSION['login_failed'])) {
  ?>
  <div class="col pt-3 ml-5  ">
  <div
    class="alert alert-danger alert-dismissible  show"
   role="alert"
  >
    <button
      type="button"
      class="btn-close"
      data-bs-dismiss="alert"
      aria-label="Close"
    ></button>
    <strong>ERROR</strong> <?php echo $_SESSION['login_failed'] ?>
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
    unset($_SESSION['login_failed']);
?>
   
  <form class="row  needs-validation" method="post" action="login.php">
     
    <img src="/nms-logo.webp"  class="img" width="70px" alt="logo" srcset="">
  
    
    <div class="form-floating mb-5 mt-3">
      <input type="email"required class="form-control-lg input" id="email" placeholder="email" autofocus autocomplete="email" name="email" required>
      <label class="lab" for="email">Email <i class="fa fa-envelope" aria-hidden="true"></i></label>
    </div>
    
    <div class="form-floating  mb-3">
      <input type="password" autocomplete="off" class="form-control-lg input" id="pwd" placeholder="Enter password"  name="pswd" required >
      <label class=" lab" for="pwd">Password <i class="fa fa-lock" aria-hidden="true"></i></label>
    </div>
    <a href="/auth/recover/" class="fogot text-secondary">forgot password?
    </a>
    <a href="/auth/signup/" class="  pb-2 text-info">Signup
    </a>
   <img src="/assets/na-logo.webp"  class="imgt float-end" width="60px" alt="logo" srcset="">
  
    <button type="submit" class="btn submit ">Login</button>
 
   
  </form>
    </div>
   
</div>



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