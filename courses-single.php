
<base href="../">
<?php


include 'header.php';

if(isset($_GET['name'])){
    $name=str_replace('-',' ',urldecode($_GET['name']));

$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
    if($qry->num_rows>0){
        
    }else{
        echo '<script>window.location="courses.php";</script>';
    }
           
}
else{
   echo '<script>window.location="courses.php";</script>';
}
?>   <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Solar Masters Class Training</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Courses</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Solar Masters Class Training</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
    
    <!--====== COURSES SINGEl PART START ======-->
    
    <section id="courses-single" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="courses-single-left mt-30">
                        <div class="title">
                            <h3><?php
$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['name']; } ?></h3>
                        </div> <!-- title -->
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                            <img src="images/course/teacher/t-1.jpg" alt="Teacher">
                                        </div>
                                        <div class="name">
                                            <span>Teacher</span>
                                            <h6><?php
$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['teacher']; } ?></h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="course-category">
                                        <span>Category</span>
                                        <h6><?php
$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['category']; } ?></h6>
                                    </div>
                                </li>
                                <li>
                                    
                                </li>
                            </ul>
                        </div> <!-- course terms -->
                        
                        <div class="courses-single-image pt-50">
                            <img src="/<?php
$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['image']; } ?>" alt="Courses">
                        </div> <!-- courses single image -->
                        
                        <div class="courses-tab mt-30">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a id="curriculum-tab" data-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">Curriculum</a>
                                </li>
                                <li class="nav-item">
                                    <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Instructor</a>
                                </li>
                                <li class="nav-item">
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Course Project</a>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="overview-description">
                                        <?php
$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['overview']; } ?>
                                    </div> <!-- overview description -->
                                </div>
                                <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                    <div class="curriculum-cont">
                                        <div class="title">
                                            <h6><?php
$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               
             echo $row['name']; } ?></h6>
                                        </div>
                                        <div class="accordion" id="accordionExample">
                                            <?php
$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               $id=$row['uniqueid'];
               $sql = "SELECT * FROM curriculum where courseid='$id'";
$qr = $conn->query($sql);
               $i=1;
             while($ro = $qr->fetch_assoc()){
             echo '<div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <a href="#" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'" class="collapsed">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Training Day '.$i.'.</span></li>
                                                            <li><span class="head">'.$ro['name'].'</span></li>
                                                            <li><span class="time d-none d-md-block"></span></li>
                                                        </ul>
                                                    </a>
                                                </div>

                                                <div id="collapse'.$i.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        '.$ro['description'].'
                                                    </div>
                                                </div>
                                            </div>';  $i++;  
             } }?>
                                          

                                            
                                        </div>
                                    </div> <!-- curriculum cont -->
                                </div>
                                <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                    
                                     <?php
$sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               $id=$row['uniqueid'];
               $sql = "SELECT * FROM instructor where courseid='$id'";
$qr = $conn->query($sql);
               $i=1;
             while($ro = $qr->fetch_assoc()){
             echo '<div class="instructor-cont">
                                        <div class="instructor-author">
                                            <div class="author-thum">
                                                <img src="images/instructor/i-1.jpg" alt="Instructor">
                                            </div>
                                            <div class="author-name">
                                                <a href="#"><h5>'.$ro['name'].'</h5></a>
                                                <span>'.$ro['job'].'</span>
                                                <ul class="social">
                                                    <li><a href="'.$ro['facebook'].'"><i class="fa fa-facebook-f"></i></a></li>
                                                    <li><a href="'.$ro['twitter'].'"><i class="fa fa-twitter"></i></a></li>
                                                    
                                                    <li><a href="'.$ro['instagram'].'"><i class="fa fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="instructor-description pt-25">
                                            '.$ro['description'].'
                                        
                                    </div>';  $i++;  
             } }?>
                                          
                                    
                                    
                                    
                                    
                                    <!-- instructor cont -->
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="overview-description">
                                        <div class="single-description pt-40">
                                            <h6>Course Project</h6>
                                           <?php
                                            $sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo $row['courseproject'];
           }
                                            ?>
                                        </div>
                                    </div> <!-- overview description -->
                                </div>
                            </div> <!-- tab content -->
                        </div>
                    </div> <!-- courses single left -->
                    
                </div></div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                               <h4>Course Features </h4>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Duration : <span><?php
                                            $sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo $row['duration'];
           }
                                            ?></span></li>
                                    <li><i class="fa fa-clock-o"></i>Hours-per-day  :  <span><?php
                                            $sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo $row['hoursperday'];
           }
                                            ?></span></li>
                                    <li><i class="fa fa-clone"></i>Lectures : <span><?php
                                            $sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo $row['lectures'];
           }
                                            ?></span></li>
                                    <li><i class="fa fa-user-o"></i>Students Trained  :  <span><?php
                                            $sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo $row['studentstrained'];
           }
                                            ?></span></li>
                                </ul>
                                <div class="price-button pt-10">
                                    <span>Price : <b>₦<?php
                                            $sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo $row['price'];
           }
                                            ?>.00</b></span>
                                    <form method="post" class="formshop">
                        <input type="hidden" name="type" value="course">            
                                   <input type="hidden" name="id" value="<?php
                                            $sql = "SELECT * FROM courses where name='$name'";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo $row['adid'];
           }
                                            ?>">
                                            
                        <input type="hidden" name="page" value="enrol"><br>
                                          <button class="btn btn-secondary enrolbtn" type="submit">Enroll NOW</button></form>
                                          
                                          
                                    
                                </div>
                            </div> <!-- course features -->
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="You-makelike mt-30">
                                <h4>Other Courses </h4> 
                                <?php
                                            $sql = "SELECT * FROM courses order by rand() limit 3";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
               echo '<div class="single-makelike mt-20">
                                    <div class="image">
                                        <img src="images/your-make/y-1.jpg" alt="Image">
                                    </div>
                                    <div class="cont">
                                        <a href="courses/'.str_replace(' ','-',$row['name']).'"><h4>'.$row['name'].'</h4></a>
                                        <ul>
                                            <li>₦'.$row['price'].'.00</li>
                                        </ul>
                                    </div>
                                </div>';
           }
                                            ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="related-courses pt-95">
                        <div class="title">
                            <h3>Past Trainings</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            <img src="images/course/pcu-2.jpg" alt="Course">
                                        </div>
                                    </div>
                                </div> <!-- single course -->
                            </div>
                            <div class="col-md-6">
                                <div class="single-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            <img src="images/course/pcu-1.jpg" alt="Course">
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- single course -->
                            </div>
                            <div class="row">
                                <li><a href="#" class="main-btn">See More</a></li>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- related courses -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== COURSES SINGEl PART ENDS ======-->
   <?php
include 'footer.php';
?>
<script>
// $(".formshoe").submit();
           
						jQuery(document).ready(function(){
						  
                       <?php
                        $courseid=$_POST['idc'];
                       $sqls = "SELECT * FROM enrolled where userid='$userid' and courseid='$courseid'";
           $qrys = $conn->query($sqls);
           if($qrys->num_rows>0){
               echo "$('.enrolbtn').text('Enrolled');
                                        $('.enrolbtn').addClass('disabled');";
           }else{
               
           }
                       
                       ?>
                            
                       jQuery(".formshop").submit(function(e){
                            
								e.preventDefault();
								var formData = jQuery(this).serialize();
                                      
                       $.ajax({
									type:"POST",
									url:"process.php",
									data:formData,
									success: function(response){
									if(response =='exists')
									{
                                       $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i> You are already enrolled for this course<br></h7><h10><h10></div>');
									 var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click();  }), delay);
									}else if(response =='done')
									{
                                        $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> You have successfully enrolled for this course<br></h7></div>'); 
                                        $('.enrolbtn').text('Enrolled');
                                        $('.enrolbtn').addClass('disabled');
									 var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click();  }), delay);
									}else if(response=='register')
									{
                                        
                                       $('#ent').html('<div class="alert alert-success alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-check"></i> Please register before you able to enroll for this course <br></h7></div>'); 
                                        var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click();  }), delay);
									 
                                      
									 }else
									{
									    $('#ent').html('<div class="alert alert-danger alert-dismissible"><button type="button" id="click" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h7><i class="icon fa fa-ban"></i>An error occured while processing your request<br></h7><h10><h10></div>');
                                        
                                       
                                        var delay= 3000;
									  setTimeout((function(){ 
   $("#click").click();  }), delay);
									 
                                      
									 }
									
                      }
								});
								return false;
							});
							
									
							
									
							
						});
                          
						</script>