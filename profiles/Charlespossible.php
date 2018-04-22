    <?php
        
    require_once 'db.php';

    try {
    $sql = "SELECT * FROM secret_word";
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $query_result = $secret_word_query->fetch();
  
    $sql_query = 'SELECT * FROM interns_data WHERE username="Charlespossible"';
    $query_my_intern_db = $conn->query($sql_query);
    $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
    $intern_db_result = $query_my_intern_db->fetch();

  } catch (PDOException $exceptionError) {
    throw $exceptionError;
  }


  $secret_word = $query_result['secret_word'];
  $name = $intern_db_result['name'];
  $username = $intern_db_result['username'];
  $image_url = $intern_db_result['image_filename'];
    ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <title>Charlesposible Profile</title>
    <style type="text/css">

    body{
        background-color: #fff;
        margin: 0px;
    }

    .nav-page{
                float: center;
            }
        li {
            margin-right: 60px;
            font-weight: bold;
        }
        .my-pic{
            margin-left: 40%;
            height: 300px;
            border-radius: 50%;
        }
        .img-background{
            background-color:#ADFF2F;
        }
        h3{
            font-size:1.3em;
            font-weight: normal;
            text-align: center;
            margin-top: 30px;
            color: grey;


        }
      
        .head-text{
            font-family: sans-serif;
            font-style: italic;
            text-decoration: underline;
            color: grey;
            font-size: 1.2em;
            margin-left: 40%; 
            margin-top: 30px;
        }
        .para-text{
            border:0px;
            height: 1000px;
            width: 1000px;
            text-align: center;
        }
        .para{
            font-family: sans-serif;
            font-style: italic;
            color: grey;
            margin-top: 30px;
            margin-left: 30px
            font-size: 1.2em;
            font-weight: bold;
            text-align: justify;
        }

        .footer {
            position: fixed;
            width: 100%;
            background-color: grey ;
            color: white;
            text-align: center;
} 

    </style>
        

 
    
</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light  nav-page">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Me</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Portforlio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>
</header>

    <div class="img-background">
        <img src= "<?php echo $image_url ?>" alt="My Profile Picture" class="my-pic">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center"><b>Name:</b>  <em><?php echo $username ?></em></h3>
            </div>
            
        </div>
            
    </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="head-text">Formal Introduction</h4>
                </div>
            </div>
            <div class="row">
                <div class="para-text">
                    <p class="para">Hi, My name is Mbadugha Charles. I am a web developer based in Lagos. I am very comfortable with HTML , CSS, Javascript and  PHP. I am a life long learner so improviment is assured.</p>
                    <p class="para">I also get my hands dirty with Laravel and codeigniter. Curently and i am brushing up on React and Nodejs. I am an avid learner and a pro-active doer.</p>
                    <p class="para"> I am a very good cook. So when not coding, I cook. I mix ingredients to produce delicious taste exactly the way i mix codes to produce quality websites.</p>
                </div>
            </div>
        </div>
    
        
    

     <div class="container footer">
        <div class="row">
            <div>
             <p>Copyright &copy; HNG FUN
            <?php echo date("Y"); ?>
             </p>   
            </div>
        </div>
        
    </div>
    
   
   
</body>

</html>