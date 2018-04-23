<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>NeroCodes Profile</title>
    </head>
    <body>
    <style>
        body{
            background-color: #333333;
            color: #ffffff;
            text-align: center;
            background: -webkit-linear-gradient(top, #aaaaaa 0%, #333333);
            background: -moz-linear-gradient(top, #aaaaaa 0%, #333333);
            background: -o-linear-gradient(top, #aaaaaa 0%, #333333);
            background: -ms-linear-gradient(top, #aaaaaa 0%, #333333);
            background-image: url('https://res.cloudinary.com/drlcfqzym/image/upload/v1523934335/chess-2730034_1920.jpg');
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .image{
            display: block;
            width: 20%;
            height: 20%;
            border-style: groove;
            border-width: 2px;
            border-radius: 100%;
            margin:0 auto;
            opacity: 0.8;
        }

        .name{
            font-family: verdana;
            font-size: 2em;
            margin-top: 7px;
        }

        .username{
            font-family: verdana;
            font-size: 2em;
            color: #ffffff;
        }

        section{
            background-color: rgba(255,255,255,0.5);
            font-family: verdana;

        }

        section h3{
            font-size: 1.5em;
            background: -webkit-linear-gradient(top, #aaaaaa 0%, #333333);
        }

        
    </style>
    <?php      

        $sql = $conn->query("SELECT * FROM secret_word LIMIT 1");
        $sql = $sql->fetch(PDO::FETCH_OBJ);
        $secret_word = $sql->secret_word;

        $result = $conn->query("SELECT * FROM interns_data WHERE username = 'nerocodes'");
        $user = $result->fetch(PDO::FETCH_OBJ);

    ?>
    <main>
        <h1 class="name"><?php echo $user->name ?></h1>
        <img src="<?php echo $user->image_filename ?>" alt="" class="image">
        <h2 class="username">@<?php echo $user->username ?></h2>
        <section>
            <h3>Front-End Web Developer</h3>
        </section>
    </main>
        
    <footer>
            &copy;NeroCodes 2018
    </footer>
        
    </body>
</html>