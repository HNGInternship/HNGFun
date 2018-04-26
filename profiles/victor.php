<?php
    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'victor'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<style>
    body{
        background-color: #000000b8;
    }
    .content{
    
        color: #FFFAFA;
        padding-top: 60px
    }
    h1 {
        font-size: 58px;
        font-family: 'Montserrat', sans-serif;
        letter-spacing: 10px;
        font-weight: 900;
        margin-bottom: 28px;
    }
    h1 span {
        background-color: #030303;
        padding: 0.1em;
    }
    h1 mark {
        color: #030303;
    }      
    .social{
        margin-top: 19px;
        text-align: left;
    }
    .social li {
        display: inline-block;
        padding-right: 14px;
    }
    .user_img{
        display: inline-block;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
    }
    </style>
</head>

<body>

<div class="content">
    <header class="text-center">
            <div class="" data-wow-duration="1s" data-wow-delay="0.4s">
                <h1><span style="text-transform:capitalize"><?php echo $user->username; ?></span> <mark>Alagwu</mark></h1>
                <p class="lead"><mark>Learner | Autodidact | Tech Lover</mark></p>
            </div>
    </header>
    <div class="row">
        <hr>
        <div class="col-lg-12 col-md-12 text-center">
            <h3><span>About</span> <mark>Me</mark></h3>
            <hr>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-4">
                 <img src="https://res.cloudinary.com/codedvictor/image/upload/v1523622219/IMG_20180129_171523_ictawg.jpg" class="user_img">
                </div>
                <div class="col-lg-8">
                    <p class="intro">My name is <?php echo $user->username; ?>{you know that already}, a young computer science student from the University of Nigeria, Nsukka, who believes that this world would be a better place if we have more problem solvers, and also strive to be one.
                    </p>
                </div>
            </div>
                
                <div class="social text-center">
                    <ul>
                        <li> <a href="https://facebook.com/victor.alagwu"><i class="fa fa-facebook"></i></a> </li>
                        <li> <a href="https://twitter.com/i_jv_learner"><i class="fa fa-twitter"></i></a> </li>
                        <li><a href="https://github.com/victoralagwu"><i class="fa fa-github"></i></a></li>
                        <li> <a href="https://linkedin.com/in/victoralagwu"><i class="fa fa-linkedin"></i></a> </li>
                    </ul>
                </div>
        </div>
    </div>
</div>
