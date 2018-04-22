<!DOCTYPE html>
<html lang ="en-US"> 
<head>
    <title>Ajiva Profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
<<<<<<< HEAD
<<<<<<< HEAD
=======
    
=======
>>>>>>> 570edfc4ec994eaae6357547d5d01ea859b9fed1
<<<<<<< HEAD
    
=======
>>>>>>> 9ffcdeb9dd95b31d85f8db38a40a268d2521bc63
<<<<<<< HEAD
=======
    
>>>>>>> 5632bab160f2d8df318f8177cbaf1d32f9c16513
=======
>>>>>>> 34cb93c0f3ce95469dc0634e398538ac59ee848a
>>>>>>> 570edfc4ec994eaae6357547d5d01ea859b9fed1
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <style>
        body{
            background-image: url("https://res.cloudinary.com/nedy123/image/upload/v1523911955/brainstorm_l87u78.png");
            min-height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5632bab160f2d8df318f8177cbaf1d32f9c16513
=======
=======
<<<<<<< HEAD
>>>>>>> 34cb93c0f3ce95469dc0634e398538ac59ee848a
>>>>>>> 570edfc4ec994eaae6357547d5d01ea859b9fed1
            /* border-radius: 50%; */
        } 
        .card{
            max-width: 25%;
            margin-top: 10%;
            /* border-radius: 20%; */
            height: 450px;
            
            
        }     
        .card-top{
            background-color: #b0555d;
            height: 70%;
            /* border-radius: 5% 5% 0 0; */
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 570edfc4ec994eaae6357547d5d01ea859b9fed1
=======
        } 
        .card{
            max-width: 30%;
            margin-top: 50%;
            border-radius: 60%;
        }       
>>>>>>> 9ffcdeb9dd95b31d85f8db38a40a268d2521bc63
<<<<<<< HEAD
=======
>>>>>>> 5632bab160f2d8df318f8177cbaf1d32f9c16513
=======
>>>>>>> 34cb93c0f3ce95469dc0634e398538ac59ee848a
>>>>>>> 570edfc4ec994eaae6357547d5d01ea859b9fed1
    </style>
    
</head>

<body>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5632bab160f2d8df318f8177cbaf1d32f9c16513
=======
=======
<<<<<<< HEAD
>>>>>>> 34cb93c0f3ce95469dc0634e398538ac59ee848a
>>>>>>> 570edfc4ec994eaae6357547d5d01ea859b9fed1
ss
    <div class="d-flex justify-content-center">
        <div class="card rounded p-0 mt-5">
            <div class="card-top d-flex justify-content-center">
                <div class="d-block">
                <div class="d-flex justify-content-center mt-5">
                    <img src="https://res.cloudinary.com/nedy123/image/upload/v1523911950/profilePic_xilm0r.jpg" class="rounded-circle w-25 h-25 img-fluid">              
                </div>                
                    <div class="card-body text-center">
                        <p class="card-title h2" style="color:white;"> David Enoch Aji</p>
                        <p class="card-text h4 mb-4" style="color:#BDBDBD;">Android | Graphics | UI/UX</p>
                        <a href="facebook.com/David Enoch Aji">
                            <i class="fab fa-facebook-f fa-fw text-dark fa-2x"></i>
                        -</a>
                        <a href="twitter.com/daveaji">
                            <i class="fab fa-twitter fa-fw text-dark fa-2x"></i>  
                        </a>
                        <a href="github.com/Ajiva-D">
                            <i class="fab fa-github fa-fw text-dark fa-2x"></i>          
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 570edfc4ec994eaae6357547d5d01ea859b9fed1
=======

    <div class="d-flex justify-content-center pt-5 mt-5">
        <div class="card rounded p-0 ">
            <img src="https://res.cloudinary.com/nedy123/image/upload/v1523911950/profilePic_xilm0r.jpg" class="card-img-top img-fluid m-0">
            <div class="card-body text-center">
                <p class="card-title h2 "> David Enoch Aji</p>
                <p class="card-text h4 mb-4">Android | Graphics | UI/UX</p>
                <a href="facebook.com/David Enoch Aji">
                    <i class="fab fa-facebook-f fa-fw text-primary fa-2x"></i>
                </a>
                <a href="twitter.com/daveaji">
                    <i class="fab fa-twitter fa-fw text-primary fa-2x"></i>  
                </a>
                <a href="github.com/Ajiva-D">
                    <i class="fab fa-github fa-fw text-dark fa-2x"></i>          
                </a>
            </div>
        </div>
    </div>
    <?php

      require_once '../db.php';
      try {
          $select = 'SELECT * FROM secret_word';
          $query = $conn->query($select);
          $query->setFetchMode(PDO::FETCH_ASSOC);
          $data = $query->fetch();
      } catch (PDOException $e) {
          throw $e;
      }
      $secret_word = $data['secret_word'];        
?>
>>>>>>> 9ffcdeb9dd95b31d85f8db38a40a268d2521bc63
<<<<<<< HEAD
=======
>>>>>>> 5632bab160f2d8df318f8177cbaf1d32f9c16513
=======
>>>>>>> 34cb93c0f3ce95469dc0634e398538ac59ee848a
>>>>>>> 570edfc4ec994eaae6357547d5d01ea859b9fed1

    
</body>


</html