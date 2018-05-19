<?php
include_once("header.php");
 function custom_styles() {
     $styles = '<style>footer{margin-top:0!important;padding-top:5;padding-bottom:20px;}</style>';
     echo $styles;
 };

?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron page404">
      <div class="container">
          <section class="content404">
        <h1 class="bigtext">404</h1>
            <img src="img/404.png" alt="404" class="image404">
            <h4>oops the page you are looking for can't be found !</h4>

                <hr>

                <p><a class=" btn-404 btn-lg" href="./index">Go to home </a></p>

          </section>

      </div>
    </div>

<?php
include_once("footer.php");
?>
