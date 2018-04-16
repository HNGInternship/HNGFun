
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<style type="text/css">
    #main {
        background-color: ghostwhite;
        display: flex;
        flex-direction: column;
        width: 300px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    #avatar{
        margin-left: auto;
        margin-right: auto;
    }
    #avatar img {
        border-radius: 250px;
    }
    #details ul{
        padding: 0px;
    }
    #details li {
        list-style: none;
    }
</style>
</head>
<body>
<?php
    // include('../config.php');
    // try {
    //     $conn = new PDO("mysql:host=DB_HOST;PORT=3306;dbname=DB_DATABASE", DB_USER, DB_PASSWORD);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connected successfully"; 
    // }
    // catch(PDOException $e)
    // {
    //     echo "Connection failed: to " . $e->getMessage();
    // }
// 
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    $sql = 'SELECT * FROM interns_data WHERE username="204070"';
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $name = $row["name"];
    $username = $row["username"];
    $image_filename = $row["image_filename"];

    $sql_secret = 'SELECT secret_word FROM secret_word LIMIT 1';
    $result_secret = $conn->query($sql_secret);
    
    $secret_word = $result_secret->fetch_assoc()["secret_word"];
?>
    <div id="main">
        <div id="title">
            <h2>HNG INTERNSHIP 4.0</h2>
        </div>
        <div id="avatar">
            <img src="<?php echo $image_filename ?>" alt="<?php echo $name ?>"
    height="200px" width="200px">
        </div>
        <div id="details">
            <h1><?php echo $name ?></h1>
            <h3>@204070</h3>
            <p>Software Engineer Intern</p>
            <br>
            <br>
            <h2>Connect</h2>
            <ul>
                <li><a href="https://github.com/204070">Github</a></li>
                <li><a href="https://twitter.com/smai_lee">Twitter</a></li>
                <li><a href="https://medium.com/@Oluwaseun">Medium</a></li>
            </ul>
        </div>
    </div>
</body>
</html>


