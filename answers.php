<?php
function getCurrentDateAndTime(){
    $newdate = date("l jS \of F Y h:i:s A");
    echo "Today's date is " . $newdate;
    //A.M.A
}
function getCurrentDayOfTheWeek(){
    $newdate = date("l");
    echo "Today's is a " . $newdate;
}
function getFutureDate(){
    $newdate = date("Y-m-d");
    $newdate = date_create($newdate);
    date_add($newdate,date_interval_create_from_date_string("7 days"));
    echo "A week from now, the date will be: " . date_format($newdate, "l jS \of F Y");
    //A.M.A
}

function getRandomYoMamaJoke(){
	$randomJokeJson = file_get_contents("http://api.yomomma.info");
	$randomJoke = json_decode($randomJokeJson);
    echo $randomJoke->joke;	
    //A.M.A
}

function getRandomQuote(){
	$randomQuoteJson =file_get_contents("https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en&json=?");
	$randomQuote = json_decode($randomQuoteJson);
	$quoteText = $randomQuote->quoteText;
    $quoteAuthor = $randomQuote->quoteAuthor;
    if(!empty($quoteAuthor) ){
        echo "<br/>" .$quoteText. "<br/> &nbsp; &nbsp; &ndash; <cite>" .$quoteAuthor. "</cite>";
    }
    else  echo "<br/>" .$quoteText. "<br/> &nbsp; &nbsp; &ndash; <cite>Unknown Author</cite>" ;
    //A.M.A
}

function getMotivationalQuoteForTheDay(){
	$randomQuoteJson =file_get_contents("http://quotes.rest/qod.json?category=inspire");
	$randomQuote = json_decode($randomQuoteJson, true);
	$quoteTitle = $randomQuote['contents']['quotes'][0]['title'];
	$quoteText = $randomQuote['contents']['quotes'][0]['quote'];
    $quoteAuthor = $randomQuote['contents']['quotes'][0]['author'];
    echo "</br>" .$quoteText. "<br/> &nbsp; &nbsp; &mdash; " .$quoteAuthor. "<br/>";
    //A.M.A
}

function getMediumArticle(){
	$getMediumUrlContents = file_get_contents("https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fmedium.com%2Ffeed%2F%40adamichelllle");
	$getMediumJson = json_decode($getMediumUrlContents, true);
	foreach($getMediumJson['items'] as $getSingleMediumArticle){
		$mediumArticleTitle = $getSingleMediumArticle['title'];
		$mediumArticleUrl = $getSingleMediumArticle['link'];
		$mediumArticleThumbnail = $getSingleMediumArticle['thumbnail'];
		echo "<a href= '$mediumArticleUrl' style='color: #ffffff'><img src='http://res.cloudinary.com/missada/image/upload/v1524225094/hng_internship.png' class= 'img-responsive' ><br/><b>$mediumArticleTitle</b></a>"; 
		$article = "<script type='text/Javascript'>window.open('$mediumArticleUrl');</script>";
		break;
    }
    //A.M.A
}
function getPinkyCommands(){
    echo "Hi there! You can ask me to do one of the following: <br/> 1. Get or tell you <b>today's date and time</b> </br/> 
    2. Get <b>motivational quote of the day.</b> <br/> 3. Get my creator <b>Ada's latest medium article</b> <br/>
    4. Get or <b>tell you a random Yo Momma Joke</b>. <br/> 5. Get or tell you <b>what day of the week it is.</b> <br/>
    6. Get the <b>date seven days or a week from now.</b> <br/> 7.Get or <b>tell you a random quote.</b><br/>
    NB. All or some of the words in bold should be included in your message.";
    //A.M.A
}
?>