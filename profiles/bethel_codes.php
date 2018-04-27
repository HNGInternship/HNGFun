<!DOCTYPE html>
<html>
    <head>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Righteous"/>
        <style>
        html { height: 100%; width: 100%; }

        body {
        width: 100%; height: 100%;
        margin: 0; padding: 0; border: 0;
        font-family: Righteous;
        font-size: 13px; line-height: 15px;
        animation: bodyBg 4s;

        background: #757575;
        }

        @keyframes bodyBg{
            from{
                background: #C2185B;
            }
            to{
                background: #F8BBD0;
            }
        }

        #name{
            font-size: 70px;
            color: #ffffff;
            position: absolute;
            top: 46%; left: 35%;
            font-weight: bold;
            animation: nameAnn 2s;
        }

        #skills{
            font-size: 20px;
            color: white;
            position: absolute;
            top: 67%; left: 33%;
            font-weight: bold;
            animation: skillsAnn 2s;
        }

        #profileImage {
            border-radius: 50%;
            height: 200px;
            width: 200px;
            border: 1px solid white;
            position: absolute;
            top: 15%; left: 40%;
            animation: imageAnn 2s;
        }

        @keyframes imageAnn{
            from{
                position: absolute;
                top: 0%; left: 40%;
                opacity: 0
            }
            to{
                position: absolute;
                top: 15%; left: 40%;
                opacity: 0.8;
            }
        }

        @keyframes nameAnn{
            from{
                position: absolute;
                top: 46%; left: 70%;
                opacity: 0
            }
            to{
                position: absolute;
                top: 46%; left: 35%;
                opacity: 0.8;
            }
        }

        @keyframes skillsAnn{
            from{
                position: absolute;
                top: 45%; left: 10%;
                opacity: 0
            }
            to{
                position: absolute;
                top: 67%; left: 33%;
                opacity: 0.8;
            }
        }

    </style>
    </head>
    <body>
        <img src="http://res.cloudinary.com/hotel-ng/image/upload/v1524148090/bethel_codes.jpg" id="profileImage" alt="profileImage" />
        <p id="name">Bethel Eyo</p>
        <p id="skills">Android and Web Developer . Web Master</p>
    </body>
</html>
