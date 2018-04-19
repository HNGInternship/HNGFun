
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    
 
    
       div.box{
           
          padding: 20px;
           position: relative;
           top:30px;
           left: 300px;
           height: 600px;
           width: 550px;
           
           border-width: 2px;
           align-self: center;
           border-style: solid;
           border-color:grey;
           background-color:white;

       }
     
       h3.name{
           text-align: center;
           font-size: 25px;
           text-decoration: underline;
           text-decoration-style: solid;
           text-decoration-color: black;
          
       }
       h3.android_dev{
        text-align: center;
        font-size: 20px;
       }
     
       img.small{
           width: 180px;
           height: 230px;

       }
       img.align-center{
           display: block;
           margin: 0px auto;
           margin: 0px auto;
       }
       p.two{

           text-align: center;
       }
    

     
    </style>
    <script language="javascript" type="text/javascript">
    
   
  
    
    </script>
</head>
<body>




<?php

try{
    $getData = 'SELECT * FROM interns_data WHERE username="codetillamgone"';
    $query1 = $conn->query($getData);
    $query1->setFetchMode(PDO::FETCH_ASSOC);
    $result1 = $query1->fetch(); 
}
catch(PDOException $e){
    throw $e;
    
}
    
   $name = $result1['name'];
   $user = $result1['username'];
   $image = $result1['image_filename'];
 ?>
   
        
  

  <?php
      try {
          $getWord = "SELECT * FROM secret_word";
          $query2 = $conn->query($getWord);
          $query2->setFetchMode(PDO::FETCH_ASSOC);
          $result2 = $query2->fetch();
      } catch (PDOException $e) {
          throw $e;
      }
      $secret_word = $result2['secret_word'];
    ?>
        
       
    <div class="box">
            <p class="one">
                <h3 class="name"> <b> <?php echo $name; ?> </b>  </h3>
                <h3 class="android_dev"> <b> Android Developer</b></h3>
                </p>

                <p class="two">
                <img src="http://res.cloudinary.com/dh6nwthj4/image/upload/v1523703633/IMG_20180408_164418_288.jpg" alt="my image" class="align-center small"/>
            </p>
      
           <p>
                <h3 class="hobbies"> Hobbies/About Me </h3>
                <ul>
                <li> Coding : Android, Java, Python and PHP ongoing</li>
                <li> Listening to Music </li>
                <li> Humiliating people on FIFA, ask <b><i>@bamii</i></b> of this Internship...Lol </li>
                </ul>
           
           </p>
    </div>
    

        
     
                        
    
</body>
</html>