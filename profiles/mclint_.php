<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Mbah Clinton</title>
  <meta name="theme-color" content="#2f3061">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <style>
    :root {
      --primary-color: #f0544f;
      --accent-color: #f4d58d;
      --text-secondary: rgba(244, 213, 141, 0.54);
      --text-primary: rgba(244, 213, 141, 0.8);
    }

    body {
      background-color: var(--primary-color);
      font-family: 'Ubuntu';
    }

    #main {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #about {
      color: var(--text-primary);
    }

    #hello {
      font-size: 200px;
      color: var(--accent-color);
      font-family: 'Alfa Slab One';
    }

    #about h4 {
      font-size: 40px;
      font-weight: bold;
    }

    #about h5 {
      font-size: 14px;
      color: var(--text-primary);
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

    #profile-pic {
      object-fit: cover;
      height: 250px;
      width: 250px;
      border-radius: 50%;
      border: 10px solid var(--accent-color);
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
        <img id="profile-pic" src="https://res.cloudinary.com/mclint-cdn/image/upload/v1523622051/mclint_.jpg" />
        <h1 id="hello">Hello!</h1>
        <h4>I'm Mbah Clinton</h4>
        <h5>A FREELANCE WEB & MOBILE DEVELOPER BASED IN GHANA</h5>
        <div class="navbar">
          <div id="social">
            <ul class="nav nav-pills">
              <li>
                <a href="https://codepen.io/mclint_" target="_blank">
                  <img class="social-icons" src="https://res.cloudinary.com/mclint-cdn/image/upload/v1523605717/codepen.svg" />
                </a>
              </li>
              <li>
                <a href="https://github.com/mclintprojects" target="_blank" target="_blank" target="_blank">
                  <img class="social-icons" src="https://res.cloudinary.com/mclint-cdn/image/upload/v1523605717/github.svg" />
                </a>
              </li>
              <li>
                <a href="https://twitter.com/mclint_" target="_blank" target="_blank">
                  <img class="social-icons" src="https://res.cloudinary.com/mclint-cdn/image/upload/v1523605718/twitter.svg" />
                </a>
              </li>
              <li>
                <a href="https://instagram.com/m.clint" target="_blank">
                  <img class="social-icons" src="https://res.cloudinary.com/mclint-cdn/image/upload/v1523605718/instagram.svg" />
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