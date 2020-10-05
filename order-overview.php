 <script src="shop/js/jquery-1.12.3.min.js"></script> 
<?php
require_once('shop/header.php');

if (isset($_GET["delete"])){
$id = $_GET["delete"] ;
    $sql="delete from cart where adid='$id'";
    if (mysqli_query($conn, $sql)) {
        echo'<script> window.location="cart.php?deleted=yes";</script>';
    }
    
   
}else{
    
    
    
}

?>
<?php
                $sql = "SELECT * FROM cart where userid='$userid'";
           $qry = $conn->query($sql);
              if($qry->num_rows>0){
                                
                                
                            }else{
                                echo "<script>window.location='shop.php';</script>";
                            }
              ?>
<!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Checkout</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><a href="cart.php">Cart</a>/</li>
            <li><span>Checkout</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END --> 

  <!-- CONTAIN START --><?php
if(isset($_POST['name'])){
$name=mysqli_real_escape_string($conn, $_POST['name']);
$email=mysqli_real_escape_string($conn, $_POST['email']);
$company=mysqli_real_escape_string($conn, $_POST['company']);
$phone=mysqli_real_escape_string($conn, $_POST['phone']);
$address=mysqli_real_escape_string($conn, $_POST['address']);
$landmark=mysqli_real_escape_string($conn, $_POST['landmark']);
$billingemail=mysqli_real_escape_string($conn, $_POST['billingemail']);
     $sql = "SELECT * FROM billing where userid='$userid'";
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
    $sqlsi = "update billing set name='$name',email='$email',company='$company',phone='$phone',address='$address',landmark='$landmark',billingemail='$billingemail' where userid='$userid'";
                                if (mysqli_query($conn, $sqlsi)) {}
                            }else{
                                $sqlsi = "INSERT INTO billing(userid,name,email,company,phone,address,landmark,billingemail) VALUES ('$userid','$name','$email','$company','$phone','$address','$landmark','$billingemail')";
                                if (mysqli_query($conn, $sqlsi)) {}
                            }
    
}


?>
  <section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="checkout-step mb-40">
            <ul>
              <li> 
                  <a href="checkout.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">1</div>
                  </div>
                  <span>Shipping</span> 
                </a> 
              </li>
              <li class="active"> 
                <a href="order-overview.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">2</div>
                  </div>
                  <span>Order Overview</span> 
                </a> 
              </li>
              <li> 
                <a href="payment.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">3</div>
                  </div>
                  <span>Payment</span> 
                </a> 
              </li>
              <li> 
                <a href="order-complete.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">4</div>
                  </div>
                  <span>Order Complete</span> 
                </a> 
              </li>
              <li>
                <div class="step">
                  <div class="line"></div>
                </div>
              </li>
            </ul>
            <hr>
          </div>
          <div class="checkout-content">
            <div class="row">
              <div class="col-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Order Overview</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 mb-sm-30">
                <div class="cart-item-table commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                         <tr>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total(₦)</th>
                    <th>Action</th>
             
              </tr>
                      </thead>
                      <tbody>
                <script>
                var cara = new Array();</script>
              <?php
                
           $sql = "SELECT * FROM cart where userid='$userid'";
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
                                $count=0;
           while($row = $qry->fetch_assoc()){
               $total = $row['price'];
              
       $quantity = 1; 
               
if ($row['quantity']!=''){
    $quantity = $row['quantity'];
    
}
               $produc=$row['product'];
               $sqls = "SELECT * FROM courses where name='$produc'";
           $qrys = $conn->query($sqls);
                            if ($qrys -> num_rows >0){
                                
           while($ro = $qrys->fetch_assoc()){
               $pric=$ro['price'];
               if($row['price']!=''){
                $pr=str_replace(',','',$row['price']);   
               }else{
                   $pr=$pric;
               }
               if($pric==''){
                   $pric=0;
               }
           
               
    echo  '<tr class="row'.$row['adid'].'">
    <td>
                      <a href="#">
                        <div class="product-image">
                          <img alt="Stylexpo" src="'.$ro['image'].'">
                        </div>
                      </a>
                    </td>
                    <td>
                    <div class="product-title"> 
                        <a href="#">'.$row['product'].'</a> 
                      </div>
                    
                </td>
                <td>
                      <ul>
                        <li>
                          <div class="base-price price-box"> 
                            <span class="price">₦'.$pric.'</span> 
                          </div>
                        </li>
                      </ul>
                    </td>
                <td>
                 <form method="post" class="form">
                <input type="hidden" name="price" id="prse'.$row['adid'].'" >
                <input type="hidden"  name="id" value="'.$row['adid'].'">
                <input type="hidden"  name="page" value="cart">
                  
                  <div class="input-box">
                  <input type="text" value="'.$quantity.'" pattern="[0-1]" maxlength="2" min="0" max="10" name="quantity" id="'.$row['adid'].'" >
                        
                      </div>
                    </form>
                    
                    
                  </div>
                  </form>
                </td><td>
               
                  <h5 id="h'.$row['adid'].'" class="hos">12</h5>
                    <script>
                     var value = '.$quantity.';
                    var price = '.str_replace(",","",$pric).';
                var total = value * price;
                 $("#h5'.$row['adid'].'").text(total);
                    setInterval(function(){
                   
  var value = $("#'.$row['adid'].'").val();
                var price = '.str_replace(",","",$pric).';
                var total = value * price;
                $("#h'.$row['adid'].'").text(total);
                $("#prse'.$row['adid'].'").val(total);
                
                
                
                
                 },10);
              
 setInterval(function(){
                   var x'.$count.' = $(".hos:eq('.$count.')");
                 
                 cara['.$count.']=parseInt(x'.$count.'.text(), 10);
                 }, 10);
                 
                </script>
                </td> <td><form method="post" class="formdelete formdelete'.$row['adid'].'">
                
                <input type="hidden"  name="id" value="'.$row['adid'].'">
                <input type="hidden"  name="page" value="deletecart"><button class="btn-primary-outline" style="cursor:pointer;"type="submit"> <i class="fa fa-trash"></i></button></form></td></tr>
                <script>
                     jQuery(".formdelete'.$row['adid'].'").submit(function(){
                     jQuery(".row'.$row['adid'].'").fadeOut();
                     
                     });
                 
                </script>'; 
               
               $count++;
              
           }}else{
                                $sqls = "SELECT * FROM products where name='$produc'";
           $qrys = $conn->query($sqls);
                                if ($qrys -> num_rows >0){
                                
           while($ro = $qrys->fetch_assoc()){
               $pric=$ro['price'];
               if($row['price']!=''){
                $pr=str_replace(',','',$row['price']);   
               }else{
                   $pr=$pric;
               }
               
           
               
    echo  '<tr class="row'.$row['adid'].'">
    <td>
                      <a href="product-page.html">
                        <div class="product-image">
                          <img alt="Stylexpo" src="shop/'.$ro['image'].'">
                        </div>
                      </a>
                    </td>
                    <td>
                    <div class="product-title"> 
                        <a href="#">'.$row['product'].'</a> 
                      </div>
                    
                </td>
                <td>
                      <ul>
                        <li>
                          <div class="base-price price-box"> 
                            <span class="price">₦'.$pric.'</span> 
                          </div>
                        </li>
                      </ul>
                    </td>
                <td>
                 <form method="post" class="form">
                <input type="hidden" name="price" id="prse'.$row['adid'].'" >
                <input type="hidden"  name="id" value="'.$row['adid'].'">
                <input type="hidden"  name="page" value="cart">
                  
                  <div class="input-box">
                  <input type="text" value="'.$quantity.'" pattern="[0-1]" maxlength="2" min="0" max="10" name="quantity" id="'.$row['adid'].'" >
                        
                      </div>
                    </form>
                    
                    
                  </div>
                  </form>
                </td><td>
               
                  <h5 id="h'.$row['adid'].'" class="hos">12</h5>
                    <script>
                     var value = '.$quantity.';
                    var price = '.str_replace(",","",$pric).';
                var total = value * price;
                 $("#h5'.$row['adid'].'").text(total);
                    setInterval(function(){
                   
  var value = $("#'.$row['adid'].'").val();
                var price = '.str_replace(",","",$pric).';
                var total = value * price;
                $("#h'.$row['adid'].'").text(total);
                $("#prse'.$row['adid'].'").val(total);
                
                
                
                
                 },10);
              
 setInterval(function(){
                   var x'.$count.' = $(".hos:eq('.$count.')");
                 
                 cara['.$count.']=parseInt(x'.$count.'.text(), 10);
                 }, 10);
                 
                </script>
                </td> <td><form method="post" class="formdelete formdelete'.$row['adid'].'">
                
                <input type="hidden"  name="id" value="'.$row['adid'].'">
                <input type="hidden"  name="page" value="deletecart"><button class="btn-primary-outline" style="cursor:pointer;"type="submit"> <i class="fa fa-trash"></i></button></form></td></tr>
                <script>
                     jQuery(".formdelete'.$row['adid'].'").submit(function(){
                     jQuery(".row'.$row['adid'].'").fadeOut();
                     
                     });
                 
                </script>'; 
               
               $count++;
              
           }}
                            }}
                            }else {
                                echo '<tr>
                      <td>nil</td>
                      <td>nil</td>
                      <td>nil</td>
                      <td>nil</td>
                      <td>nil</td>
                      <td>nil</td>
                    </tr>
                        ';
                                
                            }
                    ?>
              
              
             
              <tr class="bottom_button">
               
               
              </tr>
                
             
              
                
            </tbody>
                    </table>
                  </div>
                </div>
                <div class="cart-total-table commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Cart Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Item(s) Subtotal</td>
                      <td>
                        <div class="price-box"> 
                          ₦<span class="price" id="subtotal"></span> 
                                  
               </script>
                        </div>
                      </td>
                    </tr>
                    <tr style="">
                      <td>Shipping</td>
                      <td>
                        <div class="price-box"> 
                          ₦<span class="price" id="delivery"><?php
                            $sql = "SELECT * FROM cart where userid='$userid'";
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
                                $count=0;
                                $echoe='1000.00';
           while($row = $qry->fetch_assoc()){
              $produc=$row['product'];
               $sqls = "SELECT * FROM courses where name='$produc'";
           $qrys = $conn->query($sqls);
                            if ($qrys -> num_rows >0){$echoe='0.00';}
                            
           } echo $echoe;}?></span> 
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Amount Payable</b></td>
                      <td>
                        <div class="price-box"> 
                          ₦<span class="price" id="total"><b>160.00</b></span> 
                              <script>
  	
							
                          setInterval(function(){
    
    var totali=0;
    for(var i=0; i < cara.length; i++ ){
    totali += cara[i];
    }
                              
$("#subtotal").text(totali);
var del=$("#delivery").text();
$("#total").text(totali+parseInt(del));                              
    
                          },50);</script>

                              
                        
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                  </div>
                </div>
                <div class="right-side float-none-xs"> <a href="payment.php" class="btn btn-color">Next</a> </div>
              </div>
              <div class="col-md-4">
                <div class="cart-total-table address-box commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Shipping Address</th>
                        </tr>
                      </thead><tbody>
                        <?php
                        
                        $sql = "SELECT * FROM billing where userid='$userid'";
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
                                while($ro = $qry->fetch_assoc()){
                                echo ' <tbody>
                        <tr>
                          <td>
                            <ul>
                              <li class="inner-heading"> <b>'.$ro['name'].'</b> </li>
                              <li>
                                <p>@'.$ro['address'].'</p>
                              </li>
                              <li>
                                <p>Close to :'.$ro['landmark'].' </p>
                                </li><li>
                                <p>Phone : '.$ro['phone'].'</p>
                                
                              </li>
                              <li>
                                
                              </li>
                            </ul>
                          </td>
                        </tr>
                      </tbody>';
                            }}
                        ?>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="cart-total-table address-box commun-table">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Billing Email</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        
                        $sql = "SELECT * FROM billing where userid='$userid'";
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
                                while($ro = $qry->fetch_assoc()){
                                echo ' <tbody>
                        <tr>
                          <td>
                            <ul>
                              
                              <li>
                                <p>'.$ro['billingemail'].'</p>
                              </li>
                              
                              <li>
                                
                              </li>
                            </ul>
                          </td>
                        </tr>
                      </tbody>';
                            }}
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
  <!-- News Letter Start -->
  <section>
    <div class="newsletter">
      <div class="container">
        <div class="newsletter-inner center-sm">
          <div class="row">
            <div class=" col-xl-12 col-md-12">
              <div class="newsletter-bg">
                <div class="row">
                  <div class="col-lg-5">
                    <div class="newsletter-title">
                      <h2 class="main_title">Subscribe to our newsletter</h2>
                      <div class="sub-title">Sign up for newsletter and Get upto 50% off</div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <form>
                      <div class="newsletter-box">
                        <input type="email" placeholder="Email Here...">
                        <button title="Subscribe" class="btn-color">Subscribe</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- News Letter End --> 

  <!-- FOOTER START --><?php
include 'shop/footer.php';
?>
