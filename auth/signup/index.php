<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTER | Common entrance past questions (NMS)</title>
  <link rel="icon" href="/nms-logo.webp" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      background-color: #ffffff;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 100%;
      max-width: 800px;
      display: flex;
      flex-direction: row;
    }

    .form-container {
      padding: 20px;
      width: 60%;
    }

    .image-container {
      background: url('/assets/bust.jpeg') center/cover no-repeat;
      width: 40%;
    }

    .logo {
      max-width: 60px;
      margin-bottom: 20px;
    }

    h2 {
      color: #163020;
      margin-bottom: 15px;
      font-size: 1.3em;
    }

    .input-group {
      margin-bottom: 10px;
    }

    .input-group label {
      display: block;
      margin-bottom: 2px;
      color: #555;
      font-size: 0.8em;
    }

    .input-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 0.9em;
    }

    .btn {
      background-color: #163020;
      color: #ffffff;
      border: none;
      padding: 10px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 1em;
      transition: background-color 0.3s;
      width: 100%;
      margin-top: 10px;
    }

    .btn:hover {
      background-color: #0f2315;
    }

    .login-link {
      text-align: center;
      margin-top: 12px;
      font-size: 0.8em;
    }

    .login-link a {
      color: #163020;
      text-decoration: none;
    }

    .error-message {
      color: #ff0000;
      margin-bottom: 10px;
      font-size: 0.9em;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 500px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .form-container,
      .image-container {
        width: 100%;
      }

      .image-container {
        height: 200px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="form-container">
      <img src="/nms-logo.webp" alt="NMS Logo" class="logo">
      <h2>Start using past questions</h2>
      <?php
      if (isset($_SESSION['failed'])) {
        echo '<div class="error-message">' . $_SESSION['failed'] . '</div>';
        unset($_SESSION['failed']);
      }
      ?>
      <form action="/auth/signup/register.php" method="post" id="signupForm">
        <div class="input-group">
          <label for="firstname">First Name</label>
          <input type="text" id="firstname" name="firstname" required>
        </div>
        <div class="input-group">
          <label for="lastname">Last Name</label>
          <input type="text" id="lastname" name="lastname" required>
        </div>
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
          <label for="pass">Password</label>
          <input type="password" id="pass" name="pswd" required>
        </div>
        <div class="input-group">
          <label for="mobile">Mobile</label>
          <input type="tel" id="mobile" name="mobile" required>
        </div>
        <div class="input-group">
        
        </div>
        <button type="submit" class="btn">Sign Up</button>
      </form>
      <div class="login-link">
        Already have an account? <a href="/auth/login">Log In</a>
      </div>
      <button id="formNumberBtn" class="btn" style="margin-top: 20px;">Continue with Form Number</button>
      <label for="terms" style="font-size:12px;">If you already purchased your NMS common entrance examination form you can skip registration and continue with your form number</label>
    </div>
    <div class="image-container"></div>
  </div>

  <div id="formNumberModal" class="modal">
    <div class="modal-content">
      <span class="close">×</span>
      <h2>Enter Form Number</h2>
      <form id="formNumberForm">
        <div class="input-group">
          <label for="formNumber">Form Number</label>
          <input placeholder="NMS-F4320" type="text" id="formNumber" name="formNumber" required>
        </div>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('signupForm').addEventListener('submit', function (event) {
      event.preventDefault();
      if (validateForm()) {
        this.submit();
      }
    });

    function validateForm() {
      var firstname = document.getElementById('firstname').value;
      var lastname = document.getElementById('lastname').value;
      var email = document.getElementById('email').value;
      var password = document.getElementById('pass').value;
      var mobile = document.getElementById('mobile').value;

      if (firstname.trim() === '' || lastname.trim() === '') {
        alert('Please enter both first and last name');
        return false;
      }

      if (!isValidEmail(email)) {
        alert('Please enter a valid email address');
        return false;
      }

      if (password.length < 6) {
        alert('Password must be at least 8 characters long');
        return false;
      }

      if (!isValidMobile(mobile)) {
        alert('Please enter a valid mobile number');
        return false;
      }

      return true;
    }

    function isValidEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }

    function isValidMobile(mobile) {
      var re = /^[0-9]{10,14}$/;
      return re.test(mobile);
    }

    // Modal functionality
    var modal = document.getElementById("formNumberModal");
    var btn = document.getElementById("formNumberBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
      modal.style.display = "block";
    }

    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    document.getElementById('formNumberForm').addEventListener('submit', function(event) {
      event.preventDefault();
      var formNumber = document.getElementById('formNumber').value;
      window.location.href = '/auth/mainsite?token=' + encodeURIComponent(formNumber);
    });
  </script>
</body>

</html>