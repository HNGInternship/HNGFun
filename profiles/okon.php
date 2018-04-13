<!DOCTYPE html>
<html>
<body >

<div>
</div>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <title>Hotels Nigeria</title>

    </head>

    <body>

      <ul style="margin-top:10px;" class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" href="{% url 'base' %}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Discover</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Contact</a>
        </li>
      </ul>

<center>
<div style="padding:48px;" class="jumbotron">
  <a class="nav-link active" href="#">
    <h1 class="display-4">HNG</h1>
  </a>
  <p class="lead">
    Find Discounted Hotel Deals Here
  </p>
</div>
</center>
      <div class="container">
<center>
<h5>	  
<?php
$t=time();
echo(date("Y-m-d",$t));
echo("  |  ");
echo date("h:i:sa");
?>
</h5>
<center>
            <hr class="my-4">

            <footer style="margin:30px" class="text-muted">
              <center>
              <div class="container">
                <h3>Exploring the Bigger Picture</h3>
                <p class="float-right">
                  <a href="#">Back to top</a>
                </p>
                <p>We are passionate about what we do daily. And inspire and reach millions of users.</p>
                <p>For Developers <a href="#">Visit our API</a> or read our <a href="#">getting started guide</a>.</p>
              </div>
            </center>
            </footer>
      </div

    </body>
</html>

</body>
</html>