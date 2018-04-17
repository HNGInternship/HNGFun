<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
body {
  background-color: #edeff2;
  font-family: "Calibri", "Roboto", sans-serif;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7);
  max-width: 500px;
  text-align: center;
  font-family: arial;
  background-color: white;
  border-radius: 19px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #a3d063;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  border-radius: 12px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: #fff;
}

button:hover,
a:hover {
    opacity: 0.9;
    background-color: #c7eafc ;
}

.image {
    border-radius: 100%;
    padding-top: 6px;
}

.usernamecs {
    margin-top: 40px;
}

p.ctact {
    border-radius: 12px;
    padding-right: 8px;
    padding-left: 8px;
    padding-bottom: 6px;
    color: #f5886e;
}

p.catact {
    border-radius: 12px;
    padding-right: 8px;
    padding-left: 8px;
    padding-top: 10px;
}

.col-md-12 {
    margin-top: 10px;
}
h3{background-color: #f5886e;
    margin-right: 8px;
    margin-left: 8px;}
.titles{background-color: #f5886e;
    margin-right: 8px;
    margin-left: 8px;}
.hng{background-color: #f5886e;
    margin-right: 8px;
    margin-left: 8px;}
.glyph{background-color: #f5886e;}
</style>
</head>
<body>
<?php

  try{
  //get secret_word 
  $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
  $secret_word = $data['secret_word'];
  
  //get my details    
  $sql = 'SELECT * FROM secret_word';
    $sql = "SELECT * FROM `interns_data` WHERE username = 'mikoloxtra' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    
    $name = $data['name'];
  $image_filename = $data['image_filename'];
    $username = $data['username'];
  }catch(PDOException $e){
    $secret_word = "sample_secret_word";
    $name = "Ajetunmobi Michael";
    $username = "mikoloxtra";
    $image_filename = 'https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg';
  }

?>
<div class="col-md-12 col-sm-12">
         <div class="col-md-4 col-sm-12">
            <div class="card">

                <img class="image" src="<?php echo $image_filename; ?>" style="width:92%">
                <p class="catact">
                    <button><?php echo $name; ?></button>
                </p>
                <h3>slack url : <?php echo $username; ?></h3>
                <p class="titles">UI/UX , Programmer & Intern @</p>
                <b><p class="hng">HNG Internship</p><b>
                <div class="glyph" style="margin: 8px 8px;">
                <a href="https://github.com/mikoloxtra"><i class="fa fa-github"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
                </div>
                <p class="ctact"><button>Contact</button></p>
            </div>
</div>   
</body>
</html>
