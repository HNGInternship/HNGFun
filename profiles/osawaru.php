
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!--Font -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Playball" rel="stylesheet">

<style>
    #projects {
        background-image: url(" http://res.cloudinary.com/osawaru/image/upload/v1523637993/bg-img.jpg");
    }

    body {
        background-color: black;
    }

    h4 {
        background-color: rgba(10, 67, 83, 0.658);
        padding: 20px;
    }
    #projects h1 {
        margin: 10px 300px;
        padding: 5px;
        background-color: rgba(4, 13, 15, 0.658);
        text-decoration: underline;
    }
    #carouselExampleControls  img {
      margin-left: 38%; 
    }
</style>
<title>Osawaru Oyelade Efe-osa</title>
</head>

<body>

<?php
$sql = "SELECT * FROM secret_word";
$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query->fetch();
$secret_word = $result['secret_word'];

try {
    $sql2 = 'SELECT name,username,image_filename FROM interns_data WHERE username="osawaru"';
    $q2 = $conn->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $mydata = $q2->fetch();
} catch (PDOException $e) {
    throw $e;
}

?>


    <div class="containter text-white text-center">
        <p class="mt-5 text-danger" style="font-stretch: expanded; font-family: 'Playball',cursive; font-size:40px">Meet</p>
        <h1 class="font-weight-bold" style="font-family: 'Source Sans Pro', sans-serif;">
            <u><?php
            echo $mydata["name"];
            ?></u>
        </h1>
        <img src="<?php
            echo $mydata["image_filename"];
            ?>"
            class="img-fluid img-thumbnail rounded-circle mx-auto w-25 h-25" alt="Osawaru Efe">
        <h3 class="mt-5">I am a Full stack Developer as well as a digital designer</h3>
        <h6>
            <i class="fa fa-street-view mr-2"></i>Abuja | NG </h6>
    </div>
    <div id="projects">
        <div class="container-fluid text-center text-white">

            <h1 class="mt-5 text-center">PROJECTS</h1>
            <h4 class="mt-4">MY DESIGNS</h4>
            <div id="carouselExampleControls" class="carousel slide text-center" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-25 img-responsive" src="http://res.cloudinary.com/osawaru/image/upload/v1523632003/Hello_October.png" 
                            alt="Elitebox's rowbox class">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-25 img-responsive" src="http://res.cloudinary.com/osawaru/image/upload/v1523635397/SNF.png"
                            alt="Saturday Night Fights">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-25 img-responsive" src="http://res.cloudinary.com/osawaru/image/upload/c_crop,h_547,w_843/v1523638112/Screenshot_18.png"
                         alt="DevPlug">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-50 img-responsive" src="http://res.cloudinary.com/osawaru/image/upload/v1523631934/Flyer.png"
                            alt="Gift Voucher" style="margin-left:30%;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <h4 class="mt-4 mb-4 webprojects">WEB</h4>
            <div class="row">
                <div class="col-sm-6 ">
                    <img src="http://res.cloudinary.com/osawaru/image/upload/v1523634896/Screenshot_9.png" class=" img-responsive w-75 mb-3"
                        alt="HNG challenge">
                </div>
                <div class="col-sm-6">
                    <img src="http://res.cloudinary.com/osawaru/image/upload/c_scale,w_1091/v1523634906/Screenshot_16.png" class="img-responsive w-75 mb-3"
                        alt="Address Book">
                </div>
            </div>

        </div>
    </div>
    <p class="text-center mt-3" style="color:white; font-size: 18px">Connect With Me
        <br>
        <span style="color: white; font-size: 30px">
        <a href="https://twitter.com/Jessy9507">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://github.com/jessye95?tab=stars">
                <i class="fa fa-github ml-2"></i>
            </a>
            <a href="https://www.linkedin.com/in/efe-osa-oyelade-4aa82a5b/">
                <i class="fa fa-linkedin ml-2"></i>
            </a>
            <a href="mail to:jessye95@gmail.com">
                <i class="fa fa-envelope ml-2"></i>
            </a>
        </span>
    </p>
</body>

</html>