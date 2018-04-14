

    <?php include_once('profiles/' . $profile_name. '.php');
    try {
        $secrete = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $secret_word = $sql->fetch();
    } catch (PDOException $error) {

        throw $error;
    }?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">HNG FUN</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../learn.php">Learn</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../listing.php">Interns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../testimonies.php">Testimonies</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Chidimma Juliet Ezekwe
        <small>Wed Developer</small>
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="http://res.cloudinary.com/julietezekwe/image/upload/v1523620041/juliet.jpg" alt="juliet">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Description</h3>
          <p>An Innovative web deveploper inter at HngInternship<sup>4</sup></p>
          <h3 class="my-3">Details</h3>
          <ul>
            <li>Creative</li>
            <li>Innovative</li>
            <li>Team player</li>
            <li>Result oriented and time conscious</li>
          </ul>
        </div>

      </div>
      <!-- /.row -->

    

    </div>
    <!-- /.container -->



    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/hng.min.js"></script>

  </body>

</html>
