<?php
session_start();
require "../../config/config.php";

$password = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$fullname = htmlspecialchars($_POST['firstname'] . ' ' . $_POST['lastname']);
$mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
$times_stamp = date('Y-m-d H:i:s');
$otp = sprintf("%06d", mt_rand(100000, 999999));

$query = "INSERT INTO `registerd_candidates` (`fullname`, `password`, `mobile`, `email`, `reg_date`, `subscribed`, `subscription_type`, `verification`, `verification_code`) VALUES (?, ?, ?, ?, ?, 'false', 'NULL', 'false', ?)";

$authenticate_email = "SELECT * FROM `registerd_candidates` WHERE `email` = ?";
$authenticate_mobile = "SELECT * FROM `registerd_candidates` WHERE `mobile` = ?";

$stmt_email = $conn->prepare($authenticate_email);
$stmt_email->bind_param("s", $email);
$stmt_email->execute();
$result_email = $stmt_email->get_result();

$stmt_mobile = $conn->prepare($authenticate_mobile);
$stmt_mobile->bind_param("s", $mobile);
$stmt_mobile->execute();
$result_mobile = $stmt_mobile->get_result();

if ($result_email->num_rows > 0 && $result_mobile->num_rows > 0) {
    $_SESSION['failed'] = "The provided email address and mobile number are already registered to an account, please login.";
    header("Location: /auth/signup");
    exit();
} elseif ($result_email->num_rows > 0) {
    $_SESSION['failed'] = "The email you provided is already associated with an account, please login.";
    header("Location: /auth/signup");
    exit();
} elseif ($result_mobile->num_rows > 0) {
    $_SESSION['failed'] = "The provided mobile number is already associated with an account.";
    header("Location: /auth/signup");
    exit();
} else {
    unset($_SESSION['failed']);

    require "../../Mail/phpmailer/sendmail.php";

    $mail->Subject = 'Verification code';
    $mail->Body = "
    <p>Dear " . htmlspecialchars($fullname) . ",</p>
    <h3>Your verification code is <span style='color:blue;text-decoration:underline;font-family:sans-serif,tahoma;font-size:20px;letter-spacing:3px;'>" . htmlspecialchars($otp) . "</span></h3>
    <p>Thank you for your registration, we are glad to have you onboard.</p>
    <p>Please authenticate your email with the code above. Choose your preferred subscription to start practicing, to improve chances of gaining admission into the <span style='font-family:\"Lucida Sans\",sans-serif;margin:5px;color:purple;'>NIGERIAN MILITARY SCHOOL ZARIA</span>.</p>
    <ul>
        <li>Practice NMS entrance examination and likely interview questions</li>
        <li>A leaderboard system which allows you to compete amongst other applicants</li>
        <li>Admission guides and tips</li>
        <li>Progress and Experience tracking</li>
        <li>24/7 support</li>
    </ul>
    <p>With regards,</p>";

    try {
        if ($mail->send()) {
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssss", $fullname, $password, $mobile, $email, $times_stamp, $otp);
            $stmt->execute();
            
            header("Location: /auth/verification?email=" . urlencode($email));
            exit();
        } else {
            throw new Exception("Mailer Error: " . $mail->ErrorInfo);
        }
    } catch (Exception $e) {
        $_SESSION['failed'] = "Registration Failed. Authentication email could not be sent. Please check your connection or email and try again.";
        error_log($e->getMessage());
        header("Location: /auth/signup");
        exit();
    }
}