<?php
session_start();
require '../vendor/autoload.php';

$email = $_SESSION['email'];
$reference = rand(5000, 1934532523455999);
$date = date('d/m/Y / H:i:sa');

$paystack = new Bayscope\Paystack\Transaction\Singlecharge('sk_live_5fdf7e4e891a4629da36a438a3a2b22e56aa5b8e');

if (isset($_POST['pay_ultimate'])) {
  $plan = 'ULTIMATE';
  $expire = 'NEVER';
  $amount = 5000 * 100;
  try {
    $tranx = $paystack->setData([
      'amount' => $amount,
      'email' => $email,
      'reference' => $reference,
      'callback_url' => 'https://nmscompendium.com.ng/subscription/callback.php?amount=' . $amount . '&email=' . $email . '&date=' . $date . '&plan=' . $plan . '&expire=' . $expire
    ])->initialize();

    if ($tranx->status) {
      header('Location: ' . $tranx->data->authorization_url);
    } else {
      echo 'Error: ' . $tranx->message;
    }
  } catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

if (isset($_POST['pay_premium'])) {
  $plan = 'PREMIUM';
  $time = strtotime('+90 days');
  $expire = date('l,d/m/Y', $time);
  $amount = 3000 * 100;
  try {
    $tranx = $paystack->setData([
      'amount' => $amount,
      'email' => $email,
      'reference' => $reference,
      'callback_url' => 'https://nmscompendium.com.ng/subscription/callback.php?amount=' . $amount . '&email=' . $email . '&date=' . $date . '&plan=' . $plan . '&expire=' . $expire
    ])->initialize();

    if ($tranx->status) {
      header('Location: ' . $tranx->data->authorization_url);
    } else {
      echo 'Error: ' . $tranx->message;
    }
  } catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

if (isset($_POST['pay_basic'])) {
  $plan = 'BASIC';
  $time = strtotime('+60 days');
  $expire = date('l,d/m/Y', $time);
  $amount = 2500 * 100;
  try {
    $tranx = $paystack->setData([
      'amount' => $amount,
      'email' => $email,
      'reference' => $reference,
      'callback_url' => 'https://nmscompendium.com.ng/subscription/callback.php?amount=' . $amount . '&email=' . $email . '&date=' . $date . '&plan=' . $plan . '&expire=' . $expire
    ])->initialize();

    if ($tranx->status) {
      header('Location: ' . $tranx->data->authorization_url);
    } else {
      echo 'Error: ' . $tranx->message;
    }
  } catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

if (!isset($_POST['pay_ultimate']) && !isset($_POST['pay_premium']) && !isset($_POST['pay_basic'])) {
  echo 'No payment selected';
}

unset($_POST['pay']);