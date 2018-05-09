<?php
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
$result2 = $conn->query("Select * from interns_data where username = 'lexmill'");
$user = $result2->fetch(PDO::FETCH_ASSOC);

$username = $user['username'];
$name = $user['name'];
$image_filename = $user['image_filename'];
?>
function gettTime(){
    date_default_timezone_set('Africa/Lagos');
    return "The time is " . date("h:i:sa");
}function getMyquote(){
    $random = rand(0,11);
    $quote = array("My life is my message. Mahatma Gandhi",
        "Not how long, but how well you have lived is the main thing. Seneca",
        "I love those who can smile in trouble… Leonardo da Vinci",
        "Time means a lot to me because, you see, I, too, am also a learner and am often lost in the joy of forever developing and simplifying. If you love life, don’t waste time, for time is what life is made up of. Bruce Lee",
        "Life is what happens when you’re busy making other plans. John Lennon",
        "It is better to be hated for what you are than to be loved for what you are not. Andre Gide",
        "Dost thou love life? Then do not squander time, for that is the stuff life is made of. Benjamin Franklin",
        "Very little is needed to make a happy life; it is all within yourself, in your way of thinking. Marcus Aurelius",
        "Life is like playing a violin in public and learning the instrument as one goes on. Samuel Butler",
        "In the end, it’s not the years in your life that count. It’s the life in your years. Abraham Lincoln",
        "You’ve gotta dance like there’s nobody watching. William W. Purkey",
        "Believe that life is worth living and your belief will help create the fact. William James");
    return $quote[$random];
}function getmyJoke(){
    $random = rand(0,6);
    $joke = array("Q. What is the biggest lie in the entire universe?
               A. I have read and agree to the Terms & Conditions.",
        "Q. What do you call it when you have your mom’s mom on speed dial? A. Instagram.",
        "Q. What should you do after your Nintendo game ends in a tie?  A. Ask for a Wii-match!",
        "Why are iPhone chargers not called Apple Juice?!",
        "Q. How does a computer get drunk?  A. It takes screenshots.",
        "Q. Why did the PowerPoint Presentation cross the road?
        A. To get to the other slide.",
        "PATIENT: Doctor, I need your help. I’m addicted to checking my Twitter!
    DOCTOR: I’m so sorry, I don’t follow.",
        "What’s the Gig Deal?
        Have you heard of that new band “1023 Megabytes”? They’re pretty good, but they don’t have a gig just yet."
    );
    return $joke[$random];
}
<!DOCTYPE html>
<html>
<head>
	<script src="http://www.oracle.com/webfolder/technetwork/jet/js/libs/require/require.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	
 <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
<!meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
     background-color:#4169E1;
	 }
	 .sec1{
	 margin-top: 300px;
	 text-align: center;
	 color: #fff;
         font-size: 5px;
	 }        .mycss
              {
                  text-shadow:1px 3px 1px rgba(255,255,255,1);font-weight:bold;text-transform:uppercase;color:#000000;border: 5px ridge #FFFFFF;letter-spacing:5pt;word-spacing:2pt;font-size:20px;text-align:center;font-family:arial, helvetica, sans-serif;line-height:1;
              }

</style>
	 </head>
	 <body>

     
	     <div>
	 <h1>Stage 1</h1>
		     <br>

	 HNG Internship 4<br>
	 <div class="oj-panel oj-panel-oj-panel-shadow-md"><?php
	 date_default_timezone_set('Africa/Lagos');
	 $currentDateTime = date('Y-m-d H:i:s');
	 echo $currentDateTime;
         ?></h1></div><p class="oj-align-content-center">NAME: <?= $name?><br />USERNAME:: <?= $username?><br/><div class = "oj-flex-item oj-sm-10 oj-md-6 oj-lg-4">
		 <img src="<?php echo $image_filename; ?>" width="320" height="331" alt="Author's Picture"></div>
         </p>
	 </div>
	     
	 </body>
	 </html>

