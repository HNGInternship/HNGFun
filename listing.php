<?php
include_once("header_currentlisting.php");
//include_once("../config.php");
require ('paginator.php');

//$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE); 

//DO NOT limit this query with LIMIT keyword, or...things will break!
$query = "SELECT * FROM interns_data";

//these variables are passed via URL
$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 8; //movies per page
$page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
$links = 8;

//$paginator = new Paginator( $mysqli, $query ); //__constructor is called
//$results = $paginator->getData( $limit, $page );
?>

<style>
  h2 {
    font-family: 'work sans';
  }
  .profile {
    width: 250px;
  }
  .card-img-top {
    height: 250px !important;
  }
  
  /* #contain img{
    width:100%;
    padding:5px;
    height:200px;
   }
   #contain{
     margin-left:auto;
     margin-right:auto;
   }
   #contain #border{
     margin-left:70px;
     margin-right:70px;
     padding:0;
     width: 250px;
     border: solid 1px #E5E5E5;
   }
   #caption{
     text-align:center;
   }*/
</style>
<main class="container mt-5 mb-5 px-5">
  <h2>Our Interns</h2>
  <hr style="width: 58px; border-top: 2px solid #3D3D3D;" class="mx-auto mb-5" />
  <p class="text-center my-1">HNG4.0 has been a life-transforming journey for interns across Africa.</p>
  <p class="text-center my-1">Don't take our word for it...take theirs.</p>
  <div class="row mx-0 mt-4 justify-space-between">
  <?php //for($p = 0; $p < count($results->data); $p++): ?>  
    
    <?php 
    //store in $movie variable for easier reading
    $row = $results->data[$p]; 
    ?>
  <div class="profile">
      <div class="card0">
        <a href="profile.php?id=<?php echo $row['username'];?>"><img class="card-img-top" src='<?php echo $row['image_filename']?>' onerror="this.src='images/default.jpg'" alt="Profile Image"> </a>
        <div class="card-footer">
         <center> <a href="profile.php?id=<?php echo $row['username'];?>" class="my-0 py-0 btn btn-default">View Profile</a></center>
        </div>
      </div>
      <h4 class="text-center mt-3"><?php echo $row['name'];?></h4>
    </div>
<?php //endfor ?>
    <nav class="text-xs-center" style="margin:auto;">
    <br>
<br>
      
        
        <?php echo $paginator->createLinks( $links, 'pagination pagination-sm' );?>
        
    </nav>
    
  </div>
</main>
<?php
include_once("footer.php");
?>
