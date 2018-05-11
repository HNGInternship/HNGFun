<?php
    

    if(!defined('DB_USER')){
        require '../db.php';
    }

    //Fetching from your database table.
        
        $query = $conn->query("select * from interns_data where username= 'choicevine' ");
        $result = $query->fetch(PDO::FETCH_OBJ);
        


        // think this should go here
        $ask = $conn->query("select * from secret_word LIMIT 1");
    
    //fetch as an object
        $answer = $ask->fetch(PDO::FETCH_OBJ);
    $secret_word = $answer->secret_word;
      
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>profile Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <style type="text/css">
        * {
    margin: 0;
    padding: 0;
}

body {
    font-family: "Georgia";
    font-size: 16px;
}
        .container {
            position: relative;
            width: 100vw;
            padding: 30px;
        }

         .card {
            position: relative;
    margin-top: 20px;
    padding: 30px;
    background-color: rgba(214, 224, 226, 0.2);
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    border-top-right-radius:5px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: #fff;
    background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
    height: 130px;
}
.card-background img {
    position: relative;
    background: url(); no-repeat center;
    -webkit-filter: blur(25px);
    -moz-filter: blur(25px);
    -o-filter: blur(25px);
    -ms-filter: blur(25px);
    filter: blur(25px);
    margin-left: -100px;
    margin-top: -200px;
    min-width: 130%;
}
.card.hovercard .useravatar {
    position: relative;
    top: 15px;
    left: 0;
    right: 0;
}
.card.hovercard .useravatar img {
    position: relative;
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255, 255, 255, 0.5);
}
.card.hovercard .card-info {
    position: relative;
    bottom: 14px;
    left: 0;
    right: 0;
}
.card.hovercard .card-info .card-title {
    position: relative;
    padding:0 5px;
    font-size: 20px;
    line-height: 1;
    color: #262626;
    background-color: rgba(255, 255, 255, 0.1);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.card.hovercard .card-info {
    position: relative;
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.hovercard .bottom {
    position: relative;
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn-pref .btn {
    -webkit-border-radius:0 !important;
}

    </style>
</head>
<body>

    <script type="text/javascript">
        $(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
    </script>

        <div class="container">

        <div class="col-lg-6 col-sm-6" style="position: relative;">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://res.cloudinary.com/devgeaks/image/upload/v1523731563/2017-03-02_08.30.03.jpg">
            
        </div>
        <div class="useravatar">
            <img alt="" src="<?php echo $result->image_filename; ?>">
            <hr> 
        </div>
        <div class="card-info"> <span class="card-title"><?php echo $result->name; ?></span>

        </div>
        <div class="card-info"> <span class="card-title"><?php echo $result->username;  ?></span>

        </div>
        <div class="card-info"> <span class="card-title">Developer</span>
        </div>
        </div>
        
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Accolades</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Hobbies</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Following</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h3>Accolades</h3>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3>Hobbies</h3>
        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3>Favorites</h3>
        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3>Following</h3>
        </div>
      </div>
    </div>
    
    </div>

   </div>

</body>
</html>
