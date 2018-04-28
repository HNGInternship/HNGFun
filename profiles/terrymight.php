<!-- head here  -->
<style>
        body{
        background: #fff;
        padding: 0;
        margin: 0;
        font-family: 'Montserrat',sans-serif;
        }
        /* use this to control the social media icons */
        html{
        box-sizing:border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        padding-top:380px;
        }
        /* this controls the profile background color and size */
        .main {
        width: 360px;
        height: 1000px;
        left: 50%;
        top:55%;
        background: rgb(01, 118, 167);
        position: absolute;
        transform: translate(-50%, -50%);
        }
        /* this controls the profile image size and styling */
         img{
        height: 230px;
        width: 190px;
        top: 228px;
        position: absolute;
        left: calc(44% - 80px);
        border: 3px solid rgb(115, 169, 219);
        border-radius: 50%;
        -moz-box-shadow: #2a3132 0px 4px 7px; 
        -webkit-box-shadow: #2a3132 0px 4px 7px; 
        box-shadow: #2a3132 0px 4px 7px; 
        background: #fff;   
        }
        /* this controls all the h1 header element */
        h1 {
        padding-top: 450px;
        font-size: 24px;
        color: #fff;
        text-align: center;
        }
        h3 {
        margin: -10px;
        font-size: 20px;
        text-align: center;
        color: #fff;
        }
        p{
        
        margin:20px 35px;
        width: 90%;
        text-align: center;
        line-height:1.4em;
        color: #fff;
        }
        .connect_me {
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 16px;
        }
/*
        #icons{
         margin-left: 50px;
        }
*/
        .date{
            padding-top:412px;
            margin-bottom: 10px;
        }
	</style>
<?php
   include_once("header.php");

   $profile_name = $_GET['id'];
	$secret_word = "sample_secret_word";

    require 'db.php';
?>
<!-- Page Content -->
</div>
<body class = 'profile'>

<div class="container">
	<div style="margin-top: 43px;" ></div>
    <?php 
	
	
	// readfile('profiles/' . $profile_name. '.php');

	//require_once('profiles/' . $profile_name. '.php');


  try {
    $sql = "SELECT * FROM hng_fun.interns_data WHERE username = '$profile_name'";
    $q = $conn->query($sql);

    $q->setFetchMode(PDO::FETCH_ASSOC);
    $datas = $q->fetch();
    
} catch (PDOException $e) {

    throw $e;
}

try {
    $sql = "SELECT secret_word FROM hng_fun.secret_word";
    $sw = $conn->query($sql);

    $sw->setFetchMode(PDO::FETCH_ASSOC);
    $data =  $sw->fetch();
    $secret_word = $data['secret_word'];
    
} catch (PDOException $e) {

    throw $e;
}


?>

</div>

<?php if(!isset($secret_word) || $secret_word != $data['secret_word']) { ?>
    <div style="
    color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        position: fixed;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
    top: 50px;
    ">Secret key mismatch. Insert your secret key</div>
<?php } ?>

<div class="main">
        <div class="image"><img src="<?php echo $datas['image_filename']; ?>" alt="Author's Picture"></div>
        <div class="details">
            <h1><?php echo $datas['name']; ?></h1>
            <h3>Slack Username: @<?php echo $datas['username']; ?></h3>
            <p>Exceptionally well organised, self taught, self motivated and resourceful Professional with few years of experience in Website Development and Design using HTML, CSS, Bootstrap, JAVASCRIPT, JQuery, Laravel, PHP, MYSQL.  Excellent analytical and problem solving skills.</p>
            <!-- <p class="connect_me">Connect with me</p> -->

        </div>
    </div>


</body>


<!-- Footer -->
<?php
include_once('footer.php');
?>

