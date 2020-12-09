<?php
include 'Conn.php';
           $sql = "SELECT * FROM courses where name<>'Solar Masters Class Training'";
           $qry = $conn->query($sql);
                            if ($qry -> num_rows >0){
           while($row = $qry->fetch_assoc()){
            $sqli = "SELECT * FROM instructor where courseid='dkjkjldf15'";
            $qryi = $conn->query($sqli);
            while($rowi = $qryi->fetch_assoc()){
              $name=$rowi['name'];
              $job=$rowi['job'];
              $description=$rowi['description'];
              $courseid=$row['uniqueid'];
              $facebook=$rowi['facebook'];
              $instagram=$rowi['instagram'];
              $twitter=$rowi['twitter'];
              $image=$rowi['image'];
              $sqlsi = "INSERT INTO instructor(name,job,description,courseid,facebook,instagram,twitter,image) VALUES ('$name','$job','$description','$courseid','$facebook','$instagram','$twitter','$image')";
       
            
              if (mysqli_query($conn, $sqlsi)) {
                echo 'done';
              } else{
                echo 'doner';
              }

            }
       
               
               }}?>