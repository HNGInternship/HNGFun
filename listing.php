<?php
<<<<<<< HEAD
include_once("header.php");
include_once("db.php");
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 8;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$articles = $conn->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM interns_data LIMIT {$start}, {$perPage}");
$articles->execute();
$articles = $articles->fetchAll(PDO::FETCH_ASSOC);
$total = $conn->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total/$perPage);
=======
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
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
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
<<<<<<< HEAD
<?php foreach ($articles as $row): ?>
=======
  <?php //for($p = 0; $p < count($results->data); $p++): ?>  
    
    <?php 
    //store in $movie variable for easier reading
    $row = $results->data[$p]; 
    ?>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
  <div class="profile">
      <div class="card0">
        <a href="profile.php?id=<?php echo $row['username'];?>"><img class="card-img-top" src='<?php echo $row['image_filename']?>' onerror="this.src='images/default.jpg'" alt="Profile Image"> </a>
        <div class="card-footer">
<<<<<<< HEAD
          <a href="profile.php?id=<?php echo $row['username'];?>" class="my-0 py-0 btn btn-default">View Profile</a>
=======
         <center> <a href="profile.php?id=<?php echo $row['username'];?>" class="my-0 py-0 btn btn-default">View Profile</a></center>
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
        </div>
      </div>
      <h4 class="text-center mt-3"><?php echo $row['name'];?></h4>
    </div>
<<<<<<< HEAD
<?php endforeach ?>
    <nav class="text-xs-center" style="margin:auto;">
    <br>
<br>
      <ul class="pagination pagination-sm">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        
        <?php for ($x=1; $x <= $pages; $x++): ?>
        <li class="page-item"><a  class="page-link" href="listing.php?page=<?php echo $x?>&per-page=<?php echo $perPage; ?>"><?php echo $x; ?></a></li>
        <?php endfor; ?>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
=======
<?php //endfor ?>
    <nav class="text-xs-center" style="margin:auto;">
    <br>
<br>
      
        
        <?php echo $paginator->createLinks( $links, 'pagination pagination-sm' );?>
        
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
    </nav>
    
  </div>
</main>
<?php
include_once("footer.php");
?>
