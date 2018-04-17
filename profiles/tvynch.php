<?php

  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data WHERE username = 'tvynch'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@tvynch</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <style media="screen">
      .page-header {
      padding-bottom: 9px;
      margin: 40px 0 20px;
      border-bottom: 1px solid #eee;
      }
      .small{
          font-size: 0.35em;
          border-top: 1px solid #eee;
      }
      .header{
        font-weight: bold;
        font-stretch: expanded;
      }

      li{
        list-style: none;
      }

      section{
        margin-top: 50px;
      }

  .footer{
    margin-top: 15px;
    padding-top: 25px;
    border-top: 1px solid grey;
  }
  </style>
  <body>
    <div class="container">
      <div class="row">
          <header class="col-md-12">
            <h1 class="page-header"> <?php echo $user->username;?>'s Profile <span class="small"> George Jacob T.</span></h1>

            <div class="text-center header">
              <h3>Major >> Web Developer</h3>
            </div>
          </header>

          <section class="col-md-6">

            <div class="col-12">
              <p>I am a simple guy, a graduate of Electrical/Electronics Engineering (Telecommunication Option), who fell in love with the codes and computers</p>
              <p>Presently getting deeper and hope to use this to create job opportunities for the unemployed youth while still learning to be great in the trade. Also to enlighten and teach young people the fun and beauty of not just owning a computer system but using it to build applications that could make the world a better place.</p>

              <p>Joining the Hotel.ng stack has made me feel like i am in a world where i am truly living, cause i meet people who are ready to teach and help shapen and polish my coding skills. Also i get the chance to assist others to get pass their hudles. Like they say <blockquote>"When you teach, you also learn."</blockquote> </p>
            </div>

            <div class="col-12">
              <p>Glad To be here, Ready to learn, Ready for the challenges.</p>
              <p>Lets do this...</p>
            </div>

          </section>

          <section class="col-md-6">
            <img src="images/tvynch.jpg" alt="tvynch">
          </section>

          <footer class="footer text-center col-md-12">
            <div class="col-12">
            <h6>I can be reached for contracts and just to say hi with the contacts below</h6>
                <ul>
                  <li><a href="https://web.facebook.com/tammvynch">Facebook</a></li>
                  <li>08058957387 For mobile contact</li>
                  <li><a href="https://twitter.com/tvynch">Twitter</a></li>
                </ul>
              </div>
          </footer>

        </div>
    </div>
    <script src="../vendor/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
