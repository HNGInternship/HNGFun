<?php
try {

    $sql ="SELECT * FROM interns_data WHERE username = 'victorUgwueze' LIMIT 1";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $intern_data['name']; ?></title>

    <style>
        *{
	margin: 0;
	padding: 0;
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
	-webkit-box-sizing: border-box;
  	-moz-box-sizing: border-box;
	box-sizing: border-box;
}



html{
	color: #555;
	font-family: 'lato', 'Arial', 'sans-serif';
	font-weight: 300;
	font-size: 18px;
	text-rendering:optimizeLegibility;
}


body{
 	margin: 0;
	padding: 0;
}

h1,h2{
	margin: 0;
	letter-spacing: 1px;
	font-weight: 300;
	text-transform: uppercase;

}

h1{
	margin-top: 0;
	margin-bottom: 20px;
	font-size: 240%;
	word-spacing: 4px;

}

h2{
	font-size: 100%;
	word-spacing: 2px;
	text-align: center;
	margin: 10px auto;
	margin-bottom: 30px;

}
h3{
	font-size: 150%;
	word-spacing: 2px;
	margin-bottom: 20px;
}

.wrap{
    width: 480px;
    margin: 0 auto;
    margin-top: 100px;
    text-align: center;
    box-shadow: 7px 10px 34px 1px rgba(0, 0, 0, 0.68), inset -1px -6px 5px 0.1px #000;
}

.img img{
    height :200px;
    border-radius: 50%;
}
.contact{
    width:50%;
    margin: 0 auto; 
}
.contact .contact-link{
    display: flex;
    justify-content: space-around;
    padding-bottom: 20px;
}
.bot{
    height:400px;
    width:300px;
    background:white;
    position: fixed;
    right:0;
    bottom:0;
    /* border-radius:4%; */
    border: 1px solid gray;
    margin-right:3%;   
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
  border-radius:4%;
   
}
.minimize-bot{
    position:absolute;
    right:2%;
    font-weight:180%;
}
.panel-body p{
    overflow:scroll;
}
  </style>

    <script>
    
    </script>

</head>
<body>
    <div class="wrap">
        <div class="img">
            <img src="<?php echo $intern_data['image_filename']; ?>" alt="Victor Ugwueze Profile Image">
        </div>
        <div class="username">
            <h2><?php echo $intern_data['name']; ?></h2>
            <h5>Software Developer</h5>
        </div>
        <div class="contact">
            <h3>Get In Touch With Me</h3>
            <p>Want to get in touch with me? Be it to request more info about myself or my
                experience, to ask for my resume, or even if only for some nice coffe here in Lagos, 
                Nigeria... just feel free to drop me a line anytime.
                I promise to reply A.S.A.P.
            </p>
            <div class="contact-link">
                <div>
                    <a  href="https://github.com/Victor-Ugwueze" target="_blank">
                    <i class="fa fa-github-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
                <div>
                    <a  href="https://www.facebook.com/victor.c.ugwueze" target="_blank">
                    <i class="fa fa-facebook-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
                <div>
                    <a  href="https://twitter.com/CVicchigo" target="_blank">
                    <i class="fa fa-twitter-square fa-lg icon_up_link" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="bot panel panel-default">
            <div class="panel-heading top-bar">Panel 
                <span class="minimize-bot">-</span>
            </div>
            <div class="panel-body">
            
                <p>is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                when an unknown printer took a galley of type and scrambled it to make a type
                 specimen book. It has survived not only five centuries, but also the leap into e
                 lectronic typesetting, remaining essentially unchanged. It was popularised in 
                 the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                 and more recently with desktop publishing software like Aldus PageMaker including 
                 versions of Lorem Ipsum.

                Why do we use it?
                It is a long established fact that a 
                reader will be distracted by the readable content of a 
                page when looking at its layout. The point of using Lorem Ipsum is that
                 it has a more-or-less normal distribution of letters, as opposed to using 
                 'Content here, content here', making it look like readable English. Many desktop 
                 publishing packages and web page editors now use Lorem Ipsum as their default model 
                 text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. 
                 Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                  (injected humour and the like).


                ntrary to popular belief, Lorem Ipsum is not simply random text. 
                It has roots in a piece of classical Latin literature from 45 BC, making it
                over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney C
                ollege in Virginia, looked up one of the more obscure Latin words, consectetur, fr
                
                om a Lorem Ipsum passage, and going through the cites of the word in classical lit
                erature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 a
                itten in 45 BC. This book is a treatise on the theory of ethics, very popular during the Re
                naissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line
                 in section 1.10.32.</p>
            </div>
            <div class="input">
            <form action="" class="form-inline">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="type your message">
                        <div class="input-group-append">
                            <div class="input-group-text btn-primary"><a href="#" class="">Send</a></div>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>