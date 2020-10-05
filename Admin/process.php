<?php 

include_once('../Conn.php');

switch ($_POST['page']){
    case 'deletep':
        $delete=$_POST['id'];
      
                       
   
                       
          
        
   $sql ="delete from products where adid='$delete'";
        if (mysqli_query($conn, $sql)) {
                                echo 'True';  
                              }
                       
        break;
        
        case 'status':
    $id = $_POST["orderno"] ;
    $check=$_POST["check"];
        if($check=='on'){
            $status='success';
        }else if($check=='off'){
            $status='pprocessing';
        }
        $sqlt = "update transaction set status='$status' where orderno='$id'";
                    
    if (mysqli_query($conn, $sqlt)) {
        echo'True';
    }    
        break;
        
        case 'deleteo':
        $delete=$_POST['id'];
      
                       
   
                       
          
        
   $sql ="delete from transaction where adid='$delete'";
        if (mysqli_query($conn, $sql)) {
                               
                              }
           $sql ="delete from transactiondetails where transactionid='$delete'";
        if (mysqli_query($conn, $sql)) {
                                echo 'True';  
                              }
                       
        break;
    case 'deletec':
        $delete=$_POST['id'];
      
                       
   
                       
          
        
   $sql ="delete from courses where uniqueid='$delete'";
        if (mysqli_query($conn, $sql)) {
                                echo 'True';  
                              }   $sql ="delete from instructor where courseid='$delete'";
        if (mysqli_query($conn, $sql)) {
                                 
                              }
        $sql ="delete from curriculum where courseid='$delete'";
        if (mysqli_query($conn, $sql)) {
                                 
                              }
        
                       
        break;
        case 'deleter':
        $delete=$_POST['id'];
      
           $sq ="delete from keywords where uniqueid='$delete'";
        if (mysqli_query($conn, $sq)) {
          
                             
        }
                       
    
          $sql ="delete from segment where uniqueid='$delete'"; 
        if (mysqli_query($conn, $sql)) {
                                  
                              }
   $sql ="delete from reports where uniqueid='$delete'";
        if (mysqli_query($conn, $sql)) {
                                echo 'True';  
                              }
                       
        break;
      
          
            case 'deleteins':
        $delete=$_POST['id'];
       
               $sqk ="delete from instructor where adid='$delete'";
                 
           
          
        if (mysqli_query($conn, $sqk)) {
              echo 'True';                     
        }else{ echo 'false';}                       
        break;
    case 'deletecur':
        $delete=$_POST['id'];
       
               $sqk ="delete from curriculum where adid='$delete'";
                 
           
          
        if (mysqli_query($conn, $sqk)) {
              echo 'True';                     
        }else{ echo 'false';}                       
        break;
        
        
        
        
         case 'deleteseg':
        $delete=$_POST['id'];
       $sql = "SELECT * FROM segment where adid='$delete'";
           $qryd = $conn->query($sql);
         
                      
           while($roww = $qryd->fetch_assoc()){
               $uniqueid=$roww['uniqueid'];
               $sqk ="delete from keywords where uniqueid='$uniqueid' and type='segment'";
                 if (mysqli_query($conn, $sqk)) {}
           $sq ="delete from segment where adid='$delete'";
        if (mysqli_query($conn, $sq)) {
              echo 'True';                     
        }else{ echo 'false';}     }                    
        break;
        
        
        
            case 'deletep':
        $delete=$_POST['id'];
       $sql = "SELECT * FROM producers where adid='$delete'";
           $qryd = $conn->query($sql);
         
                      
           while($roww = $qryd->fetch_assoc()){
               $uniqueid=$roww['uniqueid'];
               $sqk ="delete from keywords where uniqueid='$uniqueid' and type='producers'";
                 if (mysqli_query($conn, $sqk)) {}
           $sq ="delete from producers where adid='$delete'";
        if (mysqli_query($conn, $sq)) {
              echo 'True';                     
        }else{ echo 'false';}                         
           }
                       


                       
        break;
    case 'addg':
       
                     
                       if(isset($_POST['submitted'])){                                
$id=$_POST['id'];
                
         
    foreach($_POST['genre'] as $c){
         
           $sqlta = "INSERT INTO keywords (name,uniqueid,type) VALUES ('$c','$id','genre')";
        
        
            if (mysqli_query($conn, $sqlta)) {}
             $sqls = "INSERT INTO genre(type,uniqueid) VALUES ('$c','$id')"; 
             if (mysqli_query($conn, $sqls)) {
                 
             }else{echo'True';}
        
         };
                            echo 'edit-movie.php?uniqueid='.$id.'&type=completed';
                           
           }else{echo'True';}
             
                           
            
   
                
        break;
         case 'addsg':
       
                     
                       if(isset($_POST['submitted'])){                                
$id=$_POST['id'];
                
         
    foreach($_POST['segment'] as $c){
         
           $sqlta = "INSERT INTO keywords (name,uniqueid,type) VALUES ('$c','$id','segment')";
        
        
            if (mysqli_query($conn, $sqlta)) {}
             $sqls = "INSERT INTO segment(type,uniqueid) VALUES ('$c','$id')"; 
             if (mysqli_query($conn, $sqls)) {
                 
             }else{echo'True';}
        
         };
                            echo 'edit-report.php?uniqueid='.$id.'&type=completed';
                           
           }else{echo'True';}
             
                           
            
   
                
        break;
         case 'services':
       
                     
                                                    

                
         
   
        $sql = "show columns FROM services ";
$qry = $conn->query($sql);
           while($row = $qry->fetch_assoc()){
             if($row['Field']!='adid'){
                 
                 $field=$row['Field'];
                 $fieldval=$trailer=mysqli_real_escape_string($conn, $_POST[$row['Field']]);
                 
                 $sqlta = "update services set $field='$fieldval' where adid=1";  
                             if (mysqli_query($conn, $sqlta)) {
                                        echo 'True';
                             }
                 
             }
           }
 
//         
//           $sqlta = "update services set $c= VALUES ('$c','$id','genre')";
//        
//        
//            if (mysqli_query($conn, $sqlta)) {}
//             $sqls = "INSERT INTO genre(type,uniqueid) VALUES ('$c','$id')"; 
//             if (mysqli_query($conn, $sqls)) {
//                 
//             }else{echo'True';}
//        
//         };
//                            echo 'edit-movie.php?uniqueid='.$id.'&type=completed';
//                           
//           }else{echo'True';}
             
                           
            
   
                
        break;
        
        case 'login':
        $id=mysqli_real_escape_string($conn, $_POST['id']);
        $_SESSION['loginas']=$_POST['date'];
         $sql = "SELECT * FROM admin where uniqueid='$id'";
$qry = $conn->query($sql);
if($qry->num_rows>0){
   
    
    echo 'True';
}else{
    echo 'false';
}

        break;
        
}
 ?>
