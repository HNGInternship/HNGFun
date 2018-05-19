<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebook https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */

require("../libs/config.php");
$pageTitle = "Manage Pages";
$msg = '';
if (isset($_GET["del"]) && $_GET["del"] != "") {
    $sql = "DELETE FROM  " . TABLE_PAGES . " WHERE `page_id` = :id";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":id", db_prepare_input($_GET["del"]));
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if ($stmt->rowCount() > 0) {
        $msg = successMessage("Record deleted successfully");
    } else {
        $msg = errorMessage(mysql_error());
    }
}
include("header.php");
?>   
<?php echo $msg; ?>
<div class="title" style="text-align:right;"><a href="add_edit_page.php">Add Page</a></div>
<table class="bordered">
    <tr>
        <th ><strong>Title</strong> </th>
        <th ><strong>Parent</strong> </th>
        <th ><strong>Sort Order</strong> </th>
        <th><strong>Status</strong> </th>
        <th><strong>Action</strong> </th>
    </tr>
    <?php
    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE 1 ORDER BY page_title ASC, page_id DESC";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
    foreach ($results as $rs) {
        ?>
        <tr>
            <td ><?php echo stripslashes($rs["page_title"]); ?></td>
            <td><?php echo stripslashes(getParentCategoryName($rs["parent"])); ?></td>
            <td><?php echo stripslashes($rs["sort_order"]); ?></td>
            <td><?php echo ($rs["status"] == 'A') ? "Active" : "Inactive"; ?></td>
            <td><a href="add_edit_page.php?edit=<?php echo ($rs["page_id"]); ?>">Edit</a> 
                <a href="manage_pages.php?del=<?php echo ($rs["page_id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a> </td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
include("footer.php");
?>