<?php
session_start();

require "../../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['pswd'];

    $stmt = $conn->prepare("SELECT * FROM `registerd_candidates` WHERE `email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows <= 0 || $password !== $row['password']) {
        $_SESSION['login_failed'] = "Invalid credentials!";
        header("Location: /auth/login");
        exit();
    }

    if ($row['verification'] != 1) {
        $_SESSION['login_failed'] = "Email not verified!";
        header("Location: ../verification?email=" . urlencode($email));
        exit();
    }

    if ($row['subscribed'] != 1) {
        $_SESSION['login_failed'] = "Please subscribe to a plan to start practicing!";
        header("Location: /subscription/sub.php?email=" . urlencode($email));
        exit();
    }

    $_SESSION['email'] = $email;

    if (isset($_POST['remember'])) {
        setcookie('remember', $email, time() + (86400 * 30), "/"); // 30 days
    }

    unset($_SESSION['login_failed']);
    header("Location: /auth/authenticate.php?email=" . urlencode($email));
    exit();
}
