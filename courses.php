<?php
include 'header.php';
?>   
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Our Courses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Courses</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== COURSES PART START ======-->
    
    <section id="courses-part" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                        </ul> <!-- nav -->
                        
                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search"  id="search-highlight" name="search-highlight"   data-list="#courses-gri" autocomplete="on">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> <!-- row -->
           
                
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row" id="courses-gri">
                         <?php
           $sql = "SELECT * FROM courses";
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
           while($row = $qry->fetch_assoc()){
               $name=str_replace(' ','-',urlencode($row['name']));
               echo' <div class="col-lg-4 col-md-6">
                            <div class="single-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="'.$row['image'].'" alt="Course">
                                    </div>
                                    <div class="price" >
                                        <span >₦'.$row['price'].'</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <!--<ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-low-star"></i></li>
                                        <li><i class="fa fa-low-star"></i></li>
                                    </ul>-->
                                    <a href="courses/'.$name.'"><h4>'.$row['name'].'</h4></a>
                                </div>
                            </div> <!-- single course -->
                        </div>';
               
           }
                            }else {
                                
                                
                            }
                    ?>
                       
                        
                    </div> <!-- row -->
                </div>
              
                            </div> <!-- single course -->
                        </div>
                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            <li class="page-item"><a href="#">3</a></li>
                            <li class="page-item">
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== COURSES PART ENDS ======-->
   <?php
include 'footer.php';
?>
<script  src="js/jquery.hideseek.min.js"></script>
<script>$('#search-highlight').hideseek({
  highlight: true,
    nodata: 'No results found'
        
});
</script>