<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Damilare Daniel</title>
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
      background-color: black;
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
  </style>
</head>

<body>
  <div id="main">
    <div id="about">
      <div class="text-center">
        <h1 id="hello">Hello!</h1>
        <h4>I am solanke Damilare Daniel</h4>
        <h5 align="center">A Front end Developer</h5>
        <div class="navbar">
          <div id="social">
            <ul class="nav nav-pills">
              <li style="display:inline">
                <a href="https://res.cloudinary.com/damilare1957/image/upload/v1523622655/dan.jpg">
                  <img  src="https://res.cloudinary.com/damilare1957/image/upload/v1523622655/dan.jpg" width="200" height="200">
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