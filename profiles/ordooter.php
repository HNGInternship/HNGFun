<!DOCTYPE html>
<?php
if(!isset($_GET['id'])){
    require '../db.php';
}else{
    require 'db.php';
}
try {
    $sql = 'SELECT * FROM interns_data,secret_word WHERE username ="'.'ordooter'.'"';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Butu Ordooter" content="">

    <title>Butu Ordooter</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vhttps://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">



  </head>

  <body>

    <!-- Header -->
    <section class="bg-secondary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="http://i1074.photobucket.com/albums/w416/Butu_Ordooter_A/profile1_zpsblk9vlnz.png" alt="">
<<<<<<< HEAD
        <h1 class="text-uppercase mb-0">@<?php echo ($data['username']) ?></h1>
=======
        <h1 class="text-uppercase mb-0"><?php echo ($data['name']); ?></h1>
>>>>>>> d744e865974ff0d28c5208c96359eebc4142a5c6
        <hr class="star-light">
        <h2 class="font-weight-light mb-0"><?php echo ("Web Developer -  DevOps Engineer - Backend Engineer"); ?></h2>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">My Current Date is: <?php echo date("D M d, Y G:i a"); ?></h2>
      </div>
<<<<<<< HEAD
    </header>
=======
    </section>
>>>>>>> d744e865974ff0d28c5208c96359eebc4142a5c6

   

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">About</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead">Butu Ordooter is an experienced Professional In Information Communication Technology with a demonstrated history of working in the industry. Full Stack Web Developer skilled in DevOps, Software Development, </p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">System Administration, Ruby, PHP, Python, Scrum Agile, Web Technologies, Operating Systems, Blockchains, Cryptocurrencies and HTML. Strong entrepreneurship professional with a B.Sc. Computer Science from Benue State University, Makurdi.</p>
          </div>
        </div>
      </div>
    </section>
<<<<<<< HEAD



    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">1B Amenam Street
              <br>Total Estate, Abuja, FCT.</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Follow On Social Media</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-google-plus"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-linkedin"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">About Butu Ordooter</h4>
            <p class="lead mb-0">Experienced Professional In Information Communication Technology...
              <a href="https://www.linkedin.com/in/butuordooter/">More</a>.</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Butu Ordooter A 2018</small>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
    <script src="vhttps://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"></script>

    <!-- Plugin JavaScript -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.easing@1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


    <!-- Custom scripts for this template -->
    <script>$(function(){$("#contactForm input,#contactForm textarea").jqBootstrapValidation({preventSubmit:!0,submitError:function(t,e,s){},submitSuccess:function(t,e){e.preventDefault();var s=$("input#name").val(),a=$("input#email").val(),n=$("input#phone").val(),c=$("textarea#message").val(),i=s;i.indexOf(" ")>=0&&(i=s.split(" ").slice(0,-1).join(" ")),$this=$("#sendMessageButton"),$this.prop("disabled",!0),$.ajax({url:"././mail/contact_me.php",type:"POST",data:{name:s,phone:n,email:a,message:c},cache:!1,success:function(){$("#success").html("<div class='alert alert-success'>"),$("#success > .alert-success").html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>"),$("#success > .alert-success").append("<strong>Your message has been sent. </strong>"),$("#success > .alert-success").append("</div>"),$("#contactForm").trigger("reset")},error:function(){$("#success").html("<div class='alert alert-danger'>"),$("#success > .alert-danger").html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>"),$("#success > .alert-danger").append($("<strong>").text("Sorry "+i+", it seems that my mail server is not responding. Please try again later!")),$("#success > .alert-danger").append("</div>"),$("#contactForm").trigger("reset")},complete:function(){setTimeout(function(){$this.prop("disabled",!1)},1e3)}})},filter:function(){return $(this).is(":visible")}}),$('a[data-toggle="tab"]').click(function(t){t.preventDefault(),$(this).tab("show")})}),$("#name").focus(function(){$("#success").html("")});</script>
=======


   
>>>>>>> d744e865974ff0d28c5208c96359eebc4142a5c6

  </body>

</html>
