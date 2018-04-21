<?php
// $conn = mysqli_connect("", "us", "", "hngfun");
$username = "chuckbass";
if(!defined('DB_USER')){
    require_once(__DIR__ . '/../config.example.php');
};
    try {
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("select secret_word from secret_word limit 1");
        $stmt->execute();

        $secret_word = null;

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        if(count($rows)>0){
            $row = $rows[0];
            $secret_word = $row['secret_word']; 
        }

        $name = null;
        $username = "chuckbass";
        $image_filename = null;

        $stmt = $conn->prepare("select * from interns_data where username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        if(count($rows)>0){
            $row = $rows[0];
            $name = $row['name'];   
            $image_filename = $row['image_filename'];   
        }

    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>chuckbass's angle</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); background-color: #ffffff; color: #0000ff }
        .clear { clear: both; }
        #page-wrap { width: 100%; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; height: 100px; width: 100px; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 60%; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 20%; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 60%; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
        /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}
     </style>
</head>

<body>

    <div id="page-wrap">
    
        <img src="<?php echo $image_filename; ?>" class="responsive" alt="Profile Picture" id="pic" />
    
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 id="fn" class="desc"><?php echo $name; ?> </h1>
        
            <p>User Name: chuckbass <br />
                Cell: <span class="tel">+2348088100679</span><br />
                Email: <a class="email" href="mailto:eddyrich1990@gmail.com">eddyrich1990@gmail.com</a>
            </p>
        </div>
                
        <div id="objective">
            <p>
                I am an Accountant by profession, a programming enthusiast by hobby, and a buildeer by nature. I seek to create software and web platforms that will help solve financial related issues especially in small and medium scale enterprises.
            </p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
                <h2>University of Uyo - Uyo, Akwa Ibom state, Nigeria.</h2>
                <p><strong>Major:</strong> Accounting <br /></p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                <h2>Office skills</h2>
                <p>Office and records management, database administration. </p>
                
                <h2>Computer skills</h2>
                <p>HTML, Css, Javascript, Microsoft productivity software (Word, Excel, outlook etc), Sage 50 Accounting</p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Experience</dt>
            <dd>
                <h2>Grab and Munch limited(Suntory)<span>Accountant-2017-date </span></h2>
                <ul>
                    <li>Advisory capacity to Mangement</li>
                    <li>Producing an accurate set of month-end accounts, with comparisons to forecasts 
                                   and previous periods
</li>
                    <li>Reconciling Bank Statements and keeping careful eye on cash flow

</li>
                </ul>
                
                <h2>Food Affairs Limited <span> Accountant -2016-2017</span></h2>
               
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Hobbies</dt>
            <dd>Programming, playing chess, and Taekwondo</dd>
            
            <dd class="clear"></dd>
            
            <dt>References</dt>
            <dd>Available on request</dd>
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
    
    </div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
<div id="myModal" class="modal">
  <span class="close">Close</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

// Get all images and insert the clicked image inside the modal
// Get the content of the image description and insert it inside the modal image caption
var images = document.getElementsByTagName('img');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
var i;
for (i = 0; i < images.length; i++) {
   images[i].onclick = function(){
       modal.style.display = "block";
       modalImg.src = this.src;
       modalImg.alt = this.alt;
       captionText.innerHTML = this.nextElementSibling.innerHTML;
   }
}
</script>

</html>