<?php
 require_once "../../db.php";
//remove line 2 for it to work online
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
//echo $secret_word;

$result2 = $conn->query("Select * from interns_data where username = 'Reme'");
$user = $result2->fetch(PDO::FETCH_OBJ);

//echo $user->name;
?>

<!DOCTYPE hmtl>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">   
    
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<style>

body, h1, h2, h3, h4, h5, h6, p, nav, div, span
{
    font-family: "Comfortaa", cursive; 
    font-size: 14px;
}
#wrapper {
    display: flex;
    align-items: stretch;
}

#side-nav {
    background-color: #2b0b30;
    color: #ffffff;
    min-width: 250px;
    max-width: 250px;
    min-height: 100vh;
    text-align: left;
    padding: 0;
   }

#side-nav.active {
  margin-left: -250px;
}
    
@media (max-width: 768px) {
    #side-nav {
  margin-left: -250px; 
/*hides the side nav on smaller screens*/
    }
#side-nav.active {
  margin-left: 0px;
}
}
/*end of media query*/
#side-nav ul
    {
  padding: 3% 2% 3% 8%; !important
    }
#side-nav ul li
    {
  list-style-type: none;
  padding: 4% 2% 4% 8%; !important
  background-color: #ce93d8;
    }
#profile-img
    {
  width: 100%;
    }
#sidenavCollapse
    {
  text-align: left; !important
    }
.navbar-btn
    {
        color: purple;
        border-radius: 0; !important
    }
.borderZero
    {
     border: 0; !important
    }
#message-input
    {
    position: fixed;
    bottom: 0;
    width: 75%;
    }
.sent
    {
      width: 55%;  
      background-color: #9c27b0;
      border-radius: 10px;
      float: right;
      padding: 10px;
      margin: 2%;
      color: #ffffff;
    }
 .reply
    {
      width: 55%;
      background-color: #dedede;
      border-radius: 10px;
      float: left;
      padding: 10px;
      margin: 2%;
    }
</style>
</head>
    
<body>
<div id="wrapper">

<nav id="side-nav">
<?php echo '<img src="'.$user->image_filename.'" class="img-responsive" id="profile-img">'; ?>
<ul>
<li><i class="fa fa-user"></i> <?php echo $user->name; ?></li>
<li><i class="fa fa-slack"></i> @<?php echo $user->username; ?></li>
<li><i class="fa fa-lock"></i> <?php echo $secret_word?></li>
</ul>
</nav><!--end of sidebar-->
    
<div id="content" class="container">
<div class="row">
<div class="col-lg-12">
<button type="button" id="sidenavCollapse" class="btn navbar-btn">
<i class="fa fa-align-left"></i>
</button>
</div>
</div>
<!--chat container-->
<div class="row">
<div class="col-lg-12">
<!--sent-->
<div class="sent">
<p>Hello</p>
</div>
<!--reply-->
<div class="reply">
<p>Hullo</p>
</div>
<!--message input-->
<div class="input-group mb-3" id="message-input">
  <div class="input-group-prepend">
    <span class="input-group-text"><button class="btn btn-outline-secondary borderZero" type="button"><i class="fa fa-paperclip attachment "></i></button></span>
  </div>
  <input type="text" class="form-control" placeholder="Type something...">
  <div class="input-group-append">
    <span class="input-group-text"> <button class="btn btn-outline-secondary borderZero" type="button"><i class="fa fa-paper-plane "></i></button></span>
  </div>
</div>
<!--end of message input-->
</div>
</div>
<!--end of chat container-->
</div> <!--end of content div-->
</div>   <!--end of wrapper div--> 
<script>
$(document).ready(function () {

    $('#sidenavCollapse').on('click', function () {
        $('#side-nav').toggleClass('active');
    });

});
</script>
    </body>

</html>