<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN | Common entrance past questions (NMS)</title>
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
      background: url('/assets/nms-lohg.jpg') center/cover no-repeat;
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

    .signup-link {
      text-align: center;
      margin-top: 12px;
      font-size: 0.8em;
    }

    .signup-link a {
      color: #163020;
      text-decoration: none;
    }

    .error-message {
      color: #ff0000;
      margin-bottom: 10px;
      font-size: 0.9em;
    }

    #verifyPaymentBtn {
      background-color: #4CAF50;
      margin-top: 20px;
    }

    #verifyPaymentBtn:hover {
      background-color: #45a049;
    }

    #transactionIdInput {
      display: none;
      margin-top: 10px;
    }

    .verify-description {
      font-size: 0.8em;
      color: #555;
      margin-top: 5px;
    }

    .loader {
      border: 4px solid #f3f3f3;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      animation: spin 1s linear infinite;
      display: none;
      margin: 10px auto;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
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
      <h2>Login to access past questions</h2>
      <?php
      if (isset($_SESSION['login_failed'])) {
        echo '<div class="error-message">' . $_SESSION['login_failed'] . '</div>';
        unset($_SESSION['login_failed']);
      }
      ?>
      <form action="/auth/login/login.php" method="post" id="loginForm">
        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
          <label for="pwd">Password</label>
          <input type="password" id="pwd" name="pswd" required>
        </div>
        <button type="submit" class="btn">Login</button>
      </form>
      <div class="signup-link">
        Don't have an account? <a href="/auth/signup/">Sign Up</a>
      </div>
      <div class="signup-link">
        <a href="/auth/recover/">Forgot password?</a>
      </div>
      <button id="verifyPaymentBtn" class="btn">Verify Payment</button>
      <p class="verify-description">If you have made a payment but still can't login or access compendium, click the button above to verify your payment.</p>
      <form action="/subscription/verify.php" method="post" id="verifyPaymentForm">
        <div class="input-group" id="transactionIdInput">
          <label for="transactionId">Transaction Reference</label>
          <input type="text" id="transactionId" name="reference" required>
          <p class="verify-description">Please check the payment receipt that was sent to your email and provide the Reference here.</p>
          <button type="submit" class="btn"> <div class="loader" id="loader"></div> Verify</button>
        </div>
      </form>
     
    </div>
    <div class="image-container"></div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function (event) {
      event.preventDefault();
      if (validateForm()) {
        this.submit();
      }
    });

    function validateForm() {
      var email = document.getElementById('email').value;
      var password = document.getElementById('pwd').value;

      if (!isValidEmail(email)) {
        alert('Please enter a valid email address');
        return false;
      }

      if (password.trim() === '') {
        alert('Please enter your password');
        return false;
      }

      return true;
    }

    function isValidEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }

    document.getElementById('verifyPaymentBtn').addEventListener('click', function() {
      var transactionIdInput = document.getElementById('transactionIdInput');
      if (transactionIdInput.style.display === 'none' || transactionIdInput.style.display === '') {
        transactionIdInput.style.display = 'block';
      } else {
        transactionIdInput.style.display = 'none';
      }
    });

    document.getElementById('verifyPaymentForm').addEventListener('submit', function(event) {
      event.preventDefault();
      var loader = document.getElementById('loader');
      loader.style.display = 'block';
      
      fetch('/subscription/verify.php', {
        method: 'POST',
        body: new FormData(this)
      })
      .then(response => response.json())
      .then(data => {
        loader.style.display = 'none';
        // Handle the response here
        alert(data.message); // You can replace this with a more user-friendly way to show the result
      })
      .catch(error => {
        loader.style.display = 'none';
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
      });
    });
  </script>
</body>

</html>