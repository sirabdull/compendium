<?php
require '../vendor/autoload.php';

require "../config/config.php";

use Bayscope\Paystack\Transaction\Singlecharge;

if (isset($_POST['reference'])) {
    $reference = $_POST['reference'];
    $paystack = new Singlecharge('sk_live_5fdf7e4e891a4629da36a438a3a2b22e56aa5b8e');
    $tranx = $paystack->verifyTransaction($reference);

    if (isset($tranx->data)) {
        if ($tranx->data->status === 'success') {
            $email = $tranx->data->customer->email;
            $conn->prepare("UPDATE registerd_candidates SET subscriped = 1 WHERE email = '$email'")->execute();
            return json_encode(['status' => 'success', 'message' => 'Payment was successfully verified you can login now']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'sorry we could\'nt verify your payment please contact support']);
        }
    } else {
        echo json_encode($tranx);

    }
}