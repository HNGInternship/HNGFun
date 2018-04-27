<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>HNG Test</title>

	<link href="res/css/style.css" rel="stylesheet" />
<style>
	* {
    box-sizing: border-box;
}
.container{
    width: 100%;
    text-align: justify;
    line-height: 1.2;
}
.header{
    width: 100%;
    height: 55px;
    line-height: 1.2px;
    color: #fff;
    padding: 20px;
    font-size: 24px;
    background-color: #7a8690;
    margin-top: -10px;
}
.header span{
    margin-left: 70px;
}
#intro{
        background-image: url(http://res.cloudinary.com/duxoxictr/image/upload/v1523623853/coding-laptop.png);
        max-width: 100%;
        height: 450px;
    }
#intro-span{
    padding-top: 150px;
}
#intro-span #main{
    background-color: rgba(0, 0, 0, 0.73);
    width: 350px;
    color: #fcfcfc;
    font-size: 20px;
    padding: 20px;
    text-align: left;
    margin: 0 auto;
}#intro-span #main #me{
    font-size: 25px;
    font-weight: 400px;
}#intro-span #main span{
    font-size: 16px;
}

.main{
    background-color: rgba(255, 255, 255, .9);
    width: 100%;
    padding: 20px;
    margin: 0 auto;
    z-index: 6px;
}
h1{
    font-size: 30px;
}
h1, h2, p{
    font-family: serif;
}
.img{
    min-width: 40%;
    height: 270px;
    padding: 15px;
    margin-top: -30px;
}
.img2{
    width: 0px;
    height: 0px;
    display: none !important;
}
#caption{
    width: 55%;
}
.mission{
    background-color: #e1e3ef;
    border: 4px solid #c1c1c1;
    padding: 8px;
    border-radius: 0px 10px;
    margin-top: 20px;
}
.school{
    border-left: solid 4px #667c90;
    padding: 10px;
    margin-right: 5px;
}
.school span{
    font-size: 18px;
    font-family: fantasy;
}
.school #g{
    color: #4285f4;
}.school #o1{
    color: #ea4335;
}.school #o2{
    color: #fbbc05;
}.school #l{
    color: #34a853;
}
.inLove{
    margin-left: 20px;
    margin-bottom: -20px;
}
#mobile1{
width: 60%;
background-color:#34a853;
}
footer{
    width: 95%;
    text-align: center;
    background-color: #47484b;
    margin: 0 auto;
    color: #fff;
    padding: 5px;
}
footer a{
    text-decoration: none;
    color: #fff;
}
footer #link{
    border-right: solid 2px #fff;
    padding: 6px;
}
@media only screen and (max-width: 500px) {
    .img{
        width: 0px;
        height: 0px;
    }.img2{
        width: 100%;
        height: 400px;
        margin-top: -45px;
        padding: 20px;
    }
    #caption{
       width: 100%;
        margin-top: -40px;
    }
    .get-started{
        padding: 20px;
    }
}
@media only screen and (min-width: 501px) {
    .img{
        width: 40%;
        float: right;
        height: auto;
    }
    #caption{
        width: 60%;
    }
}@media only screen and (max-width: 460px) {
    .header span{
        margin-left: 0px;
    }
    #intro-span #main{
        width: 90%;
    }
    .img2{
        width: 0px;
        height: 0px;
    }
    .mission{
        width: 100%;
        text-align: left;
    }
    #caption{
        margin-top: -35px;
    }
    .get-started{
        padding: 10px;
    }
    .get-started h1{
        text-align: left;
    }
    footer #link, footer #link2, footer p{
        border: 0px;
        display: block;
        padding: 6px;
        text-align: left;
    }
}@media only screen and (max-width: 850px) {
    .get-started{
        padding: 10px;
    }

}
@media only screen and (min-width: 850px) {
    .img{
        height: 500px;
    }

}

</style>
</head>
<body cz-shortcut-listen="true">

<?php
    
		require 'db.php';

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;
 
$result2 = $conn->query("Select * from interns_data where username = 'pearl'");
  
$user = $result2->fetch(PDO::FETCH_OBJ);
?>

	<div class="container">
		<header>
			<div class="header">
                <span><?php echo $user->name ?></span>
     </div>
		</header>

        <div id="intro">
            <div id="intro-span">
                <div id="main">
                    Hi, I am<br /><span id="me"><?php echo $user->name ?></span><br />
                    <span>A Software Developer</span>
                </div>
            </div>
        </div>
		<section class="main">
			<div class="get-started">
                <h1>Meet <?php echo $user->username ?></h1>
                <div>
                    <img class="img"  src="<?php echo $user->image_filename ?>" alt="She Codes" /></div>
                <p class="mission" id="caption"><b>My mission for HNG Internship:</b> Be a world class developer, initiate and complete innovative projects, and have a voice in the technology ecosystem. </p>
                
                <p>Anyway, this is the “About” page, so I should probably tell you my story.
                </p>
                <p>
                    <em><\Insert Flashback Sequence></\Insert></em>
                </p>
                <p>In my younger days, I was on the track towards medical school(Medcine and Surgery), but was detoured on the way by the quest for Admission. As years passed I settled for an alternative course (Computer Science), then did I realized humanity can be helped or even saved through software development.</p>
                <h3 class="inLove">She Fell in Love</h3>
                <p class="school">I found the love of my life few months before Industrial Training, a friend of mine one afternoon came to my room so excited, she wanted to demonstrate something to me but I was watching movie(that’s what majority of students do with their PC, I was no different). Her excitement was overwhelming that I gave her an opportunity. Guess what! she wrote some foreign characters, opened my browser and boom!!! the miracle happened; <span id="g">G</span><span id="o1">o</span><span id="o2">o</span><span id="g">g</span><span id="l">l</span><span id="o1">e</span> written bodily with its 4 different colours appeared on the screen, immediately I fell in love.
My love grew into passion that I gave up my little savings to learn web development using java for back end. The journey have not been easy but I have this inner peace that am doing what I love the most.</p>
                
                <h2 style="text-align:left;">Skills</h2>
                <p>Web Development <span style="font-weight:bold;">60%</span></p>
	
                <p>Mobile Development <span style="font-weight:bold;">40%</span></p>
		</section>
		<footer>
				<p class="meta">
                    <a id="link" href="http:/linkedin.com/in/chiamaka-osumgba-7ba8a9145/" target="_blank">LinkedIn</a>
                    <a id="link" href="https://github.com/osumgbachiamaka" target="_blank">Github</a><a id="link" href="https://www.facebook.com/chiamaka.pearl1" target="_blank">Facebook</a><a id="link" href="http:/instagram.com/kindnessosumgba" target="_blank">Instagram</a>
                    <a id="link2" href="https://twitter.com/KindnessOsumgba" target="_blank">Twitter</a>
                </p>
		</footer>
    </div>
</body>
</html>
