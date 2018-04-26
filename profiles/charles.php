<?php 

$item1 = $conn->query("SELECT * FROM secret_word LIMIT 1");
$item1 = $item1->fetch(PDO::FETCH_OBJ);
$secret_word = $item1->secret_word;

$item2 = $conn->query("SELECT * FROM interns_data where username = 'Charles'");
$user = $item2->fetch(PDO::FETCH_ASSOC);

$username = $user['username'];
$name = $user['name'];
$image_filename = $user['image_filename'];
?>


<!DOCTYPE html>
<html>
<head>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

</head>
<body>

    <div class="container">
    <div class="span3 well">
        <center>
        <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="<?php echo $image_filename; ?>" name="aboutme" width="140" height="140" class="img-circle"></a>
        <h3> <?php echo $name ; ?> </h3>
        <em>click on my avatar to learn more</em>

        <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
               <li class="list-inline-item">
                  <a id="twitter" href="https://twitter.com/charlesuko?lang=en" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x" style="color: #2ECC71;"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a id="facebook" href="https://www.facebook.com/charles.uko.18" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x" style="color: #2ECC71;"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse" ></i>
                     </span>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a id="github" href="https://github.com/charlesuko" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x" style="color: #2ECC71;"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                     </span>
                  </a>
               </li>
    
            </ul>
         </div>
      </div>
   </div>
        </center>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">More About <?php echo $username ?></h4>
                    </div>
                <div class="modal-body">
                    <center>
                    <img src="<?php echo $image_filename; ?>" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading"><?php echo $name ; ?> <small>NIGERIA</small></h3>
                    <span><strong>Skills: </strong></span>
                        <span class="label label-warning">HTML5/CSS</span>
                        <span class="label label-info">Adobe photoshop</span>
                        <span class="label label-info">PHP 7</span>
                        <span class="label label-info">Microsoft Office</span>
                        <span class="label label-success">Windows 10, LINUX</span>
                    </center>
                    <hr>
                    <center>
                    <p class="text-left"><strong>Bio: </strong><br>
                        Engineer from AkwaIbom state, Nigeria. Interested in technology and photography</p>
                    <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">I've learnt enough about <?php echo $username ?></button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>



