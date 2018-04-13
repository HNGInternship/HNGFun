<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
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
    margin-top : 2rem;
    text-align: center;
    font-family: 'Ubuntu';
    background-color: #632F2F;
    padding: 2rem 0;
    color: #E0D3D3;
    font-size: 200%;
}

section{
    background: url("https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=900&w=940") no-repeat center center;
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
    margin: 1rem 5rem;
    background-color: white;
    font-size: 200%;
}


.me .left p, .me .right p{
    transition: transform 1s  ease-in-out;
    cursor: pointer;
    position: relative;


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
   top: -200%;
}

.me .left p{
   transform: skew(-20deg);
}

.left p:hover, .right p:hover{
    box-shadow: 1px 1px .5rem #330505;
   transform: skew(0deg);
   background-color:aqua;
}
    </style>
</head>
<body>
    <header>
        <h1>Welcome to HNG  <br />Internship 4</h1>
    </header>

    <section class="content">
        <div class="left">
        <h2>My name is Everistus.</h2>
        <h3>It is great to be part of <br />HNG Internship 4</h3>
        </div>

        <aside>
            <img src="http://res.cloudinary.com/bytenaija/image/upload/v1523616184/me2.jpg" alt="Me" />


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
    </section>


</body>
</html>