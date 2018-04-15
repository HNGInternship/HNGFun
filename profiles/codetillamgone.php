
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
   $result = $conn->query('Select * FROM secret_word LIMIT 1');
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query('Select * FROM interns_data WHERE username = "codetillamgone"');
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>
        
       
    <div class="box">
            <p class="one">
                <h3 class="name"> <b> <?php echo $user->name ?> </b>  </h3>
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