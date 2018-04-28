  <?php
//  require '../db.php';

    try {
      // $profile = 'SELECT * FROM interns_data_ WHERE username="bella"';
        $select = 'SELECT * FROM secret_word';

        $query = $conn->query($select);
      //  $profile_query = $conn->query($profile);

        $query->setFetchMode(PDO::FETCH_ASSOC);
       // $profile_query->setFetchMode(PDO::FETCH_ASSOC);

        $get = $query->fetch();
       // $user = $profile_query->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $get['secret_word'];
?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
   <!--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- Custom CSS --> -->

     <style> 
          body{
    background-color: #2F80ED;
    font-family: Lato;
    margin-top: 2%;
}

.mlo{
    margin-left:27%;
}

.mro{
    margin-right: 10%;
}

img{
    border-radius: 50%;
    width: 200px;
    height: 200px;
    margin-left: 7%;
}
.name{
    font-size: 24px;
    font-weight: bold;
}
.p1{
    font-size: 15px;
    margin-left:7%;
}

.p2{
    line-height: 2px;
    margin-left: 30%;
}

li{
    list-style-type: none;
    display: initial;
    font-size: 24px;
    margin-left: 5%;
    
}

.social{
    margin-top: 10%;
    margin-left: 12%;
}

.lol{
    margin-top: -37%;
    padding-top: 0;
    height: 500px;
  
}

.hr_1{
    width: 100%;
    height: 5px;
}
.card-subtitle{
    font-weight: bold;
    font-size: 20px;
    letter-spacing: 5%;
}

.not{
    margin-top: 25%;
} 
     </style>
</head>

<div id="body">
      <div class="container mt-5">
        <div class="col-md-6 mlo">
            <div class="card" style="width: 48rem;">
                <div class="card-body">
                  <div class="container">
                      <img src="https://scontent.flos3-1.fna.fbcdn.net/v/t1.0-9/30742158_2512542218971646_4577195154707841024_n.jpg?_nc_cat=0&_nc_eui2=v1%3AAeFqdTUFroJuI7UBQ-WICOlDNOUC3mb4ERpzpdHByNZuF2FqNQe8vu0HyxeQVpn4KKhhsvN2MYvQ0GTNLBDaAhUPALugkX7dcGLCf83wMTPYng&oh=5ace9375419695f419af88f558c916ae&oe=5B548B56" alt="">
                       <div class="row">
                          <div class="col-md-6">
                             <h2 class="name mt-3 text-center">MFONOBONG UMONDIA</h2>
                             <p class="p1 mt-3 text-center">Android Developer, UI/UX Designer</p>
                             <p class=" p2">& Technical Writer</p>

                             <ul class="social">
                               <li><i class="fa fa-twitter"></i></li>
                               <li><i class="fa fa-facebook-square ml-3"></i></li>
                               <li><i class="fa fa-instagram ml-3"></i></li>
                             </ul>

                             <p class="text-center">Email ID : Umondiamfonobong@gmail.com</p>
                             <p class="text-center">Contact : +2348146498258</p>
                          </div>

                          <div class="col-md-6 lol">
                              <div class="border-left-2 border-top-0 border-right-0 border-bottom-0" style="width: 18rem; border-left: 1px solid black;">
                                  <div class="card-body">
                                      <div class="not">
                                          <hr class="hr_1">
                                          <h6 class="card-subtitle mb-2 text-bold">DESCRIPTION</h6>
                                          <p class="card-text">Currently I'm working at Hotels.ng as a Software Development Intern</p>
                                        </div>
                                          <div class="not">
                                            <hr class="hr_1">
                                            <h6 class="card-subtitle mb-2 text-bold">SOFTWARE</h6>
                                            <p class="card-text">Android Studio, Figma, Medium ,<br>Steem, Eclipse</p>
                                          </div>

                                          <div class="not">
                                              <hr class="hr_1">
                                              <h6 class="card-subtitle mb-2 text-bold">SHARE</h6>
                                              <ul class="">
                                                  <li><i class="fa fa-twitter"></i></li>
                                                  <li><i class="fa fa-facebook-square ml-3"></i></li>
                                                  <li><i class="fa fa-instagram ml-3"></i></li>
                                                </ul>
                                            </div>
                                  </div>
                                </div>
                          </div>
                          



                  </div>
                </div>
                </div>
              </div>
           
        </div>
      </div>
</div>
<!-- Bootstrap JS,Jquery and PopperJS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
