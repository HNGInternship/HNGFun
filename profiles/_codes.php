<?php
if($_SERVER['REQUEST_METHOD']==='GET'){
 try {
     $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = '_codes'");
     $intern_data->execute();
     $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
     $result = $intern_data->fetch();
 
 
     $secret_code = $conn->prepare("SELECT * FROM secret_word");
     $secret_code->execute();
     $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
     $code = $secret_code->fetch();
     $secret_word = $code['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>_codes</title>
   <style>
   .main{
   background-color: #96deda;
   margin: auto;
   width: 55em;
   height: 35em;
   border-color: grey;
   border-radius: 1.27em;
   position: relative;
}
.d{
   width: 195px;
   background-color: white;
   color: #625be7;
   margin-top: 1em;
   font-size: 2.1em;
   margin-bottom: 0em;
   border-top-right-radius: 30px;
   border-bottom-style : solid black;
   text-shadow: 0 0 3px #FF0000;
}
#me{
    font-size: 2.09em;
   text-shadow: -2px 0 white, 0 2px white, 2px 0 white, 0 -2px white;
}
hr{
   margin: 0px;
   height: 4px;
   border-top: none;
   background-color: white;
   
}
#div1{
   width: 55em;
   height: 33em;
   position: absolute;
   bottom: 0em;
   left: 0px;
   border-right-width: 0.2em;
}
img{
   margin: auto;
   position: absolute;
   left: 18.78em;
   border-style : ridge;
   border: thick double ;
   border-width: 20px;
   border-radius: 50%;
   z-index: 1;
   background-color: #625be7;
}
#details{
   height: 18em;
   width: 55em;
   position: absolute;
   bottom: 0px;
   left: 0px;
   background-color: #625be7;
   border-radius: 20px;
   border-top-left-radius: 40px;
   border-top-right-radius: 40px;
}
#span{
   font-style: italic;
   font-size: 2em;
   text-align: center;
   text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
}</style>
</head>
<body>
   
      <div class="main">
          <div id="div1">
              <img src="https://res.cloudinary.com/kyriox/image/upload/v1524363843/me.jpg">
            <div id="details">
                <span>
                    <p class="d">Details<hr></p>
                    <div id="span"> Hi, there! My name is <span id="me">Andikan</span><br> and I am a Developer</div>
                </span>
               
            </div>
          </div>
      </div>
      <script>
          console.log("Hello World");
      </script>
  </body>
</html>