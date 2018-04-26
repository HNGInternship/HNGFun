   <!DOCTYPE html>
<html>
    <head>
	<?php 
		require 'db.php';

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'olawalle'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Olawalle's</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- jQuery Plugins -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>        
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <style type="text/css">
        *{
   font-family: 'Montserrat', sans-serif;
}
body{
    width: 100%;
    margin: 0;
    height:100%;
    overflow: hidden;
}

.me{
    width: 100%;
    height:100%;
    margin-top: -30px;
   z-index: 2;
}
.me img{
    position: absolute;
    top:-30px;
    left: 0;
    height: 140%;
}
.loo img{
  display: none
}
.top-text{
    position: absolute;
    top:20px;
    left:20px;
    font-weight:600; 
    color: #000;
    z-index: 19;
    font-size: 35px;
    font-family:'Courier New', Courier, monospace
}

.wrapper{
   z-index: 9;
   height: 800px;
   background-color: #000024;
   transition: all 1.0s linear;
}

.text{
     z-index: 9;
    margin-top: 0px
}
.text  p{
    color: rgb(228, 226, 220);
     font-size:17px ;
     font-weight: 100;
     z-index: 9;
     padding: 50px;
     line-height: 35px
     }
  .story{
    margin-top: 150px
  }
 .tint{
     color: rgb(185, 159, 44);
 }  
 #demo{
     margin-top: 50px
 }   
    
 .innerText{
    margin-top: -100px
    }
.links{
    position: absolute;
    top: 10px;
    left:85%;
    z-index: 20;
    padding-right: 30px;
    padding-top: 10px
}

.links a{
    font-size:25px; 
    margin-left: 15px;
    color: rgb(185, 159, 44);
    transform-style: preserve-3d;
  transition: all 0.5s linear;
}
.links a:hover {
    transform: rotateX(180deg);
    font-size:30px;
    color: #fff;
}

.face {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}
.face.back {
  display: block;
  transform: rotateY(180deg);
  box-sizing: border-box;
  color: white;
  text-align: center;
}
/*.top-btn{
    position: absolute;
    top: 50%;
    border: 1px solid rgb(185, 159, 44);
    padding:15px;
    background-color: #fff;
    border-radius: 100px;
    right: 10%
 }
 .top-btn  p{
    color: rgb(185, 159, 44);
     font-family: 'Raleway', sans-serif;
     font-size:20px ;
     z-index: 9;
     }
     
.dropdown-content2 {
    display: none;
    position: absolute;
    color:rgb(114, 111, 111);
    font-size: 15px;
    top: 30px;
    margin-top: 30px;
    width: 252px;
    background-color: rgb(211, 204, 204);
    border: 2px soid #000;
    border-radius:5px;
    z-index: 1;
    border: 2px solid #fff;
}
 .dropdown-content2 a {
    color: black;
    padding: 12px 16px;
    margin-left: 20px;
    text-decoration: none;
    display: block;
}

 .dropdown:hover .dropdown-content2 {
    display: block;
}
*/
 @media only screen and (max-width: 967px){

    body{
        overflow: hidden;
    }
    .top-text{
    position: absolute;
    top:20px;
    left:20px;
    font-weight:500; 
    color: #000;
    z-index: 19;
    font-size: 25px;
    font-family:'Courier New', Courier, monospace
   }
   .loo img{
    display: block;
    width: 82px;
    position: absolute;;
    top: 0px;
    right: 0px
   }
.links{
    position: absolute;
    top: 580px;
    left:55%;
    z-index: 20;
}
.links a{
    font-size:15px; 
    margin-left: 20px;
    color: rgb(185, 159, 44);
    transform-style: preserve-3d;
  transition: all 0.5s linear;
}

.wrapper{
   z-index: 9;
   height: 800px;
   margin-top: 15px;
   background-color: #000024;
  }
 .face img{
    display: none
    
     }
 
.text{
     z-index: 9;
    margin-top: 0px
}
.text  p{
     font-size:16px ;
     font-weight: 300px;
     z-index: 9;
     padding: 50px;
     color: #9b9b9b;
     text-align: left;
     }
  .story{
    margin-top: 80px;
  }
 .tint{
     color: rgb(185, 159, 44);
 }  
 #demo{
     margin-top: 50px
 }   
    
 .innerText{
    margin-top: -100px
    }
 }


    </style>
   </head>
    <body onload="typeWriter()">
	        <nav>
            <span class="top-text">Olawalle</span>
                <div class="links">
                    <a href="https://www.behance.net/olawalle94c375"><i class="fa fa-behance"></i></a>
                    <a href="https://github.com/olawalle/"><i class="fa fa-github"></i></a>
                    <a href="https://www.twitter.com/im_whaley"><i class="fa fa-twitter"></i></a>             
                </div>
        </nav>
        <div class="col-md-6 col-md-order-1">
                 <div id="f1_container">
                    <div id="f1_card" class="shadow">
                      <div class="front face">
                        <img src="https://image.ibb.co/fkMC7S/meee.jpg" alt="meee" border="0"/>
                      </div>
                    </div>
                 </div>
            </div> 
         <div class="col-md-6 wrapper col-md-order-2"> 
             <div class="story "> 
                <div class="text">
                    <p id="demo"> </p>
                    <p class="innerText"> I design cool user interfaces and I code .
                    I am proficient with <span>HTML5</span>, <span>CSS3</span>, <span>Bootstrap</span>, <span>javascript</span>, <span>JQuery</span> and <span>Angular4</span> .<br>
                    I love <span class="tint">artworks</span>, <span class="tint">movies</span>  , <span class="tint">puzzles </span>& <span class="tint"> music </span><br>
                    if you want to know more,<i class="em em-call_me_hand"></i><br>
					<?php echo $user->username ?>                    </p>
					
                </div>
                </div>  
            </div>  
    
    <script>
    var i = 0;
    var txt = 'My name is Ariyo Olawale.</>' ;
    

    function typeWriter() {
      if (i < txt.length) {
        document.getElementById("demo").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, 120);
      }
    }
    </script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
