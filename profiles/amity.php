 <?php


// require_once '../../config.php';


try {
   $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
   die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}


try{
  $sql = 'SELECT * FROM secret_word';
  $q = $conn->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $data = $q->fetch();
  $secret_word= $data['secret_word'];
} catch (PDOException $e){
      throw $e;
  }


$result2 = $conn->query("Select * from interns_data where username = 'amity'");
$user = $result2->fetch(PDO::FETCH_OBJ);


?>
 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8" />
   <title>My profile</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Righteous', 'Roboto Thin' rel='stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
   <style type="text/css">
       body{
           background-color: hsl(210, 90%, 75%);
           height: 500px;
           width: 50%;
       }
       .header{
           color: darkblue;
           font-family: Georgia;
           text-align: center;
           margin-top: 30px;
       }
       img{
           width: 200px;
           height: 200px;
           border-radius: 100%;
           margin-left: 35%;
           margin-top: 70px;

       
       }
       p{
           font-family: Tahoma;
           font-size: 1.4em;
           color: darkblue;
           line-height: 13px;
           text-align: center;
           margin-top: 35px;

       }

       .quote{
        background-color: white;
        color: darkblue;
        width: 100%;
        height: auto;
        font-family: "chiller";
        font-style: italic;
        font-size: 23px;
        letter-spacing: 1px;
        margin-top: 70px;
        text-align: center;
        vertical-align: 27px;

       }
       .botholder{
        
        background-color: white;
        width: 55%;
        height: 450px;
        position: relative;
        left: 800px;
        bottom: 480px;
        
        
       }
       

       }
       h2{
         font-family: 'Righteous';
         font-size: 22px;
        color: darkblue;
        text-align: center;
        padding-bottom: 25px;

       }

         hr{
                color: darkblue;
                border: 0.5px solid;
                margin-top: 10px;
            }

         .aboutbot{
                color: darkblue;
                font-family: 'Roboto';
                font-size: 16px;
                margin-bottom: 180px;
                line-height: 15px;
          

              }
              .question_area{
                background-color: white;
                border: 2px solid gray;
                width: 150px;
                height: 35px;
                border-radius: 5px;
                position: relative;
                bottom: 150px;
                left: 5px;

              }

              .text{
                font-family: 'Roboto Thin';
                font-size: 16px;
                color: gray;
                position: relative;
                bottom: 25px;
                right: 15px;
              

              }
              .btn{
                color: white;
                font-family: 'Righteous';
                font-size: 16px;
                float: right;
                margin-top: 50px;
                margin-right: 5px;

              }
              .btn-primary{
                background-color: hsl(210, 90%, 75%);
              }
              
              .input-group-text{
                height: 35px;
                width: 80px;
              }
              .form-control{
                height: 35px;
                width: 40px;
              }


   </style>
   
</head>
<body>
  <div class="container">
      <h1 class="header">HNG INTERNSHIP PROGRAMME</h1>
      <img src="https://res.cloudinary.com/hnginternship4/image/upload/v1525955602/amity.jpg">
      <p><strong>Mmenyene Edet</strong> <br><br> Learning Web Development <br><br> </p>
      
      <div class="quote">...If you wait until everything, absolutely everything is ready; then you won't start anything!</div>

       
      <div class="botholder">
      <h2  style="color: darkblue;
           font-family: Righteous;
           font-size: 29px;
           font-weight: bold;
           text-align: center;
           margin-top: 25px;
           vertical-align: 25px;
           padding-top:20px;
           "> Amity's bot</h2>

             <hr>

           <p class="aboutbot">Hello! My name is Amity’s Bot.
Actually i can tell you your current location and your 
local time where ever you are!</p>

<!-- <div class="question_area"> -->
  <!-- <p class="text">Type here</p> -->
<!-- </div> -->
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Question</span>
  </div>
  <textarea class="form-control" aria-label="With textarea"></textarea>
</div>
<button type="button" class="btn btn-primary">Send</button>

</div>




<!-- <p>bootstrap javascript link</p> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      </div>
</body>
</html>
  