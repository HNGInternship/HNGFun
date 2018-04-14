<?php
// Written and programmed by Joshua Eyenike
// HNG Remote Intern &copy; 2018
// Credits to Mark Essien
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Project Personal Portfolio Site">
    <title>Joshua Eyenike:::Digital Tech Nomad, Borderless</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style type="text/css">        
        body{
            margin: 0;
            max-width: 100em; 
            line-height: 1.5;
        }
        div{
            clear: both;
            padding: 20px;
        }
        code,
        pre{
            background: #eee;
        }
        code{
            padding: 2px 4px;
            vertical-align: text-bottom;
        }
        pre{
            padding: 1em;
        }

        h2{
            margin-top: 1em;
            padding-top: 1em;
        }
        #profile{
            text-align: center;
            max-width: 300px;
            margin: auto;
            border-radius: 50%;
        }
        div img{
            margin-left: 20px;
            margin-top: 20px;   
        }
        a{
            text-decoration: none;
        }
        a:hover{
            opacity: 0.3;
            box-shadow: 
        }
        #footer{
            margin: 0 auto;
            background: #A9A9A9;
        }
        blockquote{
            border-left: 5px solid red;
            padding: 5px;
            color: #FFFFFF;
            font-size: 1.5em;
        }
        q{
            font-size: 20px;
        }
        #backgroundProduct{
            top: 5%;
            left: 5%;
            width: 90%;
            height: 90%;
            z-index: 12;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-position: top; 
        }
    </style>
    <link rel="icon" href="img/envelope.svg">
</head>
<body id="backgroundProduct" style="background-image: url(http://res.cloudinary.com/joshuaeyenike/image/upload/v1523665925/workstation_tlxhei.jpg);">
    <h2 id="pageDisplay" style="color: #ffffff;" align="center"></h2>
    <div id="profile" align="center">
        <img src="http://res.cloudinary.com/joshuaeyenike/image/upload/v1516023994/IMG_5994_orzz15.jpg" alt="Joshua Eyenike" width="100%">
        <h1 style="color: #ffffff;">Joshua Eyenike</h1>
        <p class="title" style="font-size: 18px; color:#fafafa;">Digital Tech Nomad, Front-End Developer</p>
        <p style="color: gold; font-weight: bold;">HNG Remote Intern</p>
        <div style="margin: 24px 0;" align="center" id="link">
            <a href="https://www.linkedin.com/in/joshuaeyenike" target="_blank">
                <img src="http://res.cloudinary.com/joshuaeyenike/image/upload/v1523664789/linkedin-letters_lo4l1c.svg" alt="official facebook account" width="20" height="20" />
            </a>
            <a href="https://www.twitter.com/joshuaeyenike" target="_blank">
                <img src="http://res.cloudinary.com/joshuaeyenike/image/upload/v1523664790/twitter-black-shape_ytr4q2.png" alt="official twitter account" width="20" height="20" />
            </a>
            <a href="https://www.github.com/joshuaeyenike" target="_blank">
                <img src="http://res.cloudinary.com/joshuaeyenike/image/upload/v1523664789/github-character_jucl5t.png" alt="envelope symbol" width="20" height="20" />
            </a>
            <a href="http://www.joshuaeyenike.com.ng" target="_blank">
                <img src="http://res.cloudinary.com/joshuaeyenike/image/upload/v1523664789/link-symbol_qkpftv.svg" alt="envelope symbol" width="20" height="20" />
            </a>
            <a href="tel:+2347065159847">
                <img src="http://res.cloudinary.com/joshuaeyenike/image/upload/v1523664790/telephone-handle-silhouette_jkgo0k.svg" alt="call me" width="20" height="20" />
            </a>
            <a href="mailto:teyenike1@gmail.com" target="_blank">
                <img src="http://res.cloudinary.com/joshuaeyenike/image/upload/v1523664789/envelope_jnfg9h.svg" alt="envelope symbol" width="20" height="20" />
            </a>
        </div>
        <blockquote cite=""><q>Success is nothing if you have no one to share it with</q></blockquote>
        <div id="footer" align="center">
             <p style="color: #fff">Designed by <a href="#" style="color: #fff">Joey</a></p>
             <span style="color: #fff">All Rights Reserved &copy; 2018</span>
        </div>
    </div>
    <script>
        document.getElementById('pageDisplay').innerHTML = "HNG Personal Portfolio";
    </script>
</body>
</html>