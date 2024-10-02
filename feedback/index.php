<?php
session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACK | NMS PAST QUESTIONS COMPENDIUM</title>
    <link rel="shortcut icon" href="/nms-logo.webp" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .navbar-brand {
            font-weight: 600;
            color: #007bff;
        }
        .nav-link {
            color: #333;
            font-weight: 500;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .feedback-section {
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        .feedback-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .feedback-form label {
            font-weight: 500;
        }
        .feedback-points {
            background-color: #e9ecef;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        .feedback-points ul {
            list-style-type: none;
            padding-left: 0;
        }
        .feedback-points li {
            margin-bottom: 0.5rem;
            font-style: normal;
        }
        .feedback-points li:before {
            content: "\f058";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            margin-right: 10px;
            color: #28a745;
        }
        .feedback-form {
            max-width: 600px;
            margin: 0 auto;
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
                   <a href="https://nmscompendium.com.ng/auth/login" class="nav-item nav-link ">Login</a>
                     <a href="https://nmscompendium.com.ng/auth/signup" class="nav-item nav-link ">Get started</a>
                <a href="https://nms1954.sch.ng/about-us/brief-history/" class="nav-item nav-link">About NMS</a>
                <!-- <a href="https://nmscompendium.com.ng/guide/" class="nav-item nav-link">Quick Guide</a> -->
                <a href="https://nmscompendium.com.ng/feedback/" class="nav-item nav-link">Contact Us</a>
            </div>
            <a href="/auth/signup/" class="btn btn-danger py-4 px-lg-5 d-none d-lg-block">Subscribe Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container">
        <div class="feedback-section">
            <div class="feedback-header">
                <h1 class="display-4">Leave Your Feedback</h1>
                <p class="lead">We value your input to improve our services</p>
            </div>

            <div class="feedback-points">
                <h5>We'd love to hear about:</h5>
                <ul>
                    <li>Features you'd like to see in the online compendium</li>
                    <li>Any difficulties you're experiencing with the compendium</li>
                    <li>Issues with questions or their options</li>
                    <li>Any questions you might have</li>
                    <li>Any other help or assistance you need</li>
                </ul>
            </div>

            <?php
            if(isset($_SESSION['feedback'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUCCESS</strong> <?php echo $_SESSION['feedback'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                unset($_SESSION['feedback']);
            }
            ?>

            <form action="submit_feedback.php" method="post" class="feedback-form">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="feedback" class="form-label">Your Feedback</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </form>
        </div>
    </div>
</body>
</html>
