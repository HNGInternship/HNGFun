
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
        width: 200px;
        margin-left: auto;
        margin-right: auto;
    }
    #avatar{
        width: 500px;
        height: 500px;
        margin-left: 400px;
        border-radius: 250px;
    }
    #details{
        text-align: center;
    }
</style>
</head>
<body>
<?php
    $configs = include('config.php');
    try {
        $conn = new PDO("mysql:host=DB_HOST;dbname=DB_DATABASE", DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = "SELECT name, username, image_filename FROM interns_data_";
    $sql_secret = "SELECT secret_word FROM secret_word"

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $name = $row["name"];
    $username = $row["username"];
    $image_filename = $row["image_filename"];

    $result_secret = $conn->query($sql_secret);
    $secret_word = $result_secretr->fetch_assoc()["secret_word"];
?>
    <div id="main">
    <div id="avatar">
        <img src="<?php echo $image_filename ?>" alt="<?php echo $name ?>">
    </div>
    <div id="details">
        <h1><?php echo $name ?></h1>
        <h3>@204070</h3>
        <p>Software Engineer Intern</p>
        <br>
        <br>
        <h2>Connect</h2>
        <ul>
            <li><a href="#">Github</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Medium</a></li>
        </ul>
    </div>
    </div>
</body>
</html>


