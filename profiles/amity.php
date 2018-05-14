 <?php


//require_once '../../config.php';


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
<html>
<head>
   <meta charset="utf-8" />
   <title>My profile</title>
   <style type="text/css">
       body{
           background-color: hsl(210, 90%, 75%);
           height: auto;
           width: 100%;
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
           margin-left: 41%;
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
        text-indent: 20px;
        margin-top: 70px;
        text-align: center;
        vertical-align: 27px;

       }

   </style>
   
</head>
<body>

   <h1 class="header">HNG INTERNSHIP PROGRAMME</h1>
   <img src="https://res.cloudinary.com/hnginternship4/image/upload/v1525955602/amity.jpg">
   <p><strong>Mmenyene Edet</strong> <br><br> Learning Web Development <br><br> </p>

   
   <div class="quote">...If you wait until everything, absolutely everything is ready; then you won't start anything!</div>
   
</body>
</html>