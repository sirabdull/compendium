<?php
session_start();
require '../config/config.php';
$email = $_GET['email'];
$_SESSION['email'] = $email;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link rel="icon" href="/nms-logo.webp" type="image/webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }
        .header {
            background-color: #163020;
            color: white;
            padding: 2rem 0;
            margin-bottom: 3rem;
        }
        .card {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            max-width: 300px;
            margin: 0 auto;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card-img-top {
            height: 150px;
            object-fit: cover;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-title {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .card-subtitle {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .card-text ul {
            list-style-type: none;
            padding-left: 0;
        }
        .card-text li {
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .btn-subscribe {
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            background-color: #163020;
            border-color: #163020;
        }
        .btn-subscribe:hover {
            background-color: #0f2015;
            border-color: #0f2015;
        }
        .aria {
            width: 20px;
            height: 20px;
            vertical-align: middle;
            margin-right: 5px;
        }
        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 1rem;
        }
        .motto {
            font-style: italic;
            margin-bottom: 1rem;
        }
        .transaction-tips {
            background-color: #e9ecef;
            padding: 1rem;
            margin-top: 2rem;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header class="header text-center">
        <img src="/nms-logo.webp" alt="NMS Logo" class="logo">
        <h1>Choose Your Subscription Plan</h1>
        <p>Unlock your potential with our comprehensive study resources</p>
        <p class="motto">Discipline, Knowledge, and Patriotism</p>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="svg/rsm.jpg" class="card-img-top" alt="Premium Plan">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">Premium Plan</h5>
                        <h6 class="card-subtitle text-muted">
                            <img src="svg/aira.png" class='aria' alt="">3000
                        </h6>
                        <ul class="card-text mb-4">
                            <li><i class="fas fa-check-circle text-success me-2"></i>Three months access</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Access up to 20 years past questions</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Unlimited practice sessions</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Progress tracking</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Customizable learning</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Compete globally</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Admission guide and tips</li>
                        </ul>
                        <form action="initialize.php" method="post" class="mt-auto">
                            <input type="hidden" name="amount" value='2500'>
                            <input type="hidden" name="plan" value='PREMIUM'>
                            <button type="submit" name="pay_premium" class="btn btn-primary btn-subscribe">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="svg/aki.jpg" class="card-img-top" alt="Ultimate Plan">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">Ultimate Plan</h5>
                        <h6 class="card-subtitle text-muted">
                            <img src="svg/aira.png" class='aria' alt="">5000
                        </h6>
                        <ul class="card-text mb-4">
                            <li><i class="fas fa-check-circle text-success me-2"></i>Full time access (buy forever)</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Access full compendium past questions</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Unlimited practice sessions</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Progress tracking</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Customizable learning</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Compete globally</li>
                            <li><i class="fas fa-check-circle text-success me-2"></i>Admission guide and tips</li>
                        </ul>
                        <form action="initialize.php" method="post" class="mt-auto">
                            <input type="hidden" name="amount" value='5000'>
                            <input type="hidden" name="plan" value='ULTIMATE'>
                            <button type="submit" name="pay_ultimate" class="btn btn-primary btn-subscribe">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="transaction-tips">
            <h4>Tips for a Successful Transaction:</h4>
            <ul>
                <li>Ensure you have sufficient funds in your account before initiating the transaction.</li>
                <li>Double-check the subscription details before confirming your purchase.</li>
                <li>Use a secure and stable internet connection during the payment process.</li>
                <li>Keep your payment information confidential and do not share it with anyone.</li>
                <li>If you encounter any issues, please contact our support team for assistance.</li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
</body>
</html>