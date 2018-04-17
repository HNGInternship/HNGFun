
  
         <?php
  //define("DB_SERVER", "localhost");
  //define("DB_USER1", "root");
  //define("DB_PASS", "");
 // define("DB_NAME", "hngfun");     
$connection=mysqli_connect("localhost","root","","hngfun");
if(mysqli_connect_errno()){
    die("database connection failed: ".mysqli_connect_error());
}
?>
 </br>   </br>    
  <?php 
  $query=mysqli_query($connection,"SELECT * FROM secret_word ");
    if(!$query){
        echo "Selecting code from secret word failed";
         } else{
            while($row=mysqli_fetch_array($query)){
             $secret_word=$row['secret_word'];
              }
       
             $sel =mysqli_query($connection,"SELECT * FROM interns_data where username='frank'");
     ?>
        <?php   WHILE($row=mysqli_fetch_array($sel)) {?>
        <?php
           $picture=$row['image_filename']."<br/>"; 
           echo "Full Name: ".  $name= $row['name']."<br/>"; 
           ?>
       
           <img src="<?php echo $row['image_filename']; ?>" alt="@frank" style="width:170px;height:170px; />   
       
  <?php } ?>
 <?php } ?>
         
  </br>    
  <img src="<?php echo $picture; ?>
 
 
  </div>

