<?php
require('shop/header.php');
?>  
  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title"><?php
             
            if(isset($_GET['category']) || isset($_GET['search'])){
                if(isset($_GET['search'])){
                    if($_GET['search']==''){
                       $search=''; 
                    }else{echo"Search results for '".$_GET['search']."'";}}
            if(isset($_GET['category'])){
                    if($_GET['category']==''){
                       
                    }else{echo"Category - '".$_GET['category']."'";}}
            }else{echo'Shop';}
            
            
            ?></h1>
        <div class="bread-crumb right-side float-none-xs">
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->  
  
  <!-- CONTAIN START -->
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 mb-sm-30">
          <div class="sidebar-block">
            <div class="sidebar-box listing-box mb-40">
              <div class="sidebar-title">
                <h3><span>Categories</span></h3>
              </div>
                <div class="sidebar-contant">
                <ul>
                <?php
                 
                 $sql = "SELECT * FROM products ";
                    
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
                                echo '<li ><a  href="shop.php">All<span>('.$qry -> num_rows.')</span></a></li>'; 
                                $categories='';
           while($row = $qry->fetch_assoc()){
               $categories=$categories.','.$row['category'];
           }
                                
                                $arr=explode(',',$categories);
                                $arrunique=array_unique(explode(',',$categories));
                                   $arrcount=array_count_values($arr);
                                foreach($arrunique as $c){
                                 $num=$arrcount[$c];
                                    if($c!='')
                                 echo '<li ><a  href="?category='.$c.'">'.$c.'<span>('.$num.')</span></a></li>';     
                                }
               }
            ?>
              
                  
                </ul>
              </div>
            </div>
            <div class="sidebar-box mb-40"> 
              <div class="sidebar-title">
              </div>
              <div class="sidebar-contant">
                <div class="price-range mb-30">
                </div>
                <a href="#" class="btn btn-color">WhatsApp</a> </div>
            </div>
            <div class="sidebar-box mb-40 d-none d-lg-block"> 
              <a href="#"> 
                <img src="shop/images/left-banner.jpg" alt="lilovat"> 
              </a> 
            </div>
            <div class="sidebar-box sidebar-item"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3><span>Best Selle</span>r</h3> 
              </div>
              <div class="sidebar-contant">
                <ul>
                         <?php
                if(isset($_GET['search'])){
                    if($_GET['search']==''){
                       $search=''; 
                    }else
                    $search=$_GET['search'];
                }else{$search='';}
                    
                    if(isset($_GET['category'])){
                    if($_GET['category']==''){
                       $category=''; 
                    }else
                    $category=$_GET['category'];
                }else{$category='';}
           $sql = "SELECT * FROM products ";
                    
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
                                $count=0;
           while($row = $qry->fetch_assoc()){
               if($row['oldprice']){
                   $oldprice='₦'.$row['oldprice'].'00';
               }else{
                   $oldprice='';
               }
               if($row['price']==0){
                   $pr='Call for Price';
               }else{
                   $pr='₦'.$row['price'].'.00';
               }
               
               if($row['adid']<=3)
               echo '
                 <li>
                    <div class="pro-media"> <a href="#"><img alt="T-shirt" src="shop/'.$row['image'].'"></a> </div>
                    <div class="pro-detail-info"> <a href="#">'.$row['name'].' </a>
                      <div class="rating-summary-block">
                        <div class="rating-result" title="80%"> <span style="width:80%"></span> </div>
                      </div>
                      <div class="price-box"> <span class="price">'.$pr.'</span> <del class="price old-price">'.$oldprice.'</del></div>
                      <div class="cart-link">
                        <form class="formshop">
                           <input type="hidden" name="type" value="product">
                              <input type="hidden" name="id" value="'.$row['adid'].'">
                        <input type="hidden" name="page" value="addtocart">
                          <button type="submit" title="Add to Cart">Add To Cart</button>
                        </form>
                      </div>
                    </div>
                  </li>';
           }}?>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="shorting mb-30">
          <div class="product-listing">
            <div class="inner-listing">
              
                     <?php
             
           $sql = "SELECT * FROM products";
          
                 if(isset($_GET['search'])||isset($_GET['category'])){ $sql.= " where ";}
                if(isset($_GET['search'])){
                    if($_GET['search']==''){
                       $search=''; 
                    }else
                    $sql.= " name like '%$search%' or name like '%[$search]%' or name like '$search%' or name like '%$search'  ";
                     if(isset($_GET['category'])){ $sql.= " or ";}
                }
                if(isset($_GET['category'])){
                    if($_GET['category']==''){
                        
                    }else
                    $sql.= "  category like '%$category%' or category like '%[$category]%' or category like '$category%' or category like '%$category' ";
                }
              
           $sql.=" order by rand()";
                
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
                                $count=0;
                                echo '<div class="row" id="itemContainer">';
           while($row = $qry->fetch_assoc()){
               if($row['oldprice']){
                   $oldprice='₦'.$row['oldprice'].'.00';
               }else{
                   $oldprice='';
               }
               if($row['price']==0){
                   $pr='Call for Price';
               }else{
                   $pr='₦'.$row['price'].'.00';
               }
               
               if($row['adid'])
               echo '<div class="col-md-4 col-6 mb-30" id="item'.$row['adid'].'">
                  <div class="product-item">
                    <div class="product-image"> <img src="shop/'.$row['image'].'" alt="lilovat"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form class="formshop">
                              
                              <input type="hidden" name="id" value="'.$row['adid'].'">
                        <input type="hidden" name="page" value="addtocart">
                                <button class="btn-1" type="submit"  title="Add to Cart" ><span></span><i> Add to Cart</i></button>
                              </form>
                            </li>
                            
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="#">'.$row['name'].'</a> </div>
                      <div class="price-box"> <span class="price">'.$pr.'</span> <del class="price old-price">'.$oldprice.'</del> </div>
                    </div>
                  </div>
                </div>';
           }
                            echo '</div> <div class="row">
                <div class="col-12">
                    <div class="paga d-flex justify-content-center" ></div>
                  
                </div>
              </div>';}else{ 
                                echo '<div class="row" >';
                                echo "<div style='width:100%;text-align:center; padding :10px'><div id='notfound'>
		<div class='notfound'>
			<div class='notfound-404'>
				<h1>Oops!</h1>
				<h2> No Results Found</h2>
			</div>
			<a href='shop.php'>Go back</a>
		</div>
	</div></div>";
                            echo '</div>';}?>
             
                  
              
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  


 <!--====== FOOTER PART START ======-->
<?php require('shop/footer.php')?>

    <!--====== FOOTER PART ENDS ======-->
  <div class="scroll-top">
    <div class="scrollup"></div>
  </div>
  <!-- FOOTER END -->   

<script>
           
						jQuery(document).ready(function(){
						
                 
                       
                           
                       jQuery(".formshop").submit(function(e){
                            $('#ent').show(); 
								e.preventDefault();
								var formData = jQuery(this).serialize();
                                      
                       $.ajax({
									type:"POST",
									url:"process.php",
									data:formData,
									success: function(response){
									if(response =='false')
									{
                                       $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> This item already exists<br></h7><h10><h10></div>');
									 var delay= 3000;
									  setTimeout((function(){ 
   $('#ent').fadeOut();  }), delay);
									}else
									{
                                        console.log('response');
                                       $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> Item added to cart <br></h7></div>'); $('#count').text(response);
                                        var delay= 3000;
									  setTimeout((function(){ 
   $('#ent').fadeOut();  }), delay);
									 
                                      
									 }
									
                      }
								});
								return false;
							});
									
							
									
							
						});
                          
						</script>
      <script src="shop/js/pagination.js"></script>
      <script>
      
        function pag(){
    var result = [];
        
             
           
$('#itemContainer').children().hide();
    var container = $('.paga');
    var sources = function () {
      
        $('#itemContainer').children().each(function(){
                 result.push($(this).attr('id'));
            
                
                 
             });
    
      

      return result;
    }();
var hide = [];
    var options = {
      dataSource: sources,
        
        pageSize: 6,
      callback: function (response, pagination) {
        window.console && console.log(response, pagination);

	$('html, body').animate({
    scrollTop: $('#itemContainer').offset().top});
      
         var show = [];
          
        
          
       $.each(response, function (index, item) { 
     
<?php
           $qry = $conn->query($sql);
         
            while($row = $qry->fetch_assoc()){
                echo 'if(item=="item'.$row['adid'].'")
                {show.push(item);
               }else{hide.push(item);
                }
                ';
           }
           ?>
          
       });
        
           for(var i =0; i<hide.length;i++){
    $('#'+hide[i]).hide();
}
   for(var i =0; i<show.length;i++){
    
    $('#'+show[i]).show();
}          
      }
    };

    $.pagination(container, options);
      //return false
    };
pag();</script>