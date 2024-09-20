<?php
session_start()?>


<!DOCTYPE html>


<html>
<head>
    <title>FEEDBACK | NMS PAST QUESTIONS COMPENDIUM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/nms-logo.webp" type="image/x-icon">
      <!-- Favicon -->
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>

.side {
      position: fixed;
      width: 40%;
      height: 100%;
      right: 0px;
      text-align: center;
      top: 10px;
     

    }
    body{
        height:150vh;
    }

    .side .bg {
      position: absolute;
      width: 100%;
      height: 100%;
      background: url('/assets/Bg-for-army.jpg');
      background-position: center;
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      transform: scale(1);
      z-index: -2;
   margin-top: 0px;
      opacity: 0.8;
    }

    .content {
      margin-top: 25%;
      font-family: 'Courier New', Courier, monospace;
      font-size: 20px;
      z-index: -1;
    }
    .cole{

        left: 30px;
        top: 0px;
        width: 50%;
        font-size: 19px;
      
    }
    li{
        font-style: italic;
    }
    a{
        color:white;
        font-size: 15px;
        
    }
    *{
        font-family:Arial, Helvetica, sans-serif;
    }
    label{
        font-style:oblique;
    }
    </style>
</head>
<body>


    <!-- Navbar Start -->
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
    <!-- Navbar End -->



    <div class="side bg-dark ">

        <div class="bg"></div>
      
   </div>
      <div class="cole ">
      <a href="/"> <img src="/nms-logo.webp" alt="" width="60" srcset=""></a> 
    <div class="container mt-5">
<h1 class="display-4">Leave a feedback </h1>

       <div>
        <ul>
<li>
     What features would you like us to include in the online compendium as to further aid your practice experience?</b>
</li>
<li>
   Are you experiencing any difficulty using the online compendium?</b>
</li>
<li>
 Did you discover any problem with a question or its options?</b>
</li>
<li>
    Have any question?
</li>
<li>
    Do you need any other help or assistant?
</li>
<div class="text-info">please fill out the form </div>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['feedback'])) {
  ?>
  <div class="col pt-3 ml-5  ">
  <div
    class="alert alert-success alert-dismissible  show"
   role="alert"
  >
    <button
      type="button"
      class="btn-close"
      data-bs-dismiss="alert"
      aria-label="Close"
    ></button>
    <strong>SUCCESS</strong> <?php echo $_SESSION['feedback'] ?>
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

    unset($_SESSION['feedback']);
?>
        <form action="submit_feedback.php" method="post">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="feedback">Your Feedback:</label>
                <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
        
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
