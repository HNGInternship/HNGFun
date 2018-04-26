

<?php

    $sql="select * from secret_word";
    $q=$conn->query($sql);
    $q->setFetchMode(PDO::FETCH_OBJ);
    $data=$q->fetch();
    $secret_word=$data->secret_word;
    $result2=$conn->query("select * from interns_data where username='Ddan'");
    $user=$result2->fetch(PDO::FETCH_OBJ);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>Damilare Daniel</title>

  <meta name="theme-color" content="#2f3061">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel="stylesheet" id="css" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>

  <style>
    :root {
      --primary-color: #f0544f;
      --accent-color: #f4d58d;
      --text-secondary: rgba(244, 213, 141, 0.54);
      --text-primary: rgba(244, 213, 141, 0.8);
    }
    body {
      background-color: black;
      font-family: 'Ubuntu';
    }


    #main {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;


    }

    #about {



      color: var(--text-primary);



    }

    #hello {
      font-size: 96px;
      color:white;
      font-family: 'Alfa Slab One';
    }
.oj-link {
    color: $linkTextColor;
    line-height: inherit;
    text-decoration: none;
}
    #about h4 {
     font-size: 40px;
      font-weight: bold;
      color:white;
    }

    #about h5 {
      font-size: 14px;
      color: red;

    }

    #social {
      margin: 0 auto;
      width: 198px;
    }
    .social-icons {

      width: 18px;
      transition: all 700ms;
    }
    .social-icons:hover {
      transform: scale(1.2, 1.2);
    }
  </style>

</head>


<body class="oj-web-applayout-body " >

  <div class="demo-flex-display oj-flex-items-pad oj-contrast-marker" >

    <div id="about">

      <div class="oj-flex">

         <div class="oj-flex-item ">  <h2 id="hello" >Hello!</h1></div>
      </div>

      <div class="oj-flex">
         <div class="oj-flex-item ">   <h4 align="center">I am <?php echo $user->name;?></h4></div>
      </div>

      <div class="oj-flex">
            <div class="oj-flex-item"><h5 align="center">A Front end Developer</h5> </div>
      </div>

        <div class="oj-flex oj-sm-align-items-center oj-sm-margin-2x" align="center">
                <div role="img" class="oj-flex-item alignCenter">
                    <oj-avatar role="img" size="[[avatarSize]]" initials='[[initials]]'
                    data-bind="attr:{'aria-label':'Damilare Daniel'}">
                    </oj-avatar>
                    <img  src="<?php echo $user->image_filename; ?>" width="200" height="200" >
                </div>
        </div>


        



      


      </div>
    </div>



  </div>

    
</body>







</html>