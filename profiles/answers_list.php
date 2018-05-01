<?php
include_once("header.php");
require 'db.php';

$sql = 'SELECT * FROM chatbot';
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$data = $q->fetchAll();


?>
<header class="masthead" style="background-image: url('img/about-bg.jpg')">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
               <h1>Added questions</h1>
               <span class="subheading">List of Questions</span>
            </div>
        </div>
    </header>

  <div class="container" id="container">


   <?php $num = 1;?>
   <table class="table table-bordered">
   <thead>
   <tr>
   <th>S/N</th>
   <th>Question</th> 
   <th>Answer</th>
 </tr>
   </thead>
   <?php foreach ($data as $key) { ?>
    <tr>
    <td><?=$num ?></td>
    <td><?=$key["question"] ?></td>
    <td><?=$key["answer"] ?></td>
     </tr>
      <?php $num++;?> 

   <?php } ?>
   </table>


</div>





<?php
include_once("footer.php");
?>
