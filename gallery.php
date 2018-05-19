<?php
	include('header.php');

	
?>
<header class="masthead" style="background-image: url('img/hero_image.png'); height: 295px;">
	<div class="overlay" style="background-color: #2A3135"></div>
		
</header>



<section class="mx-auto col-md-10">
		
				
			<div class="row">
				
				<div class="col-sm-4 col-md-6 col-lg-8">
					<p>Past Events</p>
				</div>
				<div class="col-sm-8 col-md-6 col-lg-4">
					<p>Filter By:<input type="text" name="filter" class="filter-input"></p>
				</div>

			</div>
			<div class="row">
				<div class="col-sm-4 col-md-6 col-lg-4">
					<p>Past Events</p>
				</div>
				<div class="col-sm-4 col-md-6 col-lg-4">
					<p>Past Events</p>
				</div>
				<div class="col-sm-4 col-md-6 col-lg-4">
					<p>Past Events</p>
				</div>
				 <?php $_SESSION['news_id'] = $result['news_id']; ?>
                     
                       <?php  echo '<a class="newshead" id="button2" href=newsletter.php?news_id='.$result['news_id'].'> '.$result['news_name'].'</a>';
                        echo "<p class='news_content'>".$result['news_content']."</p>";?>
                        </div>
                        <?php } ?>
			</div>

</section>





<?php
	include('footer.php');
?>