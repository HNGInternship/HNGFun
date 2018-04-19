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
    </header>

  <div class="container" id="container">


<!--Section: interns v.1-->
<section class="section pb-3 text-center">


    <div class="row">

    <?php foreach($data as $list){ ?>

        <!--Grid column-->
        <div class="col-lg-3 col-md-3 mb-4">

            <!--Card-->
            <div class="card testimonial-card" height=300px>

                <!--Background color-->
                <div class="card-up deep-purple lighten-2"></div>
                <div class="card-body">
                <!--Avatar-->
                <div class="avatar mx-auto white"><img style="width: 400px; height: 300px" src="<?= $list['image_filename'] ?>" onerror="this.src='images/default.jpg'" alt="avatar mx-auto white" class="rounded-circle img-fluid"></div>

                    <!--Name-->
                    <h4 class="card-title mt-1"><?= $list['name']?></h4>
                    <hr>
                    <span class="align-middle">
                    <a href="profile.php?id=<?=$list['username']?>">
                      <button class="btn btn-success">View Profile</button>
                    </a>
                  </span>
                </div>

            </div>


      </div>
    <?php } ?>

   </section>
   <!--Section: Testimonials v.1-->


</div>



<?php
include_once("footer.php");
?>
