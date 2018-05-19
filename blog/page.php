<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebook https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */

require("libs/config.php");
$page = easy_decrypt($_GET["id"]);
$pageDetails = getPageDetailsByName($page);
include("header.php");
?>
<div class="row main-row">
    <div class="8u">
        <section class="left-content">
             <h2><?php echo stripslashes($pageDetails["page_title"]); ?></h2>
            <?php echo stripslashes($pageDetails["page_desc"]); ?>
        </section>
    
    </div>
    <!--sidebar starts-->
	<?php
	include("sidebar.php");
	?>    
    <!--sidebar ends-->
</div>
<?php
include("footer.php");
?>