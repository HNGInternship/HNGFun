<?php
require '../db.php';

$query0 = $conn->prepare('SELECT * FROM `interns_data`');
$query1 = $conn->prepare('SELECT * FROM `secret_word`');
$query0->execute();
$query1->execute();


$result0 = $query0->fetchAll(PDO::FETCH_OBJ);
$result1 = $query1->fetchAll(PDO::FETCH_OBJ);
$secret_word = ($result1[0]->secret_word);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo ($result0[0]->name); ?></title>
  <style>
    body {
      background: #4169e1;
      color: #eee;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 200;
    }

    h1 {
      font-weight: 600;
      text-transform: uppercase;
      border-bottom: 5px solid;
      font-size: 3em;
      border-radius: 15%;
    }

    #container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 90vh;
    }

    .pic {
      height: 9em;
      border-radius: 15%;
    }

    .pic:hover {
      border: 2px solid #fff;
      margin: -2px;
    }

    figure,
    figcaption {
      text-align: center;
    }

    p {
      font-size: 1.1em;
    }

    span.learnpath {
      border: 1px solid;
      text-align: center;
      letter-spacing: 4px;
      padding: 1em;
      border-radius: 15%;
    }

    span.learnpath:hover {
      background: #fff;
      color: #4169e1;
      font-weight: bold;
      transition: 400ms;
    }

    svg {
      width: 3em;
      border: 1px solid #fff;
      border-radius: 15%;
    }

    svg:hover {
      border: none;
    }

    span:hover #gith {
      fill: #1B1817;
      transition: 400ms;
    }

    span:hover #twit {
      fill: #1da1f3;
      transition: 400ms;
    }

    footer {
      text-align: center;
    }
  </style>
</head>

<body>
  <div id="container">
    <h1>Hi!</h1>
    <figure>
      <img src="<?php echo ($result0[0]->image_filename); ?>" alt="Headshot/Potrait Image of Hamidu Abu"
        class="pic">
      <figcaption>
        My Name is <?php echo ($result0[0]->name); ?> and I am Learning Fullstack Web Development.
      </figcaption>
    </figure>
    <p>My Learning path is currently something like this:</p>
    <p>
      <span class="learnpath">HTML</span>
      <span class="learnpath">CSS</span>
      <span class="learnpath">JAVASCRIPT</span>
      <span class="learnpath">PHP</span>
    </p>
    <br>
    <p>
      <span class="learnpath">MYSQL</span>
      <span class="learnpath">MONGODB</span>
      <span class="learnpath">GIT</span>
      <span class="learnpath">FIGMA</span>
    </p>


  </div>
  <footer>
    <a href="https://github.com/hamiduabu" target="_blank">
      <span>
        <svg xmlns="http://www.w3.org/2000/svg" aria-label="Github" role="img" viewBox="0 0 512 512">
          <rect width="512" height="512" rx="15%" fill="#4169e1" id="gith" />
          <path fill="#fff" d="M335 499c14 0 12 17 12 17H165s-2-17 12-17c13 0 16-6 16-12l-1-50c-71 16-86-28-86-28-12-30-28-37-28-37-24-16 1-16 1-16 26 2 40 26 40 26 22 39 59 28 74 22 2-17 9-28 16-35-57-6-116-28-116-126 0-28 10-51 26-69-3-6-11-32 3-67 0 0 21-7 70 26 42-12 86-12 128 0 49-33 70-26 70-26 14 35 6 61 3 67 16 18 26 41 26 69 0 98-60 120-117 126 10 8 18 24 18 48l-1 70c0 6 3 12 16 12z"
          />
        </svg>
      </span>
    </a>

    <a href="https://twitter.com/HamiduAbu1" target="_blank">
      <span>
        <svg xmlns="http://www.w3.org/2000/svg" aria-label="Twitter" role="img" viewBox="0 0 512 512">
          <rect width="512" height="512" rx="15%" fill="#4169e1" id="twit" />
          <path fill="#fff" d="M437 152a72 72 0 0 1-40 12 72 72 0 0 0 32-40 72 72 0 0 1-45 17 72 72 0 0 0-122 65 200 200 0 0 1-145-74 72 72 0 0 0 22 94 72 72 0 0 1-32-7 72 72 0 0 0 56 69 72 72 0 0 1-32 1 72 72 0 0 0 67 50 200 200 0 0 1-105 29 200 200 0 0 0 309-179 200 200 0 0 0 35-37"
          />
        </svg>
      </span>
    </a>
  </footer>


</body>

</html>