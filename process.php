<?php

include_once('Conn.php');


switch ($_POST['page']) {
    case 'deletecart':
        $id = $_POST["id"];
        $sql = "delete from cart where adid='$id'";
        if (mysqli_query($conn, $sql)) {
            echo 'True';
        }
        break;
    case 'del':
        $id = $_POST["id"];
        $sql = "delete from training where adid='$id'";
        if (mysqli_query($conn, $sql)) {
            echo 'True';
        }
        break;
    case 'contact':
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $date = date('D/M/Y H:i:s');
        $sql = "INSERT INTO contact(subject,email,message,name,phone,date) VALUES ('$subject','$email','$message','$name','$phone','$date')";
        if (mysqli_query($conn, $sql)) {
            //                
            $from = 'info@lilovat.com';

            $to = $email;

            $headers = "From: $from";
            $headers = "From: Lilovat Solar Technology\r\n";
            $headers .= "Reply-To: " . $from . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


            $subject = "Thank you for contacting us";
            $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Thank You!</title></head><body>";
            $body .= "<table style='width: 100%;'>";
            $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
            $body .= "<br>";
            $body .= "<tbody>";

            $body .= "<tr><td colspan='2' style='border:none;'>Thank you for contacting Us . We'll reply you soonest.</td></tr>";
            $body .= "</tbody></table>";
            $body .= "</body></html>";
            mail($to, $subject, $body, $headers);
            echo 'True';
        } else {
            echo 'Error !';
        }
        break;
    case 'enrol':
        if (isset($_SESSION["userid"])) {
            if ($_SESSION["userid"] == $_SERVER['REMOTE_ADDR']) {
                echo 'register';
            } else {
                $userid = $_SESSION["userid"];
                if (isset($_POST['id'])) {
                    $courseid = $_POST['id'];
                    $sqls = "SELECT * FROM enrolled where userid='$userid' and courseid='$courseid'";
                    $qrys = $conn->query($sqls);
                    if ($qrys->num_rows > 0) {
                        echo 'exists';
                    } else {
                        $sql = "INSERT INTO enrolled(courseid,userid) VALUES ('$courseid','$userid')";
                        if (mysqli_query($conn, $sql)) {
                            echo 'done';
                        }
                    }
                } else if (isset($_POST['idc'])) {
                }
            }
        } else {
            echo 'register';
        }
        break;

    case 'addtocart':
        if (isset($_SESSION["userid"])) {
            $userid = $_SESSION["userid"];
            if (isset($_POST['type'])) {
                if ($_POST['type'] == 'course') {
                    if (isset($_POST['id'])) {
                        $productid = $_POST['id'];
                        $sql = "SELECT * FROM courses WHERE adid='$productid'";
                        $qry = $conn->query($sql);
                        while ($row = $qry->fetch_assoc()) {
                            $product = $row['name'];
                            $price = $row['price'];
                            $sqls = "SELECT * FROM cart WHERE product='$product' and userid='$userid'";
                            $qrys = $conn->query($sqls);
                            if ($qrys->num_rows > 0) {
                                echo 'false';
                            } else {
                                $sql = "INSERT INTO cart(product,price,userid) VALUES ('$product','$price','$userid')";
                                if (mysqli_query($conn, $sql)) {
                                    $sqls = "SELECT * FROM cart where userid='$userid'";
                                    $qrys = $conn->query($sqls);
                                    $num = $qrys->num_rows;
                                    echo $num;
                                } else {
                                    echo 'false';
                                }
                            }
                        }
                    }
                }
            } else {
                if (isset($_POST['id'])) {
                    $productid = $_POST['id'];
                    $sql = "SELECT * FROM products WHERE adid='$productid'";
                    $qry = $conn->query($sql);
                    while ($row = $qry->fetch_assoc()) {
                        $product = $row['name'];
                        $price = $row['price'];
                        $sqls = "SELECT * FROM cart WHERE product='$product' and userid='$userid'";
                        $qrys = $conn->query($sqls);
                        if ($qrys->num_rows > 0) {
                            echo 'false';
                        } else {
                            $sql = "INSERT INTO cart(product,price,userid) VALUES ('$product','$price','$userid')";
                            if (mysqli_query($conn, $sql)) {
                                $sqls = "SELECT * FROM cart where userid='$userid'";
                                $qrys = $conn->query($sqls);
                                $num = $qrys->num_rows;
                                echo $num;
                            } else {
                            }
                        }
                    }
                }
            }
        } else {

            $userid = $_SERVER['REMOTE_ADDR'];
            if (isset($_POST['type'])) {
                if ($_POST['type'] == 'course') {
                    if (isset($_POST['id'])) {
                        $productid = $_POST['id'];
                        $sql = "SELECT * FROM courses WHERE adid='$productid'";
                        $qry = $conn->query($sql);
                        while ($row = $qry->fetch_assoc()) {
                            $product = $row['name'];
                            $price = $row['price'];
                            $sqls = "SELECT * FROM cart WHERE product='$product' and userid='$userid'";
                            $qrys = $conn->query($sqls);
                            if ($qrys->num_rows > 0) {
                                echo 'false';
                            } else {
                                $sql = "INSERT INTO cart(product,price,userid) VALUES ('$product','$price','$userid')";
                                if (mysqli_query($conn, $sql)) {
                                    $sqls = "SELECT * FROM cart where userid='$userid'";
                                    $qrys = $conn->query($sqls);
                                    $num = $qrys->num_rows;
                                    echo $num;
                                } else {
                                }
                            }
                        }
                    }
                }
            } else {
                if (isset($_POST['id'])) {
                    $productid = $_POST['id'];
                    $sql = "SELECT * FROM products WHERE adid='$productid'";
                    $qry = $conn->query($sql);
                    while ($row = $qry->fetch_assoc()) {
                        $product = $row['name'];
                        $price = $row['price'];
                        $sqls = "SELECT * FROM cart WHERE product='$product' and userid='$userid'";
                        $qrys = $conn->query($sqls);
                        if ($qrys->num_rows > 0) {
                            echo 'false';
                        } else {
                            $sql = "INSERT INTO cart(product,price,userid) VALUES ('$product','$price','$userid')";
                            if (mysqli_query($conn, $sql)) {
                                $sqls = "SELECT * FROM cart where userid='$userid'";
                                $qrys = $conn->query($sqls);
                                $num = $qrys->num_rows;
                                echo $num;
                            } else {
                            }
                        }
                    }
                }
            }
        }
        break;
    case 'cart':
        if (isset($_SESSION["userid"])) {
            $userid = $_SESSION["userid"];
        } else {
            $userid = $_SERVER['REMOTE_ADDR'];
        }

        if (isset($_POST['price'])) {
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $id = $_POST['id'];


            $sqlt = "update cart set quantity='$quantity', price='$price' where adid='$id'";
            if (mysqli_query($conn, $sqlt)) {
                $sql = "SELECT * FROM cart where userid='$userid'";
                $qry = $conn->query($sql);
                $i  = 0;
                $var = 0;
                while ($row = $qry->fetch_assoc()) {

                    $qty[$i] = $row['quantity'];
                    intval($qty[$i]);
                    $arrlength = count($qty);

                    for ($x = 0; $x < $arrlength; $x++) {

                        $var = $var + $qty[$x];
                    }


                    $i++;
                }

                $vaa = 0;
                while ($row = $qry->fetch_assoc()) {

                    $tot = intval(str_replace(',', '', $price)) * intval($row['quantity']);





                    $vaa = $tot + $vaa;




                    echo $vaa;
                }
            } else {
            }
        }


        break;
    case 'checkout':

        if (isset($_POST['id'])) {
            $userid = $_POST['id'];
            $orderno = rand();
            $paymentmethod = 'Cash';
            $date = date('Y/m/d') . ' ' . date('H:m:i');
            $status = 'Processing';
            $sql = "INSERT INTO transaction(orderno,paymentmethod,date,status,userid) VALUES ('$orderno','$paymentmethod','$date','$status','$userid')";
            if (mysqli_query($conn, $sql)) {
                $sql = "SELECT * FROM transaction WHERE orderno='$orderno'";
                $qry = $conn->query($sql);
                while ($row = $qry->fetch_assoc()) {
                    $id = $row['adid'];
                    $_SESSION['transactionid'] = $row['adid'];
                    $sql = "SELECT * FROM cart WHERE userid='$userid'";
                    $qr = $conn->query($sql);
                    $total = 0;
                    while ($cart = $qr->fetch_assoc()) {
                        $price = intval(str_replace(',', '', $cart['price']));
                        $quantity = intval($cart['quantity']);
                        if ($quantity == '') {
                            $quantity = 1;
                        }
                        $total = $total + ($price * $quantity);
                    }

                    $sql = "SELECT * FROM cart where userid='$userid'";
                    $qry = $conn->query($sql);
                    $echoe = '1000.00';
                    if ($qry->num_rows > 0) {
                        $count = 0;

                        while ($row = $qry->fetch_assoc()) {
                            $produc = $row['product'];
                            $sqls = "SELECT * FROM courses where name='$produc'";
                            $qrys = $conn->query($sqls);
                            if ($qrys->num_rows > 0) {
                                $echoe = '0.00';
                            }
                        }
                    }
                    $total = $total + $echoe;
                    $sqlt = "update transaction set total='$total' where  adid='$id'";
                    if (mysqli_query($conn, $sqlt)) {
                    }
                    $qr = $conn->query($sql);
                    while ($cart = $qr->fetch_assoc()) {
                        $product = $cart['product'];
                        $quantity = $cart['quantity'];

                        $sql = "INSERT INTO transactiondetails(transactionid,product,price,quantity,userid) VALUES ('$id','$product','$total','$quantity','$userid')";
                        if (mysqli_query($conn, $sql)) {

                            $sql = "DELETE FROM cart
WHERE userid='$userid' ";
                            if (mysqli_query($conn, $sql)) {
                                echo 'True';
                            } else {
                                echo 'Tr';
                            }
                        } else {
                            echo 'Error';
                        }
                    }
                }
            } else {
                echo 'Error !';
            }
        } else {
            echo 'Error !';
        }





        break;

    case 'register':

        if (isset($_POST['name'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $education = mysqli_real_escape_string($conn, $_POST['education']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $sql = "SELECT * FROM user WHERE email='$email' OR password='$password' ";
            $qrys = $conn->query($sql);
            if (isset($qrys->num_rows)) {
                if ($qrys->num_rows > 0) {
                    echo 'False';
                } else {
                    $sql = "INSERT INTO user(name,password,email,phone,education,address) VALUES('$name','$password','$email','$phone','$education','$address')";
                    if (mysqli_query($conn, $sql)) {
                        echo 'True';
                    } else {
                        echo 'Error !';
                    }
                    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' limit 1 ";
                    $qry = $conn->query($sql);
                    while ($row = $qry->fetch_assoc()) {
                        $ip = $_POST['ip'];
                        $userid = $row['adid'];
                        $_SESSION["userid"] = $row['adid'];
                        $sqls = "SELECT * FROM cart where userid='$ip'";
                        $qryls = $conn->query($sqls);
                        if ($qryls->num_rows > 0) {
                            $sqlt = "update cart set userid='$userid' where userid='$ip'";
                            if (mysqli_query($conn, $sqlt)) {
                            } else {
                            }
                        }
                    }
                }
            } else {
                echo 'False';
            }
        } else {
            echo 'I am not working';
        }


        break;




    case 'login':


        if (isset($_POST['email'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
            $sqls = "select * from user where email='$email' and password='$password'";
            $qrys = $conn->query($sqls);
            if ($qrys->num_rows > 0) {
                echo 'True';
                $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' limit 1 ";
                $qry = $conn->query($sql);
                while ($row = $qry->fetch_assoc()) {
                    $ip = $_POST['ip'];
                    $userid = $row['adid'];
                    $_SESSION["userid"] = $row['adid'];
                    $sqlls = "SELECT * FROM cart where userid='$ip'";
                    $qryls = $conn->query($sqlls);
                    if ($qryls->num_rows > 0) {
                        $sqlt = "update cart set userid='$userid' where userid='$ip'";
                        if (mysqli_query($conn, $sqlt)) {
                        } else {
                        }
                    }
                }
            }
        } else {
            echo 'I am not working';
        }

        break;

    case 'training':

        if (isset($_POST['name'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $location = mysqli_real_escape_string($conn, $_POST['location']);
            $sql = "SELECT * FROM training WHERE email='$email'";
            $qrys = $conn->query($sql);
            if (isset($qrys->num_rows)) {
                if ($qrys->num_rows > 0) {
                    echo 'False';
                } else {

                    $sql = "INSERT INTO training(name,email,phone,location) VALUES('$name','$email','$phone','$location')";
                    if (mysqli_query($conn, $sql)) {
                        echo 'True';
                    } else {
                        echo 'Error !';
                    }
                }
            } else {
                echo 'False';
            }
        } else {
            echo 'I am not working';
        }


        break;

    default:
        echo 'I am not working';
}
