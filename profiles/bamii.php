<!DOCTYPE html>
<html>
	<head>
		<title> Bami | Portfolio </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/dfb23fb58f.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<!-- link to main stylesheet -->
	<link rel="stylesheet" type="text/css" href="/css/main.css">
    <style>
        div.page-container {
        padding-top: 15px;
        width: 500px;
        border: 1px solid grey;
        border-radius: 2px;
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-bottom: 30px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow: hidden;
        z-index: -1;
        -webkit-box-shadow: -1px 1px 4px 1px #c8cbd1;
        -moz-box-shadow: -1px 1px 4px 1px #c8cbd1;
        box-shadow: -1px 1px 4px 1px #c8cbd1;
        }

        .blur {
        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);
        }

        /* NAVIGATION */
        div.navigation {
        position: fixed;
        padding-right: 30px;
        width: 100%;
        margin: 0;
        }

        .hamburger {
        float: right;
        }

        /* HEADER STYLES */
        .header-container {
        width: 100%;
        }

        .my-details {
        width: 70%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        text-align: center;
        }

        .img-container {
        height: 300px;
        width: 100%;
        display: flex;
        justify-content: center;
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 10px;
        }

        .img-container>img {
        height: inherit;
        border-radius:50%;
        }

        h1 {
        border-bottom: black 1px solid;
        }

        div>h1,
        div>h2{
        margin: 0;
        font-family: 'Raleway', sans-serif;
        color: black;
        text-align: center;
        }

        /* MORE DETAILS */
        .more-details {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-top: 15px;
        }

        .about-me,
        .my-stack,
        .portfolio-click {
        font-family: 'Josefin Sans';
        border: 1px solid black;
        margin: 0 auto;
        margin-top: 10px;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;  
        width: 80%;
        height: 50px;
        display: flex;
        cursor: pointer;
        }

        @keyframes ish {
        0% { height: 0; }
        100% { height: auto; }
        }

        @-webkit-keyframes ish {
        0% { height: 0; }
        50% { height: auto; }
        }

        .first-paragraph,
        .second-paragraph {
        font-family: 'Josefin Sans';
        display: none;
        flex-direction: column;
        border: 1px solid #888888;
        margin: 0 auto;
        width: 75%;
        padding-left: 10px;
        padding-right: 10px;
        -webkit-transition: height 4s ease;  
        -moz-transition: height 4s ease;  
        -o-transition: height 4s ease;  
        -ms-transition: height 4s ease;  
        transition: height 4s ease;
        }

        .paragraph-active {
        height: 200px;
        display: flex;
        }

        /* NAVIGATION MODAL */
        #nav-modal,
        #portfolio {
        position: fixed;
        top: 0;
        display: none;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        z-index: 1;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        }

        .modal-contents {
        position: fixed;
        margin: 0 auto;
        width: 100%;
        text-align: center;
        }

        .useless {
        position: absolute;
        width: 100%;
        height: 100%;
        }

        div>.social-text {
        font-family: 'Raleway', sans-serif;
        padding-bottom: 5px;
        coursor: crosshair;
        margin: 0 auto;
        text-align: center;
        width: 60%;
        color: white;
        font-size: x-large;
        border-bottom: 1px white solid;
        }

        .help-text {
        font-family: 'Raleway', sans-serif;
        font-size: small;
        color: white;
        }

        .social-links {
        font-family: 'Raleway', sans-serif;
        color: white;
        display: flex;
        justify-content: space-around;
        margin: 0 auto;
        padding-left: 0;
        width: 60%;
        font-size: x-large;
        }

        li:first-child {
        border-right: 1px white solid;
        }

        li {
        display: inline-block;
        border-bottom: 1px solid transparent;   width: 0px;
        transition: 0.6s ease;
        white-space: nowrap;
        }

        li:hover {
        border-bottom: 1px solid white;
        border-right: 1px solid white;
        border-left: 1px solid white;
        width: 50%;
        }

        li {
        list-style: none;
        width: 50%;
        padding-top: 1px;
        }

        a,
        a:hover,
        a:visited,
        a:active {
        color: white;
        text-decoration: none;
        }



        /* PORTFOLIO STYLES */
        .portfolio-close {
        font-family: 'Raleway';
        color: white;
        display: fixed;
        width: 40%;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px white solid;
        cursor: pointer;
        }

        .portfolio-close:hover {
            background: white;
            color: black;
            border: 1px solid black;
        }

        .portfolio-item-container {
        height: 300px;
        width: 100%;
        display: flex;
        flex: wrap;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        }

        .portfolio-item {
        width: 200px;
        height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        margin: 0;
        overflow: hidden;
        }

        .portfolio-item>img {
        height: 80%;
        width: auto;
        }

        .portfolio-item>a {
        font-family: 'Raleway', sans-serif;
        }
    </style>
	</head>
<body>
  <div class="page-container">
  <div class="navigation">
    <div class="hamburger" onClick="openNav()"> 
      <i class="fa fa-tasks fa-2x" aria-hidden="true"></i>
    </div>
  </div>
  <div class="header-container">
    <div class="img-container">
      <img class="profile-image" src="http://res.cloudinary.com/bambam/image/upload/v1523622325/16966438.jpg"/>
    </div>
    <div class="my-details">
      <h1> Ayobami Ayo-Salami </h1>
      <h2 id="button"> Web Developer </h2>
    </div>
  </div>
  
  <div class="more-details">
     <!--
     <div id="about" class="about-me" onClick="open1()"> About Me </div>
     <div id="first" class="first-paragraph transform">
      <p> <strong>I</strong> am an undergraduate Computer Science w/ Economics student of Obafemi Awolowo University. </p>
       <p> <strong>I</strong> am currently a freelancer and I build responsive websites, mobile apps(using React Native, and Java). </p>
     </div>
     -->
    
    <div id="stack" class="my-stack" onClick="open2()"> My Stack </div>
    <div id="second" class="second-paragraph">
      <p> I mostly work frontend designing, using the obvious HTML & CSS, Bootstrap, and React (it was made primarily for UI). I also build mobile apps using React Native (and i'm pretty good at it, if i do say so myself) and Java. </p>
      <p>
        Here's the list of the Programming Languages i'm conversant with and the areas of specialisation in each Language.
        <ul>
          <li> Java </li>
          <li> Javascript </li>
          <li> HTML5, CSS, JS bundle </li>
          <li> React </li>
          <li> ExpressJS </li>
          <li> KnockoutJS </li>
        </ul>
      </p>
    </div>
  
    <div id="third" class="portfolio-click" onClick="openPortfolio()"> Portfolio </div>
  </div>

</div>
<div id="nav-modal">
  <div class="useless" onClick="closeNav()">
    
  </div>
  <div class="modal-contents" onClick="stuff(event)">
    <div class="help-text"> (Click on the links to open, or click elsewhere to close the modal) <br/>
      </div>
    <div class="social-text"> You can find me cooling off on
    </div>
    <ul class="social-links">
      <li> <a href="https://github.com/Bamii"> @bamii <i class="fa fa-github" aria-hidden="true" fa-3x></i> </a> </li>
      <li> <a href="https://twitter.com/dhaiveed"> @dhaiveed <i class="fa fa-twitter" aria-hidden="true" fa-3x></i> </a> </li> 
    </ul>
  </div>
</div>
<div id="portfolio">
  <div class="portfolio-close" onClick="closePortfolio()"> Close </div>
  <div class="portfolio-item-container">
    <div class="portfolio-item">
      <img src="./img/app.png" alt="first project" />
      <a href="https://ricknmorty.herokuapp.com"> Rick And Morty App </a>
    </div>
  </div>
</div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
    <script>
        // some constants ==> #232870
        function open1() {
        const component = document.getElementById('first');
        if(component.style.display == 'flex') {
            component.style.display = 'none';
            
            document.getElementById('about').style.background = 'white';
        document.getElementById('about').style.color = 'black';
        } else {
            component.style.display = 'flex';
            document.getElementById('about').style.background = 'black';
        document.getElementById('about').style.color = 'white';
        }
        }

        function open2() {
        const component = document.getElementById('second');
        if(component.style.display == 'flex') {
            component.style.display = 'none';
            document.getElementById('stack').style.background = 'white';
        document.getElementById('stack').style.color = 'black';
        } else {
            component.style.display = 'flex';
            document.getElementById('stack').style.background = 'black';
        document.getElementById('stack').style.color = 'white';
        }
        }

        function openNav() {
        document.getElementById("nav-modal").style.display = "flex";
        var ish = document.querySelector(".page-container");
        ish.className = ish.className + " blur";
        //alert("Help");
        }

        function closeNav() {
        document.getElementById("nav-modal").style.display = "none";
        var ish = document.getElementsByClassName("page-container")[0].classList.remove("blur");
        }

        function openPortfolio() {
        document.getElementById("portfolio").style.display = "flex";
        var ish = document.querySelector(".page-container");
        ish.className = ish.className + " blur";
        }

        function closePortfolio() {
        document.getElementById("portfolio").style.display = "none";
        var ish = document.getElementsByClassName("page-container")[0].classList.remove("blur");
        }
    </script>
</body>
</html>
