<?php 
error_reporting(0);
if(empty(conn)){
    include("..db/php");
}
$servername = "DB_HOST";
$username = "DB_USERNAME";
$password = "DB_PASSWORD":
// CREATE CONNECTION
$conn = new mysqli($servername, $username, $password);

//check connection
if ($conn->connect_error){
    die("connection failed:" .$conn->conn_error);
}
$sql = "SELECT name, username, image_filename FROM intern_data where username = 'udimmanny'";
$result = $conn->query($sql);
<<<<<<< HEAD
$sql = "SELECT secret_word FROM secret_word";
$secret_word = $conn->query($sql)
=======
$secret_word = "SELECT secret_word FROM secret_word";
>>>>>>> Update profile
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <title>Udim Manny| HNG intern</title>
    <style>




body{
font-size:16px;
font-family: 'Roboto';
width:100%}

#hero{height: 700px;
background: linear-gradient(
    rgba(0,0,0,0.7),rgba(0,0,0,0.8) ),
    url("https://res.cloudinary.com/eacademy/image/upload/v1523653635/web-developer.jpg");
background-size: cover;
background-position: center;
background-attachment: fixed;
width: 100%;
position: relative}


.btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
    border-radius: 25px;
}


.btn-info:hover {
    color: #17a2b8;
    background-color: #fff;
    border-color: #17a2b8;
    cursor:pointer;
}




h1{color:#fff;
 padding-top: 300px;   
font-size: 5vw;
line-height:1.1 ;}

.name{color: #fff;}
.name2{color:#DC143C;}

/*Navbar styling starts here*/





.progress-bar{
    line-height:30px;
}


   
.shadow{box-shadow: #f8f8f8 5px 5px;
border: 1px solid whitesmoke;}
    

p.space{font-size:22px;
color:#524e4d;
padding-bottom: 80px;}
p#about{color:#888;
}

p.space2{font-size:22px;
    color:#524e4d;
    }

    p#about{color:#888;
    }
.end{background-color:#dc0000; width:120px;
    padding-left:0px}
    .end2{background-color:#dc0000; width:120px;
        padding-left:0px}

/* Progress Bar Starts*/
        .progress {
            position: relative;
            height: 25px;
            margin-bottom: 12px;
            color: #DC143C;
        }
        .progress > .progress-type {
            position: absolute;
            left: 0px;
            font-weight: 800;
            padding: 3px 30px 2px 10px;
            color: rgb(255, 255, 255);
            background-color: rgba(25, 25, 25, 0.2);
            width: 120px;
        }
        .progress > .progress-completed {
            position: absolute;
            right: 0px;
            font-weight: 600;
            padding: 3px 10px 2px;
            
        }
        .progress-bar{background-color: #DC143C;}
/* Progress Bar Starts*/





h2{font-weight: 800;}

#about{padding: 50px 50px;
background-color: #fdfdfd;
animation: fadeInLeft 2s;}

#skills{padding: 10px 0px 50px;
    background-color: #fdfdfd;

}


footer{background-image: url(https://res.cloudinary.com/eacademy/image/upload/v1523653737/footer.jpg);
    color: #ffffff;
    padding-top: 30px;
    
    }

      a{text-decoration: none;
        color: white;
        
    }

    a:hover {text-decoration: none;
        color: white;}

    li{display: inline-block;}

    

   .footer-social i.fa {
        display: inline-block;
        border-radius: 50%;
        box-shadow: 0px 0px 2px #888;
        padding: 0.5em 0.6em;
        color:#fff
      
      }
/* Footer starts here */
      .footer-social i.fa:hover{color:grey;}

      .fa-facebook{background-color:#3B5998 }
      .fa-twitter{background-color:#1DA1F2 }
      .fa-linkedin{background-color:#0077B5 }
      .fa-github{background-color:#bd2c00 }

     


      

    .fine{box-shadow: #8af0d1 2px 2px;
        border: 1px solid whitesmoke;
        border-radius: 15px;}
   </style>

</head>
<body>
<section id="hero">
        <div class="container text-center">
                <div class="row">
                        <div class="col-sm-6">
                            
                           
                           
                            
                        </div>
                         <div class="col-sm-6"> 
                        
</div>
                    </div>
        

            <h1 class="name">Hi, I'm <span class="name2">Udim Manny.<span><br>
                <a href="" class="typewrite name" data-period="2000" data-type='["I am a web developer.","This task punished me.", 
                "I did it four times...","I humbled...", "And saw what few saw.", "Thank you Mark."]'>
                    <span class="wrap"></span></a>
                </h1><br>
               <a href="http://manny.techno-dombai.com.ng"><button class="btn btn-info fixed">I'm available for hire</button></a>
               
               </div>
          
            </section>

        <!-- About section starts here -->
		<section id="about">
            <div class="container">
                <div class="row">
                <div class="col-sm-12 text-center">
			<h2>What I do!</h2>
			<p><em>I have a varied array of skills that create value.</em></p></div></div>
            

  <div class="row text-center">
  <div class="col-sm-4">
<i style="color:#DC143C;font-size:90px;" class="fa fa-diamond"></i>
    <h2><em>Ideation</em></h2>
                        <p><em>Ford said "thinking is the hardest job". I think through plans. Ideate. Build.  And ship.
                            Ensuring your brand stays on top of its game!</em></p></div>
        <div class="col-sm-4"> 
            <i style="font-size:90px;color:#DC143C;" class="fa fa-code"></i>
            <h2><em>Coding</em></h2>
                    <p><em>After thinking through,the harder part is building and 
                        implementing.This is what I was born for! We make the transition seamless and pleasant.</em></p></div>
        <div class="col-sm-4"> 
           <i style="font-size:90px;color:#DC143C;" class="fa fa-fighter-jet"></i>
            <h2><em>Shipping</em></h2>
                        <p><em>No great product was ever built and shipped first time out,
                            I revise, improve, iterate and ship fast. Making sure your brand stays on top</em></p></div>
         </div></div>
</section> 

<section id="skills" class="">
    <div class="container"> 
<div class="row skillset ">
        <div class="col-sm-5">
                <div class="text-center">
<img class"fine" src="https://res.cloudinary.com/eacademy/image/upload/v1523624108/manny.jpg" width="80%" style= "border-radius:50%;">
<h2 class="text-center">Who am I?</h2>
<p>Hi, my name is Udim Manny, I'm a Mechie with a passion for building pixel perfect web apps,
I love all things STEM. I currently work as a freelancer.
</p></div>
        </div>
        <div class="col-sm-7" style="padding-top: 60px;">
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar"  style="width: 80%">
                    <span class="sr-only">90% Complete (danger)</span>
                </div>
                <span class="progress-type end">HTML</span>
                <span class="progress-completed hidden-sm"></span>
            </div>  
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                    <span class="sr-only">80% Complete (danger)</span>
                </div>
                <span class="progress-type">CSS</span>
                <span class="progress-completed"></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                    <span class="sr-only">80% Complete (danger)</span>
                </div>
                <span class="progress-type">Bootstrap</span>
                <span class="progress-completed"></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">80% Complete (danger)</span>
                </div>
                <span class="progress-type">JavaScript</span>
                <span class="progress-completed"></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                    <span class="sr-only">60% Complete (danger)</span>
                </div>
                <span class="progress-type">Jquery</span>
                <span class="progress-completed"></span>
            </div> 
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">80% Complete (danger)</span>
                </div>
                <span class="progress-type">React</span>
                <span class="progress-completed"></span>
            </div> 
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">80% Complete (danger)</span>
                </div>
                <span class="progress-type">Node.Js</span>
                <span class="progress-completed"></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">80% Complete (danger)</span>
                </div>
                <span class="progress-type">Figma</span>
                <span class="progress-completed"></span>
            </div>   

            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" 
                aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                    <span class="sr-only">80% Complete (danger)</span>
                </div>
                <span class="progress-type">PHP/MySQL</span>
                <span class="progress-completed"></span>
            </div>
            
            
              </div>
            </div>
            </div>
            </section>
            <footer>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                  <a href="#hero"><h2 class="name2">UDO</h2></a>
                        <p>&copy Manny 2018</p>
                        <p><span class="fa fa-envelope"></span> manassehudim(at)gmail.com</p> 
                        <ul class="footer-social">
                            <li><a href="http://www.twitter.com/udimobong" target="_blank"><i class="fa fa-twitter " title="Twitter" ></i></a></li>
                            <li><a href="http://www.facebook.com/manassehv" target="_blank"><i  class="fa fa-facebook" title="Facebook"></i></a></li>
                            <li><a href="http://www.linkedin.com/udimmanny" target="_blank"><i class="fa fa-linkedin" title="Linkedin"></i></a></li>
                            <li><a href="http://github.com/UdimManny" target="_blank"><i class="fa fa-github " title="GitHub"></i></a></li>
                        </ul>
        </div>
    </div>
    </div>
    </footer>
            <script>var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 6);
    } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
    }

    setTimeout(function() {
    that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }

};   </script>
 
</body>
<script src="../vendor/jquery/jquery.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</html>