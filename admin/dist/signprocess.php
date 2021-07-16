<?php

include 'Conn.php';
session_start();
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$_SESSION['email']=$_POST['email'];
$lastname=$_POST['lastname'];
$location=$_POST['location'];
$number=$_POST['number'];

$txref = uniqid('dashme-');

$password=md5($_POST['password']);
       $sqls = "INSERT INTO user(firstname,lastname,email,location,password,number,paid,uniqueid) VALUES ('$firstname','$lastname','$email','$location','$password','$number','no','$txref')";
            if (mysqli_query($conn, $sqls)) {}




// this is only required for recurring payments.


$curl = curl_init();


$amount = 300000;  //the amount in kobo. This value is actually NGN 300

// url to go to after payment
$callback_url = 'https://dashmediscount.com/sign-up-complete.php';  

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_d3608d4af596236e06c4cfe793eae0dcf3f099dc", //replace this with your own test key
    "content-type: application/json",
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

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
    $sqls = "delete from user where email='$email'";
                              if (mysqli_query($conn, $sqls)) { echo 'Transaction Failed';}
}

// comment out this line if you want to redirect the user to the payment page
print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);
