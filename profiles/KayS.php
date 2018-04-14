<?php

    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE;
    $db = new PDO($dsn, DB_USER,DB_PASSWORD);
    $codeQuery = $db->query('SELECT * FROM secret_word ORDER BY id DESC LIMIT 1', PDO::FETCH_ASSOC);
    $secret_word = $codeQuery->fetch(PDO::FETCH_ASSOC)['secret_word'];
    $detailsQuery = $db->query('SELECT * FROM interns_data WHERE name = \'Sagoe Kay\' ');
    $username = $detailsQuery->fetch(PDO::FETCH_ASSOC)['username'];
?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:300|Work+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<style>
    .my-container
    {
        width: 100%;
        height: 600px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: "Work Sans", sans-serif;
    }

    .content
    {
        display: flex;
        flex-direction: column;
    }

    .row
    {
        display: flex;
        width: 100%;
        justify-content: center;
        flex-direction: row;
    }

    .icon-row
    {
        display: flex;
        flex-direction: row;
        width: 70px;
        justify-content: space-between;
    }
</style>
<body>

<div class="my-container">
    <div class="content">
        <div class="row">
            <span style="width:100%;font-weight: 700; font-size: 159px; color: #263238; letter-spacing: -10px; text-align: center;"><?=$username ?>.</span>
        </div>
        <div class="row">
            <span style="width: 100%;font-size: 28px; text-align: center; color: #212121; font-family: 'Lato'; font-weight: 300;">Web Developer &#x25CF; Designer</span>
        </div>
        <div style="margin-top: 20px; font-size: 28px; color: #212121" class="row">
            <div class="icon-row">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-github-alt"></i>
            </div>
        </div>
    </div>
</div>
</body>