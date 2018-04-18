<?php 
  try {

    $sql ="Select * from interns_data where username = 'Waju'";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $intern_data = $q->fetch();
  

    //query for the secret word;
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
// Set the secret word
    $secret_word = $data['secret_word'];


} catch (PDOException $e) {

    throw $e;
}


?>

<style>
    .main-wrapper{
        margin-top: 100px;
        opacity:0;
        animation: fadeIn 3s 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    .left-pane {
        margin-right: 40px;
        /* margin-bottom: 50px; */
        height:80vh;
    }
    .img-wrap{
    border: 5px solid white;
    border-radius: 50%;
    overflow: hidden;
    height: 350px;
    width: 350px;
    box-shadow: 0px 5px 20px 5px rgba(0,0,0,0.234);
    }
    img{
        width: 100%;
        height: auto;
        object-fit:cover;
    }
    h4.name{
        margin-top: 30px;
        margin-bottom:2px;
        line-height: 1.5;
        opacity:0;
        transform: translateY(30px);
        animation: slideInUp 2s 3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    h4.name span{
        font-size: 20px;
    }
    h4.name span.seperator{
        color: rgba(0,0,0,0.678);
        font-size: 24px;
        font-weight: normal;
    }
    hr{
    border-top: 5px solid rgba(0,0,0,.456);
    }
    h2.heading,
    h4.name span{
        color:#007BFF;
    }
    
    /* Tweak the progressbar component */
    .progress{
        margin-top: 15px;
        height: 30px;
    }
    .progress-bar.bg-info{
        background: rgb(103, 174, 188) !important;
    }
    .progress-bar.bg-success{
        background:  rgb(146, 191, 143) !important;
    }
    .progress-bar.bg-danger{
        background:  rgb(206, 121, 124) !important;
    }
   /* And some magic */
   @keyframes slideInUp {
    from{
        opacity: 0;
        transform: translateY(30px);
    }
    to{
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes fadeIn {
    from{
        opacity: 0;

    }
    to{
        opacity: 1;
    }
}


    /* Going by mobile first, these get applied at larger screen sizes onlys */
@media (min-width:700px){
    .left-pane{
        height:auto;
    }
    h2.heading{
        color:#007BFF;
        text-align:right;
    }
    .my-skillset{
        margin-top: 35px;
    }
    .right-pane{
        position:relative;
    }
    .right-pane:before{
        display:inline-block;
        content:"";
        background:rgba(0,0,0,0.456);
        width:1px;
        height:70%;
        position: absolute;
        left:-15px;
        top: 15%;
    }
}

</style>


    <!-- bootstrap is mobile first so mf-row must come before flex-column -->
    <div class="d-flex flex-md-row flex-column mb-3 main-wrapper">

        <div class="p-2 left-pane align-self-center flex-grow-0 flex-md-grow-5">
            <div class="img-wrap">
                <img src="<?=$intern_data['image_filename']; ?>" alt="waju">
            </div> 
            <h4 class="name text-center"><?=$intern_data['name']; ?><br>
                <span><?="@".$intern_data['username']; ?><span class="seperator"> | </span>Fullstack Developer</span>
            </h4>
            <ul class="list-inline">
            </ul>
        </div>
        <!-- /.left-pane -->
            
            <hr class="hide-lg">


        <div class="d-flex flex-column p-2 right-pane flex-grow-0 flex-md-grow-7">
            <div class="meet-me">
                <h2 class="heading">Meet Me!</h2>
                
                <p>
                    Hi! I am Olanrewaju, a Fullstack Developer and technology enthusiast. I love clean design and I love beautiful expressive code.                     I build Websites with vanilla PHP( using a custom framework), WordPress and good 'ol Javascript.
                </p>
                <p>
                    As a trained Project Manager I particulary enjoy setting up projects - drawing up plans, wireframes, user stories and the works. 
                </p>
            </div>
            <!-- /.meet-me -->

            <hr class="hide-lg">

            <div class="my-skillset">
                <h2 class="heading">My Skillset</h2>
                
                <div class="progress"  >
                   <span class="skill-logo php"></span> <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                    PHP</div>
                </div>
                 <!-- /.php -->
                
                <div class="progress" >
                    <span class="skill-logo js"></span><div class="progress-bar bg-success " role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                     Javascript</div>
                </div>
                <!-- /.JS -->
                
                <div class="progress" >
                    <span class="skill-logo css"></span> <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">CSS3</div>
                </div>
                <!-- /.css -->
                
                <div class="progress" >
                    <span class="skill-logo vue"></span> <div class="progress-bar bg-danger " role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">VueJs</div>
                </div>
                <!-- /vue -->
                
                <div class="progress" >
                    <span class="skill-logo wp"></span> <div class="progress-bar  bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">WordPress Dev.</div>
                </div>
                <!-- /WordPress Dev-->
                
                <div class="progress" >
                    <span class="skill-logo git"></span> <div class="progress-bar bg-success " role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Git</div>
                </div>
                <!-- /git -->

                <div class="progress" >
                    <span class="skill-logo devops"></span> <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">DevOps</div>
                </div>
                <!-- /DevOps -->

            </div>
            <!-- ./my-skillset -->

        </div>
            <!-- /.right-pane -->
    </div>
    <!-- /.main-wrapper -->
