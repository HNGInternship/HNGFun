<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tosho Ajibade Profile</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
    * {
        padding: none;
        margin: none;

        font-family: 'Open Sans Condensed', sans-serif;
    }

    body {
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 100%;
        width: 100%;
        padding: none;
        margin: none;
        background-color: #DEF1FF;
    }

    .content {

        border-radius: 0.25rem;
        display: flex;
        width: 600px;
        height: 500px;
        flex-direction: column;
        background-color: rgb(239, 246, 252);
    }

    .user {
        display: flex;
        height: 450px;
        margin-top: 25px;
        color: #156DB3;

    }

    .quote {
        background-color: #156DB3;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 75px;
        padding-right: 75px;
        border-radius: 0 0 0.25rem 0.25rem;
        text-align: center;
        font-size: 14px;
        color: white;
    }

    .about-me {
        flex: 4;
        padding: 0px;
        margin-right: 25px;
        margin-left: 25px;
        text-align: justify;
        margin-top: 0px;
    }

    .about-me>* {
        padding: 0px;
        margin: 0px;
    }

    .user-info {
        flex: 1;
        margin-left: 25px;

    }

    .user-info>* {
        font-size: 0.8rem;
        text-align: right;
        line-height: 0.5rem;
        font-style: italic;
        padding: none;

    }


    .profile-pic {
        border-radius: 0.5rem;
        width: 100px;
        height: 100px;
        background-color: #DEF1FF;
    }

    a {
        text-decoration: none;
        color: white;
    }

    .user-name {
        font-size: 1.2rem;
        font-style: normal;
    }
</style>

<body>
    <div class='content'>
        <div class='user'>
            <div class='user-info'>
                <img src="http://res.cloudinary.com/toshoajibade/image/upload/v1523826074/photo5951734494048398166.jpg" alt="Profile Picture"
                    class="profile-pic" srcset="">
                <p class="user-name">Tosho Ajibade</p>
                <p>Entrepreneur</p>
                <p>Lagos, Nigeria</p>
                <p>
                    <a href="#">
                        <span></span>@toshoajibade</a>
                </p>
            </div>
            <div class='about-me'>
                <p>ABOUT ME</p>
                <P>Tosho Ajibade is a graduate of Chemical Engineering from the prestigious Obafemi Awolowo University in Ile-Ife.
                    He is passionate about reading, learning new things and travelling. Tosho is an entrepreneur and he wants
                    to make the world a better place through technology.</P>
            </div>
        </div>
        <div class='quote'>
            <p>
                <q>If you don't go after what you want, you will never have it. If you don't ask, the answer will always be no. If
                    you don't step forward, you will always be in the same place.</q>
                <br>
                <cite>
                    <a href="#">-Nora Roberts</a>
                </cite>

            </p>
        </div>
    </div>
</body>

</html>