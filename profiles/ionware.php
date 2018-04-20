<?php

$q = $conn->query("select * from secret_word LIMIT 1");
$result = $q->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

//SQL Query
$query = "select name, username, image_filename from interns_data where username = 'ionware'";

try {
    //Execute fetch query and harvest result.
    $q = $conn->query($query);
    $user = $q->fetch(PDO::FETCH_OBJ);

}
catch (PDOException $exception) {
    echo "Server cannot properly establish connection to database.";
    exit(1);
}
catch (Exception $e) {
    echo "Temporary server problem.";
    exit(1);
}
?>

<html>
<head>
    <!-- Roboto and Lato Google fonts cdn -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:700" rel="stylesheet">
    <style>
        body {
            background: #FAFAF6;
            color: #323232;
            font-family: Lato, sans-serif;
            font-size: 16px;
        }
        p {
            margin: 0; padding: 0;
            font-size: 1.02em;
        }
        .pad-all-2x {
            padding: 10px;
        }
        .avater {
            width: 160px;
            height: 160px;
            border: 4px solid #ecf0f1;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
        }
        .heading-text {
            font-size: 1.2em;
            text-transform: uppercase;
            font-family: Roboto, sans-serif;
            margin: 5px 0;
            color:
        }
        .social {
            padding: 0 0;
            text-align: right;
        }
        .social > a {
            color: inherit;
            font-size: 1.2em;
            margin: 0 5px;
        }
        .paper {
            background-color: #00D1FF;
            color: #fff;
            position: relative;
            padding: 15px 0 15px 15px;
            margin: 10px 10px;
            box-shadow: 0 0 4px 3px #ecf0f1;
            border-radius: 5px;
        }
        .paper > .category {
            display: inline-block;
            width: 85%;
            float: right;
        }
        .category > p {
            font-size: .84em;
        }
        .category > h4, .category > h5 {
            font-size: .91em;
            margin: 3px 0;
            text-transform: uppercase;
        }
        .paper > .category-icon {
            display: inline-block;
            font-size: 2.5em;

        }
        .clip {
            background-color: #fff;
            color: #323232;
            padding: 5px 8px;
            margin: 3px 3px;
            display: inline-block;
            font-size: .82em;
            border-radius: 3px;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-xs-12 offset-xs-0 col-sm-8 offset-sm-2">
            <div class="row pad-all-2x">
                <div class="col-xs-12">
                    <img src="<?php echo $user->image_filename; ?>" alt="Profile Pic" class="avater">
                </div>
                <div class="col-xs-12">
                    <h3 class="heading-text">overview</h3>
                    <span class="username">@<?php echo $user->username; ?></span>
                    <p>
                        Full stack Web Developer, and System Administrator. Experienced in several Web Technologies and
                        Application development processes and cycle. Solid background in Python, and well versed in several
                        Programming Languages including PHP, and Javascript. Possess great flexibility and ability to quickly
                        adapt to company workflow.
                    </p>
                    <div class="social">
                        <a href="http://facebook.com/pythonleet"><i class="fa fa-facebook"></i></a>
                        <a href="http://twitter.com/ionwarez"><i class="fa fa-twitter"></i></a>
                        <a href="http://github.com/ionware"><i class="fa fa-github"></i></a>
                    </div>
                </div>
            </div>
            <div class="row pad-all-2x">
                <div class="col paper">
                    <i class="fa fa-user category-icon"></i>
                    <div class="category">
                        <h4>Biography</h4>
                        <p>
                            Stephen was born in a local town called Ogbomosho, part of Oyo;
                            Insatiable desire for exploring Tech. Loves good Musics, artistic works, and writing Poetry.
                        </p>
                    </div>
                </div>
                <div class="col paper">
                    <i class="fa fa-database category-icon"></i>
                    <div class="category">
                        <h4>Interests</h4>
                        <div class="clip">Engineering</div>
                        <div class="clip">Developing</div>
                        <div class="clip">Art</div>
                        <div class="clip">Poetry</div>
                        <div class="clip">Music</div>
                        <div class="clip">Graphics</div>
                        <div class="clip">Cooking</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>