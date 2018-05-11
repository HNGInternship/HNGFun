<?php

        $secret = $conn->query("SELECT * FROM secret_word   LIMIT 1");
        $secret->execute();
        $intern = $conn->query("SELECT * FROM interns_data WHERE username='bland' LIMIT 1");
        $intern->execute();

        $secret_word = $secret->fetch(PDO::FETCH_ASSOC);          
        $interns_data = $intern->fetch(PDO::FETCH_ASSOC);
        
        $name = $interns_data['name'];
        $username = $interns_data['username'];       
        $image = $interns_data['image_filename'];
?>


<div class="main_profile">

    
    
        <!-- Styles -->
        <style>
            div.main_profile{
                margin-top: 67px;
            }
            nav.main_nav_area{
                float: left;
                height: 30em;
                width: 15%;
                box-shadow: 7px 0px 50px #d5d5d5;
            }
            ul.social_links{
                position: relative;
                top: 8.25em;
            }
            ul.social_links a{
                float: left;
                width: 80%;
                margin: 1.5em 0;
            }
            ul.social_links a:hover{
                color: #000000;
            }
            ul.social_links a li{
                list-style: none;
                transform: rotate(-90deg);
                text-align: center;
                font-size: 13px;
            }
            div.display_image_area{
                width: 100%;
            }
            div.display_image{
                float: left;
                list-style: none;
                width: 20%;
                height: 30em;

                background-image: url(<?php echo $image; ?>);
                background-position: center;
                background-size: cover;
            }
            div.main_content_area{
                float: left;
                height: 30em;
                width: 45%;
                background-color: #181818;
                color: #575757;
            }
            div.content{
                position: relative;
                top: 3.75em;
                width: 71%;
                margin: 0 4em;
            }
            div p.name{
                font-size: 53px;
                font-size-adjust: 0.7;
            }
            div p.username{
                font-size: 15px;
                margin: auto 0;
                }
            div.main_content_area p{
                text-align: left     
            }
            div article p.about_me{
                color: #a8a7a7;
                text-shadow: 0 0 30px rgba(255, 255, 255, 0.45), 0 0 60px rgba(255, 255, 255, 0.25);
            }
            div article p.about{
                font-size: 27px;
                color: #ffffff;
            }
        </style>

    <!-- Navigation Area -->
    <nav class="main_nav_area">
        <ul class="social_links">
            <a href="https://twitter.com/megamindactual"><li>Twitter</li></a>
            <a href="https://medium.com/@danihesiulor"><li>Medium</li></a>
            <a href="https://dev.to/megamindactual"><li>DEV.to</li></a>
        </ul>
    </nav>
    <!-- Display Image -->
    <div class="display_image_area">
        <div class="display_image" ></div>
    </div>
    <!-- Main Area -->
    <div class="main_content_area">
        <div class="content">
            <p class="name"><?php echo $name; ?></p>
            <p class="username">@<?php echo $username; ?></p>
            
            
            <article> <p class="about">About</p> <p class="about_me">I am a junior web developer from Nigeria, And this is my HNG profile.</p></article>
        </div>
    </div>
    

</div>