<<<<<<< HEAD
<?php

require("../libs/config.php");

$pageTitle = "Manage Tagline for home page";
$msg = '';
if (isset($_POST["sub"])) {


    $id = db_prepare_input($_POST["id"]);
    $tagline2 = db_prepare_input($_POST["tagline2"]);
    $tagline1 = db_prepare_input($_POST["tagline1"]);

    if ($tagline2 <> "" && $tagline1 <> "" && $id <> "") {
        $sql = "UPDATE " . TABLE_TAGLINE . " SET  `tagline1` = :tg1, `tagline2` = :tg2 WHERE `id` = :id ";

        try {
            $stmt = $DB->prepare($sql);
            $stmt->bindValue(":tg1", $tagline1);
            $stmt->bindValue(":tg2", $tagline2);
            $stmt->bindValue(":id", $id);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $msg = successMessage("Record updated successfully");
            } else if ($stmt->rowCount() == 0) {
                    $msg = successMessage("No changes affected");
            } else {
                $msg = errorMessage("Failed to update record");
            }
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
    } else {
        $msg = errorMessage("All fields are mandatory");
    }
}
include("header.php");
try {
    $stmt = $DB->prepare("SELECT * FROM " . TABLE_TAGLINE . " WHERE 1 LIMIT 1");
    $stmt->execute();
    $details = $stmt->fetchAll();
} catch (Exception $ex) {
    echo errorMessage($ex->getMessage());
}
?>   
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<?php echo $msg; ?>
<div class="formField">      
    <form method="post" action="" name="pages">
        <input type="hidden" name="id" value="<?php echo $details[0]["id"]; ?>"  />
        <table id="tableForm">
            <tr>
                <td class="formLeft"><span class="required">*</span>Tagline1: </td>
                <td><input type="text" name="tagline1" id="tagline1" class="textboxes" value="<?php echo stripslashes($details[0]["tagline1"]); ?>" autocomplete="off" /> </td>
            </tr>
            <tr>
                <td class="formLeft"><span class="required">*</span>Tagline2: </td>
                <td><input type="text" name="tagline2" id="tagline2" class="textboxes" value="<?php echo stripslashes($details[0]["tagline2"]); ?>" autocomplete="off" /> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="submit" name="sub" value="Save" /> &nbsp;  <input type="button" name="" onclick="javascript:window.location = 'home.php';" value="back to home" /> </td>
            </tr>       
        </table>
    </form>
</div>

<?php
include("footer.php");
?>
=======
<?php

require("../libs/config.php");

$pageTitle = "Manage Tagline for home page";
$msg = '';
if (isset($_POST["sub"])) {


    $id = db_prepare_input($_POST["id"]);
    $tagline2 = db_prepare_input($_POST["tagline2"]);
    $tagline1 = db_prepare_input($_POST["tagline1"]);

    if ($tagline2 <> "" && $tagline1 <> "" && $id <> "") {
        $sql = "UPDATE " . TABLE_TAGLINE . " SET  `tagline1` = :tg1, `tagline2` = :tg2 WHERE `id` = :id ";

        try {
            $stmt = $DB->prepare($sql);
            $stmt->bindValue(":tg1", $tagline1);
            $stmt->bindValue(":tg2", $tagline2);
            $stmt->bindValue(":id", $id);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $msg = successMessage("Record updated successfully");
            } else if ($stmt->rowCount() == 0) {
                    $msg = successMessage("No changes affected");
            } else {
                $msg = errorMessage("Failed to update record");
            }
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }
    } else {
        $msg = errorMessage("All fields are mandatory");
    }
}
include("header.php");
try {
    $stmt = $DB->prepare("SELECT * FROM " . TABLE_TAGLINE . " WHERE 1 LIMIT 1");
    $stmt->execute();
    $details = $stmt->fetchAll();
} catch (Exception $ex) {
    echo errorMessage($ex->getMessage());
}
?>   
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<?php echo $msg; ?>
<div class="formField">      
    <form method="post" action="" name="pages">
        <input type="hidden" name="id" value="<?php echo $details[0]["id"]; ?>"  />
        <table id="tableForm">
            <tr>
                <td class="formLeft"><span class="required">*</span>Tagline1: </td>
                <td><input type="text" name="tagline1" id="tagline1" class="textboxes" value="<?php echo stripslashes($details[0]["tagline1"]); ?>" autocomplete="off" /> </td>
            </tr>
            <tr>
                <td class="formLeft"><span class="required">*</span>Tagline2: </td>
                <td><input type="text" name="tagline2" id="tagline2" class="textboxes" value="<?php echo stripslashes($details[0]["tagline2"]); ?>" autocomplete="off" /> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="submit" name="sub" value="Save" /> &nbsp;  <input type="button" name="" onclick="javascript:window.location = 'home.php';" value="back to home" /> </td>
            </tr>       
        </table>
    </form>
</div>

<?php
include("footer.php");
?>
>>>>>>> aca03ae9fbd8ae27fe330a2c33c832630d7e8199
