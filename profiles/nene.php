<?php 
  require 'db.php';
?>

<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'nene'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Bootstrap-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!--my css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
    <div>
        <div class="container">
            <br>
            <br>
            <br>
            <div class="row">
                    <div class="col-md-6">
                            <img src="http://res.cloudinary.com/dubydhsmk/image/upload/v1524350340/DSC_3172_-_Copy.jpg" class="img-fluid" style="width:2000px;">

                    </div>
                    <div class='col-md-6'>
                        <center>
                            <p>This is Esther Ekereuke.<br><br>
                        
                                    Three things about her you must know and perhaps she is good at;
                                    Coming to a friends defense, getting the last word, being adventurous and creating fun ideas. 
                                    She avoid negative people, for they are the greatest destroyer of self-confidence and self-esteem. She surround yourself with people who bring out the best in her. 
                            </p>
                        </center>
                    </div>
            </div>
        </div>

    </div>
    
    
    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>