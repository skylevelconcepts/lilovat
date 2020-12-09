<?php 
session_start();
include_once('Conn.php');
   $sql = "SELECT * FROM courses WHERE adid='$productid'";
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){}
switch ($_GET['page']){
    case 'deletecart':
    $id = $_POST["id"] ;
    $sql="delete from cart where adid='$id'";
    if (mysqli_query($conn, $sql)) {
        echo'True';
    }    
        break;
    case 'addtocart':
        if (isset($_SESSION["userid"])){
$userid = $_SESSION["userid"] ;
    
    if(isset($_POST['id'])){
    $productid=$_POST['id'];
     $sql = "SELECT * FROM products WHERE adid='$productid'";
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
                 $product = $row['name'];
               $price = $row['price'];
             $sqls = "SELECT * FROM cart WHERE product='$product' and userid='$userid'";
           $qrys = $conn->query($sqls);
               if($qrys->num_rows >0){
                 echo 'false';
               }else{   $sql = "INSERT INTO cart(product,price,userid) VALUES ('$product','$price','$userid')";
            if (mysqli_query($conn, $sql)) {
       $sqls = "SELECT * FROM cart where userid='$userid'";
           $qrys = $conn->query($sqls);
               $num = $qrys->num_rows;
                echo $num;
}else{
	
            }}
               
               
             
           }
       
}
    
}else{
 
    $userid = $_SERVER['REMOTE_ADDR'];
   
    if(isset($_POST['id'])){
    $productid=$_POST['id'];
     $sql = "SELECT * FROM products WHERE adid='$productid'";
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
                 $product = $row['name'];
               $price = $row['price'];
             $sqls = "SELECT * FROM cart WHERE product='$product' and userid='$userid'";
           $qrys = $conn->query($sqls);
               if($qrys->num_rows >0){
                echo 'false';
               }else{   $sql = "INSERT INTO cart(product,price,userid) VALUES ('$product','$price','$userid')";
            if (mysqli_query($conn, $sql)) {
        $sqls = "SELECT * FROM cart where userid='$userid'";
           $qrys = $conn->query($sqls);
               $num=$qrys->num_rows;
                echo $num;
}else{
	
            }}
               
               
             
           }
       
}
    
    
}
break;
    case 'cart':
           if (isset($_SESSION["userid"])){
$userid = $_SESSION["userid"] ;
   
}else{
    $userid = $_SERVER['REMOTE_ADDR'];
    
    
}

    if (isset($_POST['price'])){
       $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $id = $_POST['id'];
     
            
             $sqlt = "update cart set quantity='$quantity', price='$price' where adid='$id'";
                    if (mysqli_query($conn, $sqlt)) {
    $sql = "SELECT * FROM cart where userid='$userid'";
           $qry = $conn->query($sql);
                 $i  = 0;   
               $var=0;         
           while($row = $qry->fetch_assoc()){
               
               $qty[$i] = $row['quantity'];
          intval($qty[$i]);
               $arrlength =count($qty);
     
               for($x = 0; $x < $arrlength; $x++) {
                
    $var=$var+$qty[$x];
    
}
              
                    
             $i++;
           }

    $vaa=0;
    while($row = $qry->fetch_assoc()){
               
               $tot = intval(str_replace(',','',$price))*intval($row['quantity']);
          
               
     
               
                
    $vaa=$tot+$vaa;
    

              
                    
           echo $vaa;  
           }
    
                      
                        
}else{

}
       
               }
    
        
        break;
        case 'checkout' : 
    
                        if(isset($_POST['firstname'])){
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $phone = $_POST['number'];
                            $email = $_POST['email'];
                           $busstop = $_POST['busstop'];
                            $address = $_POST['address'];
                            $total = $_POST['total'];
                            $userid=$_SESSION['userid'];
                           $shippingaddress = $address;
                        if($_POST['shipping']=''){
                    $shippingaddress = $_POST['shipping'];
                        } $sqls = "select * from billing where userid='$userid'";
                  $qrys = $conn->query($sqls);
                    if ($qrys ->num_rows > 0){
                        
                        $sql = "update billing set firstname='$firstname',lastname='$lastname',phone='$phone',email='$email',address='$address',busstop='$busstop',shippingaddress='$shippingaddress' where userid='$userid'";
            if (mysqli_query($conn, $sql)) {
                
                $orderno = rand();
                $paymentmethod='Cash';
                $date=date('Y/m/d').' '.date('H:m:i');
                $status='Processing';
      $sql = "INSERT INTO transaction(orderno,paymentmethod,date,status,userid,total) VALUES ('$orderno','$paymentmethod','$date','$status','$userid','$total')";
            if (mysqli_query($conn, $sql)) {
      $sql = "SELECT * FROM transaction WHERE orderno='$orderno'";
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
                $id = $row['adid'];
               $_SESSION['transactionid'] = $row['adid'];
               $sql = "SELECT * FROM cart WHERE userid='$userid'";
           $qry = $conn->query($sql);
           while($cart = $qry->fetch_assoc()){
                $product=$cart['product'];
               $quantity=$cart['quantity'];
               $sql = "INSERT INTO transactiondetails(transactionid,product,price,quantity,userid) VALUES ('$id','$product','$total','$quantity','$userid')";
               if (mysqli_query($conn, $sql)) {
                   $sql="DELETE FROM cart
WHERE userid='$userid' ";
                   if (mysqli_query($conn, $sql)) {
                       echo 'True';
                   }else{
                     echo 'Tr';  
                   }
                   
               }else{
                   echo 'Error';
               }
           }
           }
}else{
	echo 'Error !';
            }
}else{
	echo 'Error !';
            }    
                  
                    
                    
                    }else{
                        
                          $sql = "INSERT INTO billing(firstname,lastname,phone,email,address,busstop,shippingaddress,userid) VALUES ('$firstname','$lastname','$phone','$email','$address','$busstop','$shippingaddress','$userid')";
            if (mysqli_query($conn, $sql)) {
                
                $orderno = rand();
                $paymentmethod='Cash';
                $date=date('Y/m/d').' '.date('H:m:i');
                $status='Processing';
      $sql = "INSERT INTO transaction(orderno,paymentmethod,date,status,userid,total) VALUES ('$orderno','$paymentmethod','$date','$status','$userid','$total')";
            if (mysqli_query($conn, $sql)) {
      $sql = "SELECT * FROM transaction WHERE orderno='$orderno'";
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
                $id = $row['adid'];
               $_SESSION['transactionid'] = $row['adid'];
               $sql = "SELECT * FROM cart WHERE userid='$userid'";
           $qry = $conn->query($sql);
           while($cart = $qry->fetch_assoc()){
                $product=$cart['product'];
               $quantity=$cart['quantity'];
               $sql = "INSERT INTO transactiondetails(transactionid,product,price,quantity,userid) VALUES ('$id','$product','$total','$quantity','$userid')";
               if (mysqli_query($conn, $sql)) {
                   $sql="DELETE FROM cart
WHERE userid='$userid' ";
                   if (mysqli_query($conn, $sql)) {
                       echo 'True';
                   }else{
                     echo 'Tr';  
                   }
                   
               }else{
                   echo 'Error';
               }
           }
           }
}else{
	echo 'Error !';
            }
}else{
	echo 'Error !';
            }    
                  
                    
                      }
                        }
                        else{
            echo 'I am not working';
        }  
        
    
            break;
        
case 'register' : 
    
                        if(isset($_POST['name'])){
                            $name = mysqli_real_escape_string($conn,$_POST['name']);
                            $address = mysqli_real_escape_string($conn,$_POST['address']);
                            $education = mysqli_real_escape_string($conn,$_POST['education']);
                            $email = mysqli_real_escape_string($conn,$_POST['email']);
                            $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
                            $phone = mysqli_real_escape_string($conn,$_POST['phone']);
                         $sqls = "select * from user where email='$email' or phone='$phone'";
                  $qrys = $conn->query($sqls);
                    if ($qrys -> num_rows > 0){
                          echo 'False';
                    }else{
                         $sql = "INSERT INTO user(name,password,email,phone,education) VALUES('$name','$password','$email','$phone','$education')";
            if (mysqli_query($conn, $sql)) {
      echo 'True';
}else{
	echo 'Error !';
            }    
                    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' limit 1 ";
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
              $ip = $_POST['ip'];
               $userid = $row['adid'];
                 $_SESSION["userid"] = $row['adid'];
                  $sqls = "SELECT * FROM cart where userid='$ip'";
           $qryls = $conn->query($sqls);
                            if ($qryls -> num_rows >0){
                                   $sqlt = "update cart set userid='$userid' where userid='$ip'";
                    if (mysqli_query($conn, $sqlt)) {
    
}else{
	
} 
           }
}
                    }
                        }
                        else{
            echo 'I am not working';
        }  
        
    
            break;
        
        
        
        
    case 'login':
        

                        if(isset($_POST['email'])){
                            $name=mysqli_real_escape_string($conn,$_POST['email']);
                            $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
                         $sqls = "select * from user where email='$name' and password='$password'";
                  $qrys = $conn->query($sqls);
                    if ($qrys -> num_rows > 0){
                          echo 'True';
                                 $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' limit 1 ";
           $qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
             $ip=$_POST['ip'];
               $userid=$row['adid'];
                 $_SESSION["userid"] = $row['adid'];
                  $sqlls = "SELECT * FROM cart where userid='$ip'";
           $qryls = $conn->query($sqlls);
                            if ($qryls -> num_rows >0){
                                  $sqlt = "update cart set userid='$userid' where userid='$ip'";
                    if (mysqli_query($conn, $sqlt)) {
    
}else{
	
} 
           }
                    }
                    }
                        }else{
         echo 'I am not working';
    }
      
        break;
default :
         echo 'I am not working';
    }
 ?>
