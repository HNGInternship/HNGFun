<?php
    $queryUser = $conn ->query("SELECT * FROM interns_data WHERE username = 'oparaProsper' " );

    $prosper = $queryUser ->fetch(PDO::FETCH_OBJ);

    $querySecretWord = $conn ->query("SELECT * FROM secret_word");
    $secretWord = $querySecretWord->fetch(PDO::FETCH_OBJ);
    $secret_word = $secretWord ->secret_word;
    
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>I am opara prosper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/7c7493657e.js"></script>

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: arial;
        }
        
        .about{
            width: 50%;
            text-align: center;
            margin: 10% auto auto;
            border: 1px dashed black;
            padding: 2% 0;
            border-radius: 10px;
        }
        .about img{
            width: 250px;
            height: 250px;
            border-radius: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.7);
            border: 1px solid #00b2ff;
            margin-bottom: 1em;
        }
        h1{
            text-align: center;
            text-transform: uppercase;
            color: white;
            background: rgb(43, 40, 40);
            width: 80%;
            margin: auto;
            padding: .3em 0;
            border-radius: 10px;
        }
        .about span{
            color: #00b2ff;
        }
        #name{
            margin-top: 1%;
        }
        #about{
            width: 80%;
            margin: auto;
            text-align: left;
        }
       #icon .fa{
           background: #365899;
           padding: 1em 0;
           border-radius: 100%;
           color: black;
           width: 3em;
           text-align: center;
       }
    </style>
</head>

<body>


    <article class="about">
        
        <section>

            <img src="<?php echo $prosper->image_filename ?>" alt="This is my picture">
            <div id="name">

                <?php
                    echo"<h1> $prosper->username </h1>";
                ?>

            </div>

            <article id="about">
                <p>
                    I am <span><?php echo $prosper->name ?></span>, i'm a web developer based in aba and currently an undergraduate at the federal university of technology owerri. I am a knowledge junkie and always seek to learn new things [ that's why am working hard to become proficient in php]. 
                </p>
            </article>

            <div id="icon">
                <a href="https://twitter.com/opara.prosper"><i class="fa fa-facebook "></i></a>
                <a href="https://twitter.com/opara_prosper"><i class="fa fa-twitter "></i></a>
                <a href="https://github/opara-prosper"><i class="fa fa-github "></i></a>
                <a href="https://medium.com/@oparaprosper79"><i class="fa fa-medium "></i></a>
            </div>

        </section>
        
       
    </article>

         
</body>
</html>
