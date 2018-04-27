<?php 
$result = $conn->query("SELECT * FROM secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("SELECT * FROM interns_data where username = 'Adebayo'");
$user = $result2->fetch(PDO::FETCH_ASSOC);

$username = $user['username'];
$name = $user['name'];
$image_filename = $user['image_filename'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Adebayo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Over+the+Rainbow" rel="stylesheet">
    <style>
        /* Desktop */

        html {
            height: 100%;
        }

        .oj-web-applayout-body {
            margin: 0;
            padding: 0;
            border: 0;
            height: 100%;
            background-color: #000000;
        }

        /* DAST */

        h1.logo {
            margin: 0px;
            font-family: 'Over the Rainbow', cursive;
            font-size: 36px;
            color: #000000;
            text-shadow: 2px 2px 3px #cccccc;
        }

        /* Profile */

        .oj-web-applayout-page {
            box-shadow: 0 4px 6px 0 #cccccc;
            max-width: 500px;
            max-height: auto;
            margin: auto;
            text-align: center;
            font-family: cursive;
            background: #70BBD9;
            margin-top: 5px;
        }



        /* Image */

        img {

            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: #C4C4C4;
            border: 3px solid #000000;

        }

        /* DARAMOLA ADEBAYO STEVE */

        h1.name {
            font-weight: bold;
            font-size: 24px;
            color: #000000;
            font-family: cursive;
        }

        /* Vector 3 */

        hr.linebreak {
            height: 0px;
            border: 1px inset;
            width: 100%;
        }

        /* WEB DEVELOPER - UI/UX DESIGNER - HNG INTERN */

        .skill {
            font-style: normal;
            font-weight: normal;
            line-height: normal;
            font-size: 24px;
            text-transform: uppercase;
            color: #000000;
        }

        /*icons*/

        .fa {
            padding: 10px;
            font-size: 15px;
            width: 35px;
            text-align: center;
            margin: 3px 2px;
            border-radius: 50%;
            text-decoration: none;
        }

        .fa:hover {
            opacity: 0.7;
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.35);
            transition: 0.2s;
        }

        .fa-facebook {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-twitter {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-linkedin {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        .fa-github {
            background: #000000;
            color: rgb(255, 0, 0);
        }

        #icons a {
            text-decoration: none;
        }

        div.contactMe button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: #000000;
            background-color: white;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        /* chatbot */
    /* section{
        background: inherit;
        color: rgb(3, 105, 145);
        margin: 0;
        font: 100%/1.5em 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        width: 250px;
    }
    fieldset{
        border: 0;
        margin: 0;
        padding: 0;
    }
    h4,h5{
        line-height: 1.5em;
        margin: 0;
    }

.contain img{
    border: 0;
    display: block;
    height: auto;
    max-width: 100%;
}
input{
    border: 0;
    color: inherit;
    font-size: 100%;
    line-height: normal;
    margin: 0;
}
#botTalk{
    margin: 0;
}
.clearfix{
    *zoom: 1;
}
.clearfix:before, .clearfix:after{
    content: "";
    display: table;
}
.clearfix:after{
    clear: both;
}
#chatbot{
    bottom: 0;
    font-size: 12px;
    right: 24px;
    width: 100%;
}
#chatbot header{
    background: #000000;
    border-radius: 5px 5px 0 0;
    color: #cccccc;
    text-align: center;
    padding: 10px 24px;
}
#chatbot h4:before{
    background: #1a8a34;
    border-radius: 50%;
    content: "";
    display: inline-block;
    height: 8px;
    margin: 0 8px 0 0;
    width: 8px;
}
#chatbot h4{
    font-size: 12px;
}
#chatbox h5{
    font-size: 6px;
}
#chatbot form{
    padding: 24px;
}
#chatbot input type[type="text"] {
    border: 1px solid #160404;
    border-radius: 5px;
    padding: 8px;
    outline: none;
    width: 100%px;
}
.chat-message-counter{
    background: #e62727;
    border: 1px solid #fff;
    border-radius: 50%;
    display: none;
    font-size: 12px;
    font-weight: bold;
    height: 28px;
    left: 0;
    line-height: 28px;
    margin: -15px 0 0 -15px;
    position: absolute;
    text-align: center;
    top: 0;
    width: 20px;
}
.chat {
            width: 250px;
            height: 300px;
            background: #fff;
        }
.chat-history{
    height: 252px;
    padding: 6px 24px;
    overflow-y: scroll;
}
.chat-history h5{
    font-size: 12px;
    font-weight: bold;
}
.contain{
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}
.contain::after{
    content: "";
    clear: both;
    display: table;
}
.contain-content{
    margin-left: 56px;
}
.chat-time-right{
    float: right;
    font-size: 10px;
} */

    </style>
</head>

<body class="oj-web-applayout-body">

    <div id="pageContent" class="oj-web-applayout-page">
        <div class="oj-web-applayout-content">
            <div class="oj-flex oj-sm-flex-items-1">
                <div class="oj-flex-item oj-sm-12 oj-md-12">
        <header>
            <h1 class="logo">DAST</h1>
        </header>
        
        <img src="<?php echo $image_filename;?>" alt="Me">


        <h1 class="name">
            <?php echo $name;?>
        </h1>

        <hr class="linebreak" />

        <p class="skill">ui/ux DESIGNER
            <br/> Web DESIGNER | HNG INTERN</p>
        <h5 style="font-family:cursive;">Slack:@<?php echo $username;?>
        </h5>

        <div id="icons">
            <a href="https://www.facebook.com/daramola.adebayo">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com/baystizzle">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/in/adebayo-daramola-31b852b3">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="https://github.com/Baystef">
                <i class="fa fa-github"></i>
            </a>
        </div>

        </div>
        </div>
        </div>

        <div class="contactMe">
            <button>
                <i class="fa fa-phone" style="font-size: 18px; color: red;"></i><a href="tel:+2347060771436" style="text-decoration: none;">Contact Me</a>
            </button>
        </div> 

        
</div>

    <!-- <section>
            <div id="chatbot">
                <header class="clearfix">
                    <h4>DAST-BOT</h4>
                    <span class="chat-message-counter">2</span>
                </header>
                <div class="chat">
                    <div class="chat-history">
                        <div class="contain clearfix">
                            <img src="" alt="">
                            <h5>DAST-BOT</h5>
                             <!--Robot's first words-->
                            <!-- <p id="botTalk">Hi, I am Dast, what's your name ?</p>
                            <div class="contain-content clearfix">
                                <span class="chat-time-right">
                                    <?php date_default_timezone_set('Africa/Lagos'); echo date("h:ia")?>
                                </span>
                                
                            </div>
                        </div>
                    </div>

                    <form action="#" method="post">
                        <fieldset>
                            <span>
                                <input type="text" name="talktome" id="talktome" placeholder="Talk to Me" autofocus>
                                <i><input type="submit" value="->"></i>
                            </span>
                            <input type="hidden">
                        </fieldset>
                    </form>
                </div>
            </div>
    </section> --> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- RequireJS bootstrap file --> 
    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
    <script></script>

</body>

</html>