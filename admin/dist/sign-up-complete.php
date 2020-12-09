<?php

include 'Conn.php';
session_start();
   
        $amount = $_SESSION['amount'];

        $currency = $_SESSION['currency'];
$email=$_SESSION['email'];
$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_d3608d4af596236e06c4cfe793eae0dcf3f099dc",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
     $sqls = "delete from user where email='$email'";
                              if (mysqli_query($conn, $sqls)) { echo 'Transaction Failed';}
}

$tranx = json_decode($response);

if(!$tranx->status){
     $sqls = "delete from user where email='$email'";
                              if (mysqli_query($conn, $sqls)) { echo 'Transaction Failed';}
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){
  $sqls = "update user set paid='yes' where email='$email'";
                              if (mysqli_query($conn, $sqls)) { echo 'You will be redirected to your dashboard soon';
                                                              echo'<script>setTimeout(function(){window.location="profile.php"},2000);</script>';
                                                              }
}else{ $sqls = "delete from user where email='$email'";
                              if (mysqli_query($conn, $sqls)) { echo 'Transaction Failed';}}