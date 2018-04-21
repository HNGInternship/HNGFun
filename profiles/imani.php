<?php 
    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

        throw $err;
    }?>
<head>
   <title>Tolu Faith</title> 
   <meta name="author" content="Tolu Faith">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="personal portfolio website for Tolu Faith">
   
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">    
</head>
<body>

    <style>
                    body{
                        background-color: #1f2124;
                        color: #ccc;
                        font-family: 'Montserrat', sans-serif;
                        margin: 0;
                        padding: 0;
                    }
                    /*Fix browser issues*/
                    ul, menu, dir {
                        display: block;
                        list-style-type: disc;
                        -webkit-margin-before: 0;
                        -webkit-margin-after: 0;
                        -webkit-margin-start: 0px;
                        -webkit-margin-end: 0px;
                        -webkit-padding-start: 0px;
                    }
                    hr {
                        display: block;
                        -webkit-margin-before: 0.2em;
                        -webkit-margin-after: 0.2em;
                        -webkit-margin-start: auto;
                        -webkit-margin-end: auto;
                        border-style: inset;
                        border-width: 1px;
                    }
                    h1 {
                        display: block;
                        font-size: 2em;
                        -webkit-margin-before: 0.67em;
                        -webkit-margin-after: 0.2em;
                        -webkit-margin-start: 0px;
                        -webkit-margin-end: 0px;
                        font-weight: bold;
                    }
                    /*end*/
                    .message{
                        position: absolute;
                        bottom: 20px;
                        right: 20px;
                        color: #222;
                        padding: 15px 20px;
                        text-decoration: none;
                        background-color: #FFF5C3;
                        border-radius: 4px;
                    }
                    .box{
                        position: relative;
                        box-sizing: border-box;
                        min-height: 100vh;
                        display: block;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        text-align: center;
                    }
                    @media (max-width: 500px){
                        .box{
                            position: relative;
                            min-height: 300px;
                            padding: 50px 10px 100px;
                            display: block;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            text-align: center;
                        }
                    }
                    .home__box{
                        background: linear-gradient(135deg, rgba(240, 95, 87,0.7) 0%, rgba(54, 9, 64,0.7) 100%),url(icon-background.webp);
                        background-size: cover;
                        background-repeat: no-repeat;
                    }

                    .home__box img{
                        height: 250px;
                        width: 250px;
                        border:#222;
                        border-radius: 20%;
                        margin-right: 20px;
                    }
                    h1{
                        color: #FFDB01;
                    }
                    .small-text{
                        font-size: 0.6em;
                        color: #ccc;
                    }
                    .smaller-text{
                        font-size: 0.6em;
                        color: #aa0;    
                    }
                    h1 ul{
                        display: block;
                    }
                    ul li{
                        display: inline-block;
                        padding-left: 10px;
                        padding-right: 10px;
                    }
                    ul li a{
                        color: #fff;
                    }
                    .modal{
                        display: none;
                        width: 100%;
                        height: 100vh;
                        box-sizing: border-box;
                        background-color: rgba(0,0,0, 0.7);
                        position: fixed;
                        top: 0;
                        left: 0;
                        z-index: 9999;
                    }
                    .modal-content{
                        position: relative;
                        max-width: 500px;
                        overflow-y: scroll;
                        margin: 15vh auto;
                        box-sizing: border-box;
                        padding: 20px;
                        background-color: #fff;
                        box-shadow: 0 4px 8px 0 rgba(0,0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.2);
                        -webkit-animation-name: animatetop;
                        -webkit-animation-duration: 0.4s;
                        animation-name: animatetop;
                        animation-duration: 0.4s;
                    }
                    .modal-content span{
                        position: absolute;
                        display: block;
                        right: 10px;
                        top: 5px;
                        color: #F05F57;
                        zoom: 2;
                    }
                    .modal-content span:hover{
                        cursor: pointer;
                    }
                    input[type="text"],input[type="email"]{
                        width: 80%;
                        margin-bottom: 20px;
                        padding: 15px;
                        border: 0;
                        outline: none;
                        border-bottom: 1px dashed #ccc;
                    }
                    textarea{
                        width: 80%;
                        outline: 0;
                        border: 0;
                        border-bottom: 1px solid #ccc;
                        padding: 15px;
                    }
                    .modal-content button{
                        padding: 10px 15px;
                        border: 0;
                    }

                    /*Animation*/
                    @-webkit-keyframes animatetop{
                        from{
                            top: -300px;
                            opacity: 0;
                        }
                        to{
                            top: 0;
                            opacity: 1;
                        }
                    }
                    @keyframes animatetop{
                        from{
                            top: -300px;
                            opacity: 0;
                        }
                        to{
                            top: 0;
                            opacity: 1;
                        }
                    }    
    </style>
    
    
    <div class="box home__box">
        <img src="http://res.cloudinary.com/imani/image/upload/v1523623991/IMG-20180314-WA0000_u1uara.jpg" alt="imani.jpg" title="imani">
        <div>
            <h1>Tolu Faith</h1>
            <ul>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/amToluFaith"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.github.com/ToluImani"><i class="fa fa-github"></i></a></li>
            </ul>
            <hr>
            <h2>
            <span class="small-text">
                UI/UX Designer and Frontend Enthusiast
            </span>
            </h2>
        </div>
    </div>


</body> 
</html>