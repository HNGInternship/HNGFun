<?php

// Fetch profile details from database using USERNAME as the unique identifier
$profile_details_query = "SELECT name, username, image_filename FROM interns_data where username = '$profile_name' LIMIT 1";
$profile_details_result = $conn->query($profile_details_query);

// Assign the data to a variable

    $profile_details_result->setFetchMode(PDO::FETCH_ASSOC);
        $profile_details = $profile_details_result->fetch();

    

// Fetch single secret word from database
$secret_word_query = "SELECT secret_word FROM secret_word LIMIT 1";
$secret_word_result = $conn->query($secret_word_query);

    $secret_word_result->setFetchMode(PDO::FETCH_ASSOC);
        $secret = $secret_word_result->fetch();
        $secret_word = $secret['secret_word'];
?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <style type="text/css">
        body{
            background-color: #4CAF50;
            font-family: Raleway, "sans-serif"

        }
        h1{
            font-weight: 700;
        }
        .main{
            width: 50vw;
            height: 50vh;
            background-color: #E8F5E9;
            margin: 100px auto;
            text-align: center;
            box-shadow: 2px 2px 4px;

        }
        .clock{
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin: auto;
            color: #fff;
            text-align: center;
            font-size: 2em;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="main">

    <img class="clock img-fluid" src="<?php echo $profile_details['image_filename'] ?>"
         alt="Dahunsi Fehintoluwa">
    <div>
    	<p class="m-1"><strong>Names:</strong> <?php echo $profile_details['name'] ?></p>
        <p class="m-1"><strong>Username:</strong> <?php echo $profile_details['username'] ?></p>
        <p class="m-1"><strong>Hobbies:</strong> Programming, Reading, Weightlifting </p>
        <a href="#" class="btn btn-primary">Hug me</a>
    </div>
</div>

</body>
