<?php 
try {
       global $conn;


    $sql ="SELECT * FROM interns_data WHERE username = 'Kruga' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $intern_data = $q->fetch(); 

    //query for the secret word;
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    // Set the secret word
    $secret_word = $data['secret_word'];
    } catch (PDOException $e) {
         throw $e;
    }
?>
<!Doctype html>
<html>
<title>Kruga Task3</title>
<head>
<style type="text/css">
html
{background-color: Skyblue;
}
img{image-position: center;
image-size: 50px, 50px;
margin-bottom: 0;
padding-left: 450px;
padding-top: 100px;
padding-bottom: 0;
}
.img-circle{border-radius: 15%;
}
h1{font-family: Dotum;
font size: 500px;
padding-top: 50px;
padding-left: 350px;
font-color: white;
margin-top: 0;
line-height: 1.0;
margin-bottom: 0;
}
h2{font-family: Dotum;
font size: 500px;
margin-top: 0;
padding-left: 250px;
font-color: white;
}

</style>
</head>
<body>


<img class="img-circle" src= "<?php echo $intern_data['image_filename']; ?>" alt="Kruga Profile Image">
<h1><em>Hello!<em></h1>
<h2>I'm a Pharmacist looking to push beyond the boundaries of the pharmaceutical world to experience something new and unfamiliar.<br>  
My name is Kruga Owodeha-Ashaka.</h2>

</body>
</html>