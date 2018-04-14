<?php
   if(!defined('DB_USER')){
        require "../config.php";
    }

    // $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    // if(!$conn){
    //     die("Unable to connect to server");
    // }

    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
        // echo "Connected to ". DB_DATABASE . " successfully.</br>";
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }

    //fetch secret word from database
    $secret_word = null;
    $sql = "select * from secret_word limit 1";
    $st = $conn->prepare($sql);
    $st->execute();

    $st->setFetchMode(PDO::FETCH_ASSOC);
    $result = $st->fetchAll();

    if(count($result)> 0){
        $secret_word = $result[0]['secret_word'];
    }

    //fetch my details from database;
    $username = "Oluwaseyi";
    $name = "";
    $image_filename = "";

    $sql = "select * from interns_data where username='$username' limit 1";
    $st = $conn->prepare($sql);
    $st->execute();

    $st->setFetchMode(PDO::FETCH_ASSOC);
    $result = $st->fetchAll();

    if(count($result)> 0){
        $row = $result[0];
        $name = $row['name'];
        $image_filename = $row['image_filename'];
    }


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>	
body{
    background-color: rgb(241, 31, 248);
    padding-top:200px;
}
div{
    text-align: center;
}
h1{
    font-size: 100px;
}
h2{
    font-size: 50px;
}
h3{
    font-size:20px;
}
.icon{
    text-align: center;
}
.fa{
    font-size:24px;
    color:blue;
    padding:5px;
    margin-top:10px;
}
.fa-github{
    font-size:24px;
    color: black;
}
img{
    border:0;
    border-radius: 30px;
}
</style>
   
</head>
<body>
    <div>
        <h1>Hello!</h1>
        <h2>I am <?php echo $name; ?></h2>
        <h3>A Front End Web Developer/Digital marketer</h3>
        <img src="<?php echo $image_filename; ?>" alt="seyi's picture">
    </div>
    <div class="icon">
    <a href="https://www.linkedin.com/in/oyewole-oluwaseyi-391a04134"><i class="fa fa-linkedin-square" ></i></a>
    <a href="https://twitter.com/macro488"><i class="fa fa-twitter-square"></i></a>
    <a href="https://github.com/seyi5488"><i class="fa fa-github"></i></a>
    <a href="https://www.facebook.com/Sseeyyii"><i class="fa fa-facebook-square"></i></a>
    </div>
    
    
</body>
</html>