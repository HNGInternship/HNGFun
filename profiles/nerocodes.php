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
            font-size: 3em;
        }

        .username{
            font-family: verdana;
            font-size: 2em;
        }

        section{
            background-color: rgba(255,255,255,0.5);
            font-family: verdana;

        }

        section h3{
            font-size: 1.5em;
            background: -webkit-linear-gradient(top, #aaaaaa 0%, #333333);
        }

        ul{
            list-style: none;
        }
    </style>
    <main>
        <?php
            
            
            $sql = $conn->query("SELECT * FROM secret_word LIMIT 1");
            

            $sql = $sql->fetch(PDO::FETCH_OBJ);
            $secret_word = $sql->secret_word;

            $stmt = $conn->query("SELECT name, username, image_filename FROM interns_data_");
            

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            while($row = $stmt->fetch()) {
                echo "<h1 class='name'>".$row['name']."</h1>".
                "<img class='image' src='".$row['image_filename']."'>".
                
                "<h2 class='username'>@".$row['username']."</h2>";
                
                
            }
            
            


        ?>
        <section>
            <h3>Front-End Web Developer</h3>
        </section>
        
    </main>
    <footer>
            &copy;NeroCodes 2018
    </footer>
        
    </body>
</html>