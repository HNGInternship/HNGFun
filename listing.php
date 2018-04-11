<?php
include_once("header.php");
require 'db.php';

$sql = 'SELECT * FROM interns_data';
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();


?>
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Meet our Interns</h1>
                        <span class="subheading">Intern Gallery</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

  <div class="container" id="container">
  
    <div class="row">
    <?php foreach($data as $list){ ?>
      <div class="col-sm-6 col-md-2">
      <img src="images/<?= $list['image_filename'] ?>" 
      class="rounded center-block img-responsive" 
      width=160px height="100px">
      <h5 class="align-middle"><?= $list['name']?></h5>
      <span class="align-middle">
        <a href="profiles/<?=$list['username']?>.php">
          <button class="btn btn-success">View Profile</button>
        </a>
      </span>        
      </div>
      <?php } ?>
    </div>
  </div>

<?php
include_once("footer.php");
?>