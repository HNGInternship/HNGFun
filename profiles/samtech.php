<<<<<<< HEAD
 <?php
 try{
=======

<?php
try{
>>>>>>> 9937252cc84dc5efe5670ec61af59ea90aa11fea
     $profile = 'SELECT * FROM interns_data_ WHERE username= "samtech"';
     $check = 'SELECT * FROM secret_word LIMIT 1';

     $query = $conn->query($check);
     $profile_query = $conn->query($profile);

     $query->setFetchMode(PDO::FETCH_ASSOC);
     $profile_query->setFetchMode(PDO::FETCH_ASSOC);

     $get = $query->fetch();
     $user = $profile_query->fetch();
 }catch (PDOException $e) {
     throw $e;
 }
<<<<<<< HEAD
 
 $secret_word = $get['secret_word'];
 
 ?>
 
 <html>
=======
 $secret_word = $get['secret_word'];
?>
<!DOCTYPE html>
<html>
>>>>>>> 9937252cc84dc5efe5670ec61af59ea90aa11fea
     <head>
         <title> MY PROFILE</title>
         <style type="text/css">
            body{
    background-image: url("http://res.cloudinary.com/samtech/image/upload/v1523757683/background-3104413_1920.jpg");
    background-repeat: no-repeat;
    background-size: 1400px;
   
}


#firstimg{
    width: 405px;
    
}
#formattedtext{
    clear: both;
    float: right;
    width: 600px;
    padding: 50px;
    font-style:oblique;
    font-weight: bolder;
}
p{
    font-size: 40px;
}
#boldText{
    font-size: 48px;
    color: white;
    font-style:initial;
}        
         </style>
         <script type="text/javascript">
             function Timer(){
                 document.getElementById("load").style.visibility = "visible";
             }
             setTimeout(Timer, 3000);
            
            </script>
     </head>
     <div id = "container">
     <body id="load">
      
        <div id="formattedtext">
            <p id="boldText"> MY PROFILE </p><br>
            <p> Umoren Samuel Enefiok <br> HNG INTERN <br> UNIVERSITY OF UYO </p>
        </div> 


        <img id="firstimg" src = "http://res.cloudinary.com/samtech/image/upload/v1523757679/IMG_20180412_151003.jpg" alt="a male smiling">
         
     </body>
    </div>
 </html>
