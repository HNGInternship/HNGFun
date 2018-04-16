<?php 
$file = realpath(__DIR__ . '/..') . "/db.php"    ;
require_once $file;
global $conn;


    
if(isset($_GET['train']) || isset($_GET['query']) || isset($_GET['list'])){
    if(isset($_GET['train'])){
        $keyword = trim($_GET["keyword"]);
        $response = trim($_GET["response"]);
        try {
        $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $keyword . "', '" . $response . "')";
        
        $conn->exec($sql);

     $message = "Saved " . $keyword ." : " . $response;
        
        echo $message;

    }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    }else if(isset($_GET['query'])){
        
        $query = $_GET['query'];
        $str = "'%".$query."%'";
        $sql = "SELECT answer FROM chatbot WHERE question LIKE " . $str . " ORDER BY question ASC LIMIT 1";
        
      foreach ($conn->query($sql) as $row) {
            echo $row["answer"];
        } 
      
    } else if(isset($_GET['list'])){
        $sql = "SELECT COUNT(*) FROM bot";
        if ($res = $conn->query($sql)) {
             
        $string = '';
     
    /* Check the number of rows that match the SELECT statement */
        if ($res->fetchColumn() > 0) {
            $sql = "SELECT * FROM chatbot ORDER BY question ASC";
       
      foreach ($conn->query($sql) as $row) {
            $string .= $row["question"] . "<br>";
        } 
        echo $string;
    }
        
     
    }
}
}
else

{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu|Lato' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Bytenaija - HNG Internship 4</title>

    <script>
        function updateClock(){
            console.log("called ")
            let d = new Date().toUTCString();
            d = d.substr(0, d.indexOf("GMT")-9)
             d += " - " + new Date().toLocaleTimeString();
            document.getElementById('time').innerText = d;
            
            return 0;
             
               
        }

         window.onload = function(){
            updateClock();
          var j=  setInterval(updateClock, 1000);
         }
    </script>
    
    <style>
    html, body, *{
    margin: 0;
    padding: 0;
}

header{
    width: 100%;
    margin-top : 4rem;
    text-align: center;
    font-family: 'Ubuntu';
    background-color: #632F2F;
    padding: 2rem 0;
    color: #E0D3D3;
    font-size: 200%;
}

section{
    background: url("http://res.cloudinary.com/bytenaija/image/upload/v1523620935/pexels-photo-248797.jpg") no-repeat center center;
    background-attachment: fixed;
    background-size: cover;
    color: #330505;
    padding: 2rem;
    min-height: 40rem;
    
}

aside{
    
    float:right;
    
    margin-right: 5rem;
    text-align: center;
}


aside img{
    border-radius : 50%;
    width: 15rem;  
    height: 15rem; 
    box-shadow: #330505 0 0 2rem;
  
       
}

aside h4{
font-size: 150%;
font-family: 'Roboto';
text-shadow: white 0 0 .5rem;

}

section h2, h3{
    color: #330505;
    font-size: 300%;
    font-family: 'Poppins';
    text-shadow: white 0 0 .5rem;
    
}

section h2:first-child{
    
    margin-top: 1rem;
}

.clear{
    clear: both;
}


.left{
    float: left;
}

.me{
    font-size: 100%;
}

.about {
    text-shadow: 5px 0 1rem #330505;
    font-size: 200%;
    color:aqua;
    text-align: center;
    margin-bottom: 2rem;
}

.me p{
   box-shadow: 1px 1px .5rem aqua;
    width: 20rem;
    margin: 1rem 2rem;
    background-color: white;
    font-size: 150%;
}


.me .left p, .me .right p{
    transition: transform 1s  ease-in-out;
    cursor: pointer;
    position: relative;
    padding:.5rem;


}

.me .left, .right{
    position: relative;
    top: -300px;
    animation: mymove 5s;
    animation-fill-mode: forwards;
}

@keyframes mymove{
    0%{
        top: -300px;
        
    }

    25%{
        top: -225px;
        
    }

     50%{
        top: -150px;
    }
    75%{
        top: -75px;
    }
    100%{
        top: 0px;
    }
}
.me .right{
    margin : 0;
    float:right;

    
    
}

.me .right p{
   transform: skew(20deg);

}

.me .left p{
   transform: skew(-20deg);
}

.left p:hover, .right p:hover{
    box-shadow: 1px 1px .5rem #330505;
   transform: skew(0deg);
   background-color:aqua;
}
.bot{
    width : 40%;
    margin: .5rem auto;
}
.form-control{
    width : 100%;
}

 input{
    border-radius:.2rem;
    padding: .5rem;
    
}

#botresponse{
    width: 100%;
    background-color: aqua;
    height: 15rem;
    overflow-y: scroll;
    padding: 1rem;
    border-radius: 2rem;
    font-family: Lato;
}

.bot input{
    height: 1.5rem;
    box-shadow: 0 0 2rem aqua;
    border-radius: .5rem;
    margin-left: .5rem;
}

.bot #botresponse div{
    margin-bottom: 1rem;
    font-family: Lato;
}

.bot .botnet{
   color: white;
   background-color: black;
   padding:.2rem;
   margin-right: .5rem;
   margin-bottom: .2rem;
   display: inline-block;
   border-radius: .3rem;
   font-family: Lato;
}
.bot .user{
    color: Red;
   background-color: rgba(0,0,0,.5);
   padding:.5rem;
   margin-right: .5rem;
   margin-bottom: .2rem;
   display: inline-block;
   border-radius: .3rem;
   font-family: Lato;
}
.bot .res{
    display: inline-block;
    font-family: Lato;
}

.bot #botresponse::-webkit-scrollbar {
    width: 2rem;
}

/* Track */
.bot #botresponse::-webkit-scrollbar-track {
    background: aqua; 
}

/* Handle */
.bot #botresponse::-webkit-scrollbar-thumb {
    background: white; 
}

/* Handle on hover */
.bot #botresponse::-webkit-scrollbar-thumb:hover {
    background: #555; 
}


.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
color: #000000;
opacity: 1; /* Firefox */
font-family: Lato;
}

  input:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: #000000;
    font-family: Lato;
}

@media screen and (max-width: 900px){

html, body{
    margin: 0;
    padding: 0;
}
    .bot{
        width : 100%;
        margin: 0 auto;
    }

    aside{
    
    float:none;
    
    margin-right: 0rem;
    text-align: center;
    width: 100%;
}

aside img{
    border-radius : 50%;
    width: 15rem;  
    height: 15rem; 
    box-shadow: #330505 0 0 2rem;
  
       
}

aside h4{
font-size: 150%;
font-family: 'Roboto';
text-shadow: white 0 0 .5rem;

}

section h2, h3{
    color: #330505;
    font-size: 100%;
    font-family: 'Poppins';
    text-shadow: white 0 0 .5rem;
    
}

section{
   width: 100%;
   margin-bottom: .5rem;
}
.me{
    width:100%;
}
.left{
    float :none;
    width: 100%;
    text-align: center;
}

.right{
    float :none;
    width: 100%;
    text-align: center;
}

.me p{
   box-shadow: 1px 1px .5rem aqua;
    width: 80%;
    margin: .5rem auto  ;
    background-color: white;
    font-size: 100%;
    text-align: center;
}

header{
    width: 100%;
    margin-top: 4rem;
}

.bot .botnet{
    font-size:80%;
}
.bot .user{
    font-size:80%;
}
.bot .res{
    font-size:80%;
}

.about{
    font-size: 100%;
}
}
    </style>
</head>
<body>
<?php
$file = realpath(__DIR__ . '/..') . "/db.php"    ;
include $file;
global $conn;
$image_filename = '';
$name = '';
$username = '';
$sql = "SELECT * FROM interns_data where username = 'bytenaija'";
foreach ($conn->query($sql) as $row) {
    $image_filename = $row['image_filename'];
    $name = $row['name'];
    $username = $row['username'];
}

global $secret_word;

$sql = "SELECT secret_word from secret_word";
foreach ($conn->query($sql) as $row) {
    $secret_word = $row['secret_word'];
   
}



?>


    <header>
        <h1>Welcome to HNG  <br />Internship 4</h1>
    </header>

    <section class="content">
        <div class="left">
        <h2>My name is <?php echo $name; ?>.</h2>
        <h3>It is great to be part of <br />HNG Internship 4</h3>
        </div>

        <aside>
            <img src='http://res.cloudinary.com/bytenaija/image/upload/v1523616184/me2.jpg' alt="Me" />


            <h4 id="time"> 
               
        
        
    </h4>
        </aside>

        
    <div class="clear">&nbsp;</div>
    <h1 class="about">I am a FullStack Developer from Nigeria.</h1>
    <div class="me">
    
    <div class="left">

    <p>Vue.js</p>
    <p>React.js</p>
    <p>Bootstrap</p>
    <p>jQuery</p>
    </div>
    <div class="right">
    <p>Node.js/Express.js</p>
    <p>PHP/Laravel</p>
    

    <div class="clear">&nbsp;</div>
    </div>
    <div class="clear">&nbsp;</div>
    
    </div>

    <div class="bot">
    <div id="botresponse"> </div>
    <br />
    <input type="text" name="botchat" placeholder="Chat with me!" onkeypress="return runScript(event)" class="form-control">
    
    
   
    </div>
    </section>

<script>

let trainMode = false;
let baseURL = "http://hngfun.test/profiles/bytenaija.php/";
let botResponse = document.querySelector("#botresponse");
window.onload = instructions;
function runScript(e) {
    if (e.keyCode == 13) {
        let input = e.currentTarget;
        let dv = document.createElement("div");
            dv.innerHTML = "<span class='user'>You: </span> <span class='res'>" + input.value + "</span>";
           botResponse.appendChild(dv)
           if(trainMode){
               training(input.value)
           }else{
            evaluate(input.value)
           }
        
        input.value = "";
        return false;
    }
}
let askName = false;
let setName = false;
let name = ''
function evaluate(str){
    str = str.toLowerCase();
    if(askName && !setName){
        setName = true;
        name = capitalize(str);
        print("Welcome to my galaxy " + name + ". Ask me any question. I will let you know if I can answer it");
        return;
    }
    if(str.indexOf("hi") != -1 || str.indexOf("hello") != -1){
        if(askName){
            print("Hello " + name + "! How can I be of help?")
        }else{
            askName = true;
        print("Hi, how are you? What is your firstname?")
        }
        
    } else if(str.indexOf("time") != -1){
        let inStr = str.substr(str.indexOf("time") + 5, 2);
        if(inStr !== "in"){
            print("Usage: What is the time in New York \n or Time in New York");
        }else {
        let city = str.substr(str.indexOf(inStr)+3, str.length -1)
        //city = capitalize(city);
        console.log("citycity", city)
        
        if(city == " "){
            print("Usage: What is the time in New York \n or Time in New York");
        }else{
            let geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address="+ city + "&sensor=true&key=AIzaSyCWLZLW__GC8TvE1s84UtokiVH_XoV0lGM";
            fetch(geocodeUrl)
            .then(response=>{
                return response.json()
            })
            .then(response=>{
                let lat = response.results[0].geometry.location.lat;
                let lng = response.results[0].geometry.location.lng;
                var targetDate = new Date() // Current date/time of user computer
                var timestamp = targetDate.getTime()/1000 + targetDate.getTimezoneOffset() * 60 
                let url = "https://maps.googleapis.com/maps/api/timezone/json?location="+lat+"," + lng+"&timestamp=" +timestamp+ "&key=AIzaSyBk2blfsVOf_t1Z5st7DapecOwAHSQTi4U" 
                console.log(url);  
                
                fetch(url)
                .then(response=>{
                    return response.json();
                })
                .then(response=>{
                    var offsets = response.dstOffset * 1000 + response.rawOffset * 1000 // get DST and time zone offsets in milliseconds
                    var localdate = new Date(timestamp * 1000 + offsets) // Date object containing current time of Tokyo (timestamp + dstOffset + rawOffset)
                    print("The time in " + capitalize(city) + " is " + localdate.toLocaleString())
                })  
            })
        }

      
        
       
        
    }

    
    } else if(str.indexOf("currency") != -1){
        str = str.substr(str.indexOf(":") + 2, str.length - 1);
        str = str.split("/");
        let api_key = "U7VdzkfPuGyGz4KrEa6vuYXgJxy4Q8";
		let currency1 = str[0].toUpperCase();
        let	currency2 = str[1].toUpperCase();
		let url = "https://www.amdoren.com/api/currency.php?api_key=" + api_key + "&from=" + currency1 + "&to=" + currency2;
        console.log(url);
        var proxyUrl = 'https://cors-anywhere.herokuapp.com/';

    fetch(proxyUrl + url)
    .then(response=>{
        console.log(response)
        return response.json();
    })
    .then(response=>{
        print(currency1 + " 1 = " + currency2 + " " + response.amount)
    }).catch(error=>{
        console.log(error);
    })
    }
    else if(str.indexOf("#train") != -1)
    {
        console.log("Entering training mode")
        print("Entering training mode. Enter #exit to exit training mode. To train enter <strong>keyword : response.</strong>");
        trainMode = true;

    } 
    else if(str.indexOf("#list") != -1)
    {
       
        let  url = window.location.href;
    

        url += "?list=1";
        
        fetch(url)
        .then(response=>{
            return response.text();
        })
        .then(response=>{
            if(response == ''){
                print("I don't understand that command yet. My master is very lazy. Try agin in 200 years");
            }else{
                print(response);
            }
            
        })

    } 
    else{
        let  url = window.location.href;
        str = str.split(":");
        let keyword = str[0], response = str[1];

        console.log(keyword, response)

        url += "?query=" + str;

        fetch(url)
        .then(response=>{
            return response.text();
        })
        .then(response=>{
            if(response.length <= 0){
                print("I don't understand that command yet. My master is very lazy. Try agin in 200 years");
            }else{
                print(response);
            }
            
        })
            
    }
}

function print(response){
    let dv = document.createElement("div");
            dv.innerHTML = "<span class='botnet'>Byte9ja:</span><span class='res'>" + response + "</span>";
           botResponse.appendChild(dv)
           botResponse.scrollTop = botResponse.scrollHeight;
}

function capitalize(str){
    let words = [];
    str = str.split(" ");
    for(let word of str){
        words.push(word[0].toUpperCase() + word.slice(1));
    }

    return words.join(" ");
}

function training(str){
 if(str.indexOf("#exit") != -1)
    {
        
        print("Exiting training mode! Thank you for the training.");
        trainMode = false;
        return;

    }

    let  url = window.location.href;
    str = str.split(":");
    let keyword = str[0], response = str[1];

    console.log(keyword, response)

    url += "?train&keyword=" + keyword + "&response=" + response;
    console.log(url)
    fetch(url)
    .then(response=>{
        console.log(response);
        return response.text()
    })
    .then(response=>{
        console.log(response)
        print(response);
    })
}

function instructions(){
    $string = 'My name is byte9ja. I am a Robot. I understand the following commands<br>';
    $string += "<li><strong>Hi</strong> or <strong>Hello</strong>: Greet me </li>";
    $string += "<li>Type <strong>#train</strong> to enter training mode and <strong>#exit</strong> to exit training mode </li>";
    $string += "<li><strong>currency: {base currency}/{other currency}</strong> to see exchange rate: e.g. currency: USD/NGN </li>";
    $string += "<li><strong>What is the time in {country or city}</strong> or <strong>Time in {country or city} </strong>to check the time: e.g. Time in New York </li>";
    $string += "<li><strong>#list </strong>to list all the questions in the database</li>";
   print($string);
}
</script>
</body>
</html>
<?php
}

?>