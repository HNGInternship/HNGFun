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
      /* background-color: firebrick; */
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
      width: 198px;
    }

    .social-icons {
      width: 18px;
      transition: all 700ms;
    }

    .social-icons:hover {
      transform: scale(1.2, 1.2);
    }
  </style>
</head>

<body>
  <div id="main">
    <div id="about">
      <div class="text-center">
        <img class="img-circle img-responsive" src="https://pbs.twimg.com/profile_images/977651261968388097/6m4IVFZN_400x400.jpg" width="250" style="margin: auto">
        <h2 id="hello">Hello</h2>
        <h3>I'm John Ayeni</h3>
        <h4>I am a Software Engineer from Nigeria</h4>
          <div id="social">
            <ul class="nav nav-pills">
              <li>
                <a href="https://codepen.io/johnayeni" target="_blank">
                  <img class="social-icons" src="https://res.cloudinary.com/mclint-cdn/image/upload/v1523605717/codepen.svg" />
                </a>
              </li>
              <li>
                <a href="https://github.com/johnayeni" target="_blank" target="_blank" target="_blank">
                  <img class="social-icons" src="https://res.cloudinary.com/mclint-cdn/image/upload/v1523605717/github.svg" />
                </a>
              </li>
              <li>
                <a href="https://twitter.com/johnayeni_" target="_blank" target="_blank">
                  <img class="social-icons" src="https://res.cloudinary.com/mclint-cdn/image/upload/v1523605718/twitter.svg" />
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