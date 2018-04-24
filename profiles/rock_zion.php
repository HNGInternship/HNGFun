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

<title>rock_zion</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<meta http-equiv="x-ua-compatible" content="ie=edge">

<style>



.profile {

padding-top: 50px !important;

background-color:#fafafa !important;

width: 100% !important;

height:720px !important;



}

.profile-image img{

width: 300px ;

height: 300px ;

margin-left: auto ;

margin-right: auto ;

display: block ;

}

.profile-image {

margin-left: 50px ;

background-color: #fafaff ;

width: 400px !important;

height: 400px !important;

padding-top: 25px ;

padding-bottom: 50px ;

}

.social{

width : 300px ;

height: 70px ;

margin: auto ;

}

.social img{

width:40px ;

height:40px ;

float: left ;

margin:10px ;

}

.name, .designer, .about {

font-family: product sans ;

text-align: center ;

color: #6f6f6f ;

}

.profile-description{

display:block ;

background-color: rgb(255, 255, 255) ;

height : 300px ;

}



</style>

</head>

<body>

<div class="profile">

<div class="profile-image">

<img class="profile-image" src="http://res.cloudinary.com/rock-zion/image/upload/v1523811037/profile.jpg">

<div class="social">

<a href="https://twitter.com/rock__Zion"> 

<img class="twitter" src="http://res.cloudinary.com/rock-zion/image/upload/v1523830003/Twitter.png">

</a>

<a href="https://www.instagram.com/rock_zion/">

<img class="instagram" src="http://res.cloudinary.com/rock-zion/image/upload/v1523830017/Instagram.png">

</a>

<a href="https://hnginternship4.slack.com/messages/DA4A6JUHF/team/UA4A6JHS5/">

<img class="slack" src="http://res.cloudinary.com/rock-zion/image/upload/v1523856201/Slack.png">

</a>

<a href="https://github.com/rock-zion">

<img class="github" src="http://res.cloudinary.com/rock-zion/image/upload/v1523856193/Github.png">

</a>

<a href="https://www.behance.net/rock_zion0bd8">

<img class="behance" src="http://res.cloudinary.com/rock-zion/image/upload/v1523862142/Behance.png">

</a>



<div class="profile-description" >

<p class="name">
    Ibitoye Oluwafemi Zion
</p>

<p class="designer">

UI-UX Designer

</p>

<p class="about">

I'm Zion, UI/UX designer, lover of music, movies, comics and video games

</p>

</div>

</div>

</div>



</div>

</body>

</html> 