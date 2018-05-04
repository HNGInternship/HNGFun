 <!DOCTYPE html>
<html>
    <head>
        <title>Profle of Perkyprince</title>
        <meta charset="utf-8">
        <meta name="description" content="This page is a personal profile page about the author">
        <meta name="keywords" content="HTML5, CSS, Javascript, PHP, Profile, HNG, About, Internship">
        <meta name="author" content="Princewill Iwuala">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <style type="text/css">

          body {
            background-size:cover;
            background-color: #f2ca85;
            color: #333333;
            font-family: 'Courier New', Courier, 'Lucida Sans Typewriter', 'Lucida Typewriter', monospace;
          }
          .card {
            box-shadow: 0 40px 80px 0 rgba(0, 0, 0, 0.2);
            background-image: url(http://res.cloudinary.com/perkyprince/image/upload/v1525407435/classic.jpg);
            background-size:cover;
            max-width: 350px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 67px;
            margin-bottom: auto;
            text-align: center;
            background-color: white;
          }
          img {
            margin: auto;
          }

          .main {
            color: black;
            font-weight: bold;
            font-family: Roboto;
            font-style: normal;
            font-size: 30px;
          }
          #about{
            text-align: left;
            font-weight: bold;
            font-family: Roboto;
            font-style: italic;
            font-size: 18px;
          }

          .title {
            color: black;
            font-weight: bold;
            font-family: Roboto;
            font-style: italic;
            font-size: 18px;
          }

          .thick-green-border {
                border-color: grey;
                border-width: 1px;
                border-style: solid;
                border-radius: 30%;
          }

          button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
          }

          a {
            text-decoration: none;
            font-size: 22px;
            color: black;
          }

          button:hover, a:hover {
            opacity: 0.7;
          }
        </style>
    </head>
    <body>
      <?php
        require 'db.php';

      $select = $conn->query("SELECT * FROM secret_word LIMIT 1");
          $select->setFetchMode(PDO::FETCH_ASSOC);
          $result= $select->fetch();
          $secret_word = $result['secret_word'];


      $result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'perkyprince'");
          $result2->setFetchMode(PDO::FETCH_ASSOC);
          $user = $result2->fetch();

      // $query = "SELECT * FROM secret_word LIMIT 1";
      // $result = mysqli_query($conn, $query);
      // while($secret_word= mysqli_fetch_assoc($result))

      // $query2= "SELECT * FROM interns_data WHERE username = 'perkyprince'";    
      // $result2 = mysqli_query($conn, $query2);
      // while ($user = mysqli_fetch_assoc($result2));
      ?>
        <div class="card">
          <img class="smaller-image thick-green-border" src="http://res.cloudinary.com/perkyprince/image/upload/v1524546688/Camera1.jpg" alt="Perkyprince" style="width:80%">
          <h1 class="main"><?php echo $user["name"]?></h1>
          <p class="title">Intern at HNGInternship4</p>
          <p><ul id="about">
              <li>Web Developer/Designer</li>
              <li>Surveyor</li>
              <li>GIS Analyst</li>
              <li>Owerri, Imo state, Nigeria</li>
            </ul>
          <div>
            <a href="https://github.com/Perkyprince" target="_blank"><i class="fa fa-github"></i></a>
            <a href="https://www.instagram.com/princewillherberts/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://twitter.com/Perkyprince33" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/princewill-herberts-63b399126/" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://web.facebook.com/perky.prince.14" target="_blank"><i class="fa fa-facebook"></i></a>
          </div>
          <p><button>HNG Chat Bot</button></p>
        </div> 
        </body>
        </html>