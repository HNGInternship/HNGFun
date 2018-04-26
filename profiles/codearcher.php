<?php
require('db.php');

$result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'codearcher'");
   $user = $result2->fetch(PDO::FETCH_OBJ);

    $avater = "http://res.cloudinary.com/brianiyoha/image/upload/v1523633547/myAvatar_oatlnb.png";
  ?>

    <head>

        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500,700|Ubuntu+Mono:400,700|Roboto+Slab:400,700" rel="stylesheet">
        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                font-family: 'Ubuntu Mono', monospace;
                background: #f5f5f5;
                color: rgba(3, 54, 113, 0.93) !important;
            }
            .row{
                margin-right:0px;
            }
            .profile .container{
                max-width:100%;
                padding:0px;
                margin:0px;
            }
            .App {
                text-align: center;
                margin-top: 57px;
            }

            .App-header1 {
                background-color: rgb(27, 109, 202);
                height: 210px;
                padding: 20px;

            }

            .App .App-header1 .social_inline {
                display: inline;
            }

            .App .App-header1 .social_inline .social_icon {
                float: right;
                border: rgba(255, 255, 255, 0.8) solid 2px;
                padding: 5px 5px;
                font-size: 20px;
                border-radius: 20%;
                margin: 3px;
                color: rgba(255, 255, 255, 0.8);
            }

            .App .App-header1 .social_inline a:hover {
                border: rgba(255, 255, 255, 0.8);
                color: rgba(255, 255, 255, 0.8);
                background: rgba(255, 255, 255, 0.404);
                cursor: pointer;
            }

            .App .App-header1 .social_inline .btn {
                float: left;
                border: solid 1px transparent;
                padding: 10px;
                font-size: 15px;
                font-weight: 500;
                font-family: "Roboto Mono", monospace;
                border-radius: 5px;
                margin: 3px;
                -webkit-box-shadow: 0 1px 4px rgb(90, 158, 236);
                box-shadow: 0 1px 4px rgb(90, 158, 236);
                background-clip: padding-box;
                color: rgba(255, 255, 255, 0.8);
                text-transform: uppercase;
                margin-right: 15px;
                cursor: pointer;
                background: #2196F3 !important;

            }

            .App .App-header1 .social_inline a:hover.btn {
                border-radius: 5px;
                margin-right: 15px;
                -webkit-box-shadow: 0 3px 4px rgb(37, 85, 139);
                box-shadow: 0 3px 4px rgb(37, 85, 139);
                color: rgba(255, 255, 255, 0.8);
                background: rgb(5, 50, 92) !important;
            }

            .App-header2 {
                background-color: rgb(10, 98, 199);
                padding: 20px;
                position: relative;
                padding-top: 80px;
                color: white;
            }

            .App-header2 h1 {
                font-family: "Roboto Slab", serif;
                font-weight: 700;
                margin-top: -5px;
            }

            .quick-info {
                font-weight: bold;
                font-family: "Roboto Slab", serif;
            }

            .stack-info {
                font-size: 20pt;
                font-weight: 100;
                color: rgba(255, 255, 255, 0.432)
            }

            .intro {
                text-align: center;
                max-width: 800px;
                margin:auto;
                margin-top: -8px;
                padding: 4px;
            }

            .intro-pic {
                position: absolute;
                max-width: 150px;
                max-height: 150px;
                top: -70px;
                margin-left: -70px;
                left: 50%;
            }

            .App-header3 {
                background-color: rgb(0, 69, 148);
                padding: 20px;
                color: white;
                font-size: 20px;
                font-family: "Roboto Mono", monospace;
            }

            .App-header3 .nav .nav_list {
                display: inline;
                margin: auto;
            }

            .App-header3 .nav .nav_list .nav_item {
                display: inline;
                margin: 10px;
                cursor: pointer;
            }

            .App-title {
                font-size: 1.5em;
            }

            .App-intro {
                font-size: large;
            }

            /* The sticky class is added to the header with JS when it reaches its scroll position */

            .sticky {
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 2;
                background-color: rgba(3, 54, 113, 0.93);
                -webkit-box-shadow: 0 3px 4px rgba(149, 161, 175, 0.93);
                box-shadow: 0 3px 4px rgba(149, 161, 175, 0.93);
            }

            /* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */

            #nav-palceholder {
                height: 100px;
            }

            @media (max-width: 600px) {
                .App .App-header1 {
                    height: 210px;
                }

                .App .App-header1 .social_inline .social_icon {
                    float: none;
                    text-align: center;
                    margin: 3px;
                    display: inline-block;

                }

                .App .App-header1 .social_inline .btn {
                    float: none;
                    text-align: center;
                    margin: 3px;
                    display: block;

                }

                .intro-pic {
                    position: static;
                    max-width: 150px;
                    max-height: 150px;
                    margin-top: -70px;
                    margin-left: 0px;
                    left: 0%;
                }
                .App-header3 {
                    display: none;
                }
            }

            .card {
                padding: 45px;
                margin: 10px auto 10px;
                margin-top: 10px;
                margin-bottom: 50px;
                width: 80%;
                border: 2px solid rgb(223, 221, 221);
                border-top-left-radius: 10px;
                border-bottom-right-radius: 10px;
                background: white;
                -webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.2);
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.2);

                position: relative;
            }

            .card .card-header {
                margin-top: 0;
                margin-bottom: 45px;
                font-size: 24px;
                text-align: center;
                font-weight: 300;
                font-family: 'Roboto Mono', monospace;
            }

            .work {
                border-left: 3px solid rgb(61, 85, 122);
                border-bottom-right-radius: 2px;
                border-top-right-radius: 2px;
                position: relative;
                padding: 0 30px;
                margin-left: 280px;
                color: rgba(3, 54, 113, 0.93) !important;
            }

            .work .item {
                position: relative;
                margin-bottom: 45px;
            }

            .work .place_desc {
                position: relative;
            }

            .work .postion {
                text-align: left;
                position: absolute;
                left: -280px;
                top: 0;
            }

            .work .postion .title {
                font-size: 18px;
                color: rgba(3, 54, 113, 0.93) !important;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .work .postion .time {
                color: rgba(99, 114, 141, 0.596);
            }

            .work .job_desc {
                text-align: left;
                color: #666;
            }

            .work .place_desc .location {
                position: absolute;
                right: 0;
                top: 2px;
                color: #8a8a8a;
            }

            .work .place_desc .place {
                margin-top: 0;
                margin-bottom: 15px;
                font-size: 20px;
                text-align: left;
                font-family: "Roboto Mono";
                font-weight: 400;
                color: rgba(3, 54, 113, 0.93) !important;
            }

            @media (max-width:600px) {
                .work {
                    margin-left: 0px;
                }
                .work .postion {
                    text-align: left;
                    position: static;

                }
                .work .place_desc .location {
                    position: relative;
                    text-align: left;
                    margin-bottom: 10px;
                    color: #8a8a8a;
                }

                .work .place_desc .place {
                    margin-top: 0;
                    margin-bottom: 0px;
                    font-size: 20px;
                    text-align: left;
                    font-family: "Roboto Mono";
                    font-weight: 400;
                    color: rgba(3, 54, 113, 0.93) !important;
                }
                .work .postion .time {
                    margin-top: -10px;
                }
            }

            .skills {
                text-align: left;
            }

            .skills .item {
                margin-bottom: 45px;
                padding-right: 5px;
                text-align: center;
            }

            .skills .item-inner {
                padding: 0 30px
            }

            .skills .item-inner.others {
                -webkit-box-shadow: 0px 1px 10px 0px rgba(3, 54, 113, 0.93);
                box-shadow: 0px 1px 10px 0px rgba(3, 54, 113, 0.93);
                padding: 6px 30px;
                display: inline-block;
                margin-right: 10px;
                border-top-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border: 1px solid rgba(3, 54, 113, 0.93);
                font-weight: 500;
                margin-bottom: 15px;
                font-size: 16px
            }

            .skills .item.sub_title {
                font-size: 20px;
                font-weight: 100;
                color: #8a8a8a;
                margin-bottom: 15px;
            }

            .skills .stack {
                font-size: 20px;
                font-weight: 600;
                color: rgba(3, 54, 113, 0.93);
                margin-top: 0;
                margin-bottom: 0;
                font-family: "Roboto Mono", monospace;

            }

            .skills .skills-body {
                font-weight: 500;
                margin-bottom: 0;
                font-size: 16px;
                font-weight: 300
            }

            .skills .time {
                color: #8a8a8a;
                margin-bottom: 15px
            }

            .skills .desc {
                color: #666
            }

            .skills .social_inline {
                float: left;
                border: rgba(255, 255, 255, 0.8) solid 2px;
                padding: 0 5px;
                font-size: 20px;
                border-radius: 20%;
                margin: 3px;
                color: rgba(255, 255, 255, 0.8);
            }

            .contact {
                position: relative;
                color: #666;
                padding-left: 200px;
                text-align: left;
            }

            .contact .avater {
                position: absolute;
                width: 120px;
                height: 120px;
                left: 30px;
            }

            .contact .details a {
                color: rgba(3, 54, 113, 0.93);
                text-decoration: none;
            }

            .social_inline {
                display: inline;

            }

            .contact b {
                color: rgba(3, 54, 113, 0.93);
            }

            .contact .social_inline .social_icon .fab {
                float: none;
                text-align: center;
                margin: 3px;
                display: inline-block;
                border: 2px solid rgba(3, 54, 113, 0.93);
                border-radius: 50%;
                padding: 5px;
                font-size: 20px;
            }

            @media (max-width:600px) {
                .contact {
                    position: relative;
                    color: #666;
                    padding-left: 0px;
                    text-align: center;
                }
                .contact .avater {
                    position: static;
                    width: 120px;
                    height: 120px;

                }
            }
        </style>
        <div>
            <div class="App">
                <header>
                    <div class="App-header1">
                        <div class="social_inline">
                            <button onclick="window.history.back()" class="btn">
                                <i class="fa fa-arrow-left"></i>
                                Go Back To Intern Listing
                            </button>
                            <a href="https://github.com/thecodearcher" target="_blank" class="social_icon">
                                <i class="fa fa-github"></i>
                            </a>
                            <a href="https://github.com/thecodearcher" target="_blank" class="social_icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/codearcher/" target="_blank" class="social_icon">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="App-header2">
                        <img class="intro-pic" src="<?php echo $avater;?>" alt="brian iyoha avater">
                        <h1>
                            <?php echo $user->name;?>
                        </h1>
                        
                        <div class="intro">
                            <span> I Learn, Build, Code, Teach, Play, Collaborate and Eat :)</span>
                        </div>
                        <div class="stack-info">Full Stack Developer</div>
                    </div>
                    <div id="nav-palceholder">
                        <div id="nav" class="App-header3">
                            <div class="nav">
                                <ul class="nav_list">
                                    <li class="nav_item">Work</li>
                                    <li class="nav_item">Education</li>
                                    <li class="nav_item">Skills</li>
                                    <li class="nav_item">Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
                <div>
                    <div class="card">
                        <h3 class="card-header">Experiences</h3>
                        <div class="work">
                            <div class="item">
                                <div class="place_desc">
                                    <h3 class="place">Hotels.ng</h3>
                                    <div class="location">
                                        <i class="fa fa-map-pin"></i> Lagos</div>
                                </div>
                                <div class="postion">
                                    <div class="title">Intern</div>
                                    <div class="time">2018</div>
                                </div>
                                <div class="job_desc">
                                    <p>Learning how to solve problems through coding and become a better team player with the
                                        help of awesome mentors and team-mates.</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card">
                        <h3 class="card-header">Professional Skills</h3>
                        <div class="skills">
                            <div class="row">
                                <div class="item col-sm-12 col-md-12 col-xl-4 ">
                                    <div class="item-inner ">
                                        <h1 class="stack">PHP</h1>
                                        <div class="time">Intermediate,3 years</div>
                                        <div class="desc">Hypertext Preprocessor is a server-side scripting language which i have use to build
                                            backend's of websites </div>
                                    </div>
                                </div>
                                <div class="item col-sm-12 col-md-12 col-xl-4">
                                    <div class="item-inner ">
                                        <h1 class="stack">JAVASCRIPT</h1>
                                        <div class="time">Intermediate,3 years</div>
                                        <div class="desc"> A high-level, interpreted programming language which i use for creating dynamic contents
                                            on frontend of web apps/websites</div>
                                    </div>
                                </div>
                                <div class="item col-sm-12 col-md-12 col-xl-4">
                                    <div class="item-inner ">
                                        <h1 class="stack">NODEjs</h1>
                                        <div class="time">Intermediate,2 years</div>
                                        <div class="desc">A javascript framework which i use to build fast and non-blocking backend api's</div>
                                    </div>
                                </div>
                                <div class="item col-md-12 sub_title">Other Skills </div>
                                <div class="item col-md-12 ">
                                    <span class="item-inner others">HTML5</span>
                                    <span class="item-inner others">CSS3</span>
                                    <span class="item-inner others">SASS</span>
                                    <br>
                                    <span class="item-inner others">Laravel</span>
                                    <span class="item-inner others">Express</span>
                                    <span class="item-inner others">Ionic</span>
                                    <span class="item-inner others">Angular</span>
                                    <span class="item-inner others">React</span>
                                    <span class="item-inner others">Git &amp; GitHub</span>
                                    <span class="item-inner others">MongoDB</span>
                                    <span class="item-inner others">MySQL</span>
                                    <span class="item-inner others">BlockChain</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h3 class="card-header">Say Hello !!!</h3>
                        <div class="contact">
                            <img class="avater" src="<?php echo $avater;?>" alt="brian avater">
                            <div class="details">
                                <p> I 'm currently taking on freelance work. Hit me up with any cool project you'd want to execute.
                                    I'd appreciate the challenging ones mostly. </p>
                                <p>
                                    <b>I can help with the following:</b>
                                </p>
                                <ul>
                                    <li>Web App Development</li>
                                    <li>Progrssive Web App [PWA] Development</li>
                                    <li>Mobile App Development with Ionic</li>
                                    <li>Front-end Development with ReactJs and Angular 2+</li>
                                    <li>Back-end Development with NodeJs and PHP/Laravel</li>
                                </ul>
                                <p>You can say hello at
                                    <a href="mailto:brian.iyoha@gmail.com"> brian.iyoha@gmail.com </a> or ring me on
                                    <a>+234-7031362606</a>
                                </p>
                                <div class="social_inline">
                                    <a href="https://github.com/thecodearcher" target="_blank" class="social_icon">
                                        <i class="fa fa-github"></i>
                                    </a>
                                    <a href="https://github.com/thecodearcher" target="_blank" class="social_icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/in/codearcher/" target="_blank" class="social_icon">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="application/javascript">
            affix = () => {

                const palceholder = document.getElementById("nav-palceholder");
                const header = document.getElementById("nav");
                const sticky = header.offsetTop;
                const nav_palceholder = palceholder.offsetTop;

                if (window.pageYOffset <= nav_palceholder) {
                    header.classList.remove("sticky");
                } else if (window.pageYOffset >= sticky) {
                    header.classList.add("sticky");
                }
            }
            document.addEventListener("DOMContentLoaded", () => {
                window.addEventListener("scroll", () => {
                    this.affix()
                });
            });
        </script>

        </body>