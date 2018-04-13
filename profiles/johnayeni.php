<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>John Ayeni</title>
  <meta name="theme-color" content="#2f3061">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <style>
    body {
      font-family: 'Ubuntu';
    }

    #main {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #about {
      color: #b22222;
    }

    #hello {
      font-size: 100px;
      color: #b22222;
      font-family: 'Alfa Slab One';
    }

    #about h4 {
      font-size: 40px;
      font-weight: bold;
    }

    #about h5 {
      font-size: 14px;
      color: #b22222;
    }

     #social {
      margin: 0 auto;
      width: 300px;
    }

    .social-icons {
      width: 50px;
      transition: all 700ms;
    }

    .social-icons:hover {
      transform: scale(1.2, 1.2);
    }

    @media (max-width: 575px) {
      #hello {
        font-size: 90px;
      }

      #profile-pic {
        width: 150px;
        height: 150px;
      }

      #about h4 {
        font-size: 24px;
      }

      #about h5 {
        font-size: 12px;
      }
    }
  </style>
</head>

<body>
  <div id="main">
    <div id="about">
      <div class="text-center">
        <img class="img-circle img-responsive" src="http://res.cloudinary.com/johnayeni/image/upload/v1523621916/john_gttqiq.jpg" width="250" style="margin: auto">
        <h2 id="hello">Hello</h2>
        <h3>I'm John Ayeni</h3>
        <h4>I am a Software Engineer from Nigeria</h4>
          <div id="social">
            <ul class="nav nav-pills">
              <li>
                <a href="https://codepen.io/johnayeni" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/johnayeni/image/upload/v1523630522/001-codepen_yqof5d.png" />
                </a>
              </li>
              <li>
                <a href="https://github.com/johnayeni" target="_blank" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/johnayeni/image/upload/v1523630522/003-github-logo_b5y1j4.png" />
                </a>
              </li>
              <li>
                <a href="https://twitter.com/johnayeni_" target="_blank" target="_blank">
                  <img class="social-icons" src="http://res.cloudinary.com/johnayeni/image/upload/v1523630522/002-twitter_nlb7b6.png" />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>