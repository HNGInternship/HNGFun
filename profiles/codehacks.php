<?php
  date_default_timezone_set('Africa/Lagos');
  $result = $conn->query("SELECT * FROM secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'codehacks'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title><?php echo $user->name?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-lime.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        var goUp = $("#goTop");
        goUp.hide();
        $(window).scroll(function(){
          //more then or equals to
          if($(window).scrollTop() >= 100 ){
               goUp.fadeIn("slow");

          //less then 100px from top
          } else {
             goUp.fadeOut("fast");

          }
        });

        // Add smooth scrolling to all links
        $("#goTop").on('click', function(event) {

          // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 800, function(){

              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          } // End if
        });
      });
    </script>

    <!-- Uses a transparent header that draws on top of the layout's background -->
    <style>

      .body {
        background-color: #999999;
        overflow: hidden;
      }

      .mdl-layout__header-row {
        padding: 10px;
        height: 100%;
      }

      h1 {
        margin-right: 10px;
      }


      .job-role {
        font-size: 16px;
      }

      .mdl-layout-spacer {
        margin-right: 10%;
        text-align: right;
      }

      hr {
        border: 1px thin #fff;
        margin-left: 5px;
        margin-right: 5px;
        width: 98%;
      }

      .social-media {
        display: flex;
        padding: 10px;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
      }
      a:link {
        text-decoration: none;
      }

      .short-description {
        display: flex;
        padding: 10px;
        justify-content: space-between;
      }

      .short-description img {
        width: 250px;
        height: 250px;
        border-radius: 50%;
      }

      .work-experience {
        padding: 10px;
        width: 100%;
      }

      .work-experience-dewbicon a:link{
        background-color: rgb(96,125,139);
        padding: 5px;
      }

      h3 {
        color: #a7adb2;
        text-align: center;
      }

      .work-experience .work-time {
        font-size: 12px;
        color: #a7adb2;
      }
      .project {
        padding: 10px;
        width: 100%;
      }
      .project .project-dewbicon{
        margin: 10px;
      }
      .projects {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
      }
      .project .project-time {
        color: #a7adb2;
      }

      .demo-card-square.mdl-card {
        width: 320px;
        height: 320px;
      }
      .demo-card-square > .mdl-card__title {
        color: #fff;
        background:
          url('images/dewbicon.png') bottom right 15% no-repeat #46B6AC;
      }
      #goTop {
        position: fixed;
        bottom: 5px;
        right: 5px;
        background-color: rgb(96,125,139);
        border-radius: 50%;
        z-index: 5;
      }

      @media (max-width: 600px) {

        .mdl-layout__header-row{
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
          justify-content: center;
        }
        .job-role {
          display: block;
          margin: 10px;
        }
        .work-experience-dewbicon {
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
          justify-content: center;
        }
        .short-description {
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
          justify-content: center;
          align-items: center;
        }
        .projects {
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
          justify-content: center;
          align-items: center;
        }
        h2 {
          text-align: center;
        }

      }

    </style>

    </head>

    <body id="top">

      <!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout--no-desktop-drawer-button mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <h1 class="">Kelvin Gobo</h1>
      <span class="job-role">Front-End Developer</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer">
        <span>
          Flat 3 MLJ House,<br>
          Favour Street, Ozuoba<br>
          Port Harcourt, Nigeria.<br>
          (234) 817 432 7950<br>
          <a href="mailto:gobokel@gmail.com">gobokel@gmail.com</a><br>
        </span>
      </div>
      <!-- Navigation. We hide it in small screens. -->
    <!--  <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
      </nav>-->
    </div>

    <hr>

    <div class="social-media">
      <div>
        <span>Facebook: <a href="https://www.facebook.com/kelvin.gobo">Kelvin Gobo</a></span>
      </div>

      <div>
        <span>Twitter: <a href="https://twitter.com/kelvingobo">@kelvingobo</a></span>
      </div>

      <div>
        <span>Github: <a href="https://github.com/kelvingobo">Kelvin Gobo</a></span>
      </div>
      <div>
        <span>Linkedin: <a href="https://www.linkedin.com/in/kelvingobo">Kelvin Gobo</a></span>
      </div>
    </div>

    <hr>

    <div class="short-description">
      <div>
        <img src="http://res.cloudinary.com/codehacks/image/upload/v1524262578/moi.jpg">
      </div>

      <div>
        <p>I am a passionate Front-End Web Developer at <a href="https://dewbicon.com" target="_blank">Dewbicon Technologies</a>, standing on the shoulders of giants to build cutting edge web applications.</p>
        <h2>Core Skills</h2>
        <ul>
          <li>Polymer</li>
          <li>Firebase</li>
          <li>Vue.js</li>
          <li>Javascript</li>
        </ul>
      </div>
    </div>

  </header>
  <main class="mdl-layout__content">
    <div class="page-content">
      <!-- Your content goes here -->
      <div class="work-experience">
        <div class="work-experience-dewbicon">
          <h3>Work Experience</h3>
          <p>
            <a href="https://dewbicon.com">Dewbicon Technologies - <em>Front-End Web Developer</em></a>
          </p>
          <p class="work-time">November 2016 - Date</p>
          <p>Currently my work at Dewbicon Technologies involves all aspects of Front-End Web Development: UI/UX design, animations, designing Progressive Web Applications that can work offline and more. I often do database design using a NoSQL-like structure.</p>
        </div>
      </div>

      <div class="project">
          <h3>Projects</h3>
          <div class="projects">
            <div class="demo-card-square mdl-card mdl-shadow--2dp project-dewbicon">
              <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Dewbicon Technologies Website</h2>
              </div>
              <div class="mdl-card__supporting-text">
                <p class="project-time">March 2017</p>
                I worked with one other developer to create Dewbicon website, making use of Polymer, Firebase and Service Workers.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="https://dewbicon.com" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                  Check It Out
                </a>
              </div>
            </div>

            <div class="demo-card-square mdl-card mdl-shadow--2dp project-buspaddy">
              <div class="mdl-card__title mdl-card--expand">
                <h2 class="mdl-card__title-text">Buspaddy Website</h2>
              </div>
              <div class="mdl-card__supporting-text">
                <p class="project-time">Currently being developed</p>
                I was part of the team that worked on Buspaddy which is a system for booking bus tickets online.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="https://busme-bf800.firebaseapp.com" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                  Check It Out
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a id="goTop" href="#top">
        <img href="#top" src="images/arrow-up/web/arrow-up-18dp-2x.png">
      </a>
      </main>
</div>

    </body>

  </html>