<?php
include_once("header.php");
require 'db.php';

// Initializing Error Variables To Null.
$nameError ="";
$usernameError = "";
$keyError="";
$filenameError = "";

//$imageSuccess = false;
$success = false;
$key = "1n73rn@Hng";

if(isset($_POST['submit']) ){

    //Data Sanitization and Validation
    if($_POST['name'] != ""){
        $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        if ($_POST['name'] == ""){
            $nameError = "<span class='invalid'>Please enter a valid name.</span>";
        }
    }

  if($_POST['image_filename'] != ""){
      $_POST['image_filename'] = filter_var($_POST['image_filename'], FILTER_SANITIZE_URL);
      if ($_POST['image_filename'] == ""){
          $filenameError = "<span class='invalid'>Please enter a proper file URL .</span>";
      }
  }

    // key
    if($_POST['key'] != ""){

        if ($_POST['key'] != "1n73rn@Hng"){
            $keyError = "<span class='invalid'>Please enter a valid key code.</span>";
        }
    }

    // key valid ends
    if($_POST['username'] != ""){
        $_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            if($_POST['username'] == ""){
                $usernameError = "<span class='invalid'>Please enter a valid username</span>";
            }

            $sql = 'SELECT * FROM interns_data WHERE username = "'. $_POST['username'] .'"';
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);

           if(!empty($q->fetchAll())) {
                    $usernameError = "<span class='invalid'>Username already taken, please choose another!</span>";
                }
            else if (!file_exists( 'profiles/' . $_POST['username'] . '.php')) {
                  //$eror = file_exists( 'profiles/' . $_POST['username'] . '.php');
                    $usernameError = "<span class='invalid'>Please create your profile page first using " . $_POST['username'].'.php</span> <p> We cannot find ' . $_POST['username'] .'.php  in the profiles folder. Maybe wait some minutes for autodeploy </p>' ;
            }
         }

    // /** Upload File and Insert Data into Database
    // if ($nameError == "" && $usernameError == "" && $keyError == "") {
    //     //Upload file
    //     $max_size = 500 * 1024; // 500 KB
    //     $destination_directory = "images/";
    //     $validExtensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
    //     $temporary = explode(".", $_FILES["file"]["name"]);
    //     $file_extension = end($temporary);

    //     if ( (($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") ||
    //             ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $validExtensions)) {
    //         if ( $_FILES["file"]["size"] < ($max_size) ) {
    //             if ( $_FILES["file"]["error"] > 0 ) {
    //                 $uploadError = "Error: <strong>" . $_FILES["file"]["error"] . "</strong>";
    //             }
    //             else if (file_exists($destination_directory . $_FILES["file"]["name"]) ) {
    //                 $uploadError = "Error: File <strong>" . $_FILES["file"]["name"] . "</strong> already exists.";
    //             }
    //             else {
    //                 $sourcePath = $_FILES["file"]["tmp_name"];
    //                 $targetPath = $destination_directory . $_FILES["file"]["name"];
    //                 if(move_uploaded_file($sourcePath, $targetPath)) {
    //                     $imageSuccess = true;
    //                 } else {
    //                     $uploadError = "Upload failed";
    //                 }
    //             }
    //         }
    //         else {
    //             $uploadError = "The size of image you are attempting to upload is " . round($_FILES["file"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB";
    //         }
    //     }
    //     else {
    //         $uploadError = "Invalid image format. Allowed formats: JPG, JPEG, PNG.";
    //     } **/

        //if ($imageSuccess) {
            //Insert Data
            if ($nameError == "" && $usernameError == "" && $keyError == "")
            {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $imageName  =  $_POST['image_filename'];

            $intern_data = array(':name' => $name,
                ':username' => $username,
                ':imageName' => $imageName);

            $sql = 'INSERT INTO interns_data ( name, username, image_filename)
                  VALUES (
                      :name,
                      :username,
                      :imageName
                  );';

            try {
                $q = $conn->prepare($sql);
                if ($q->execute($intern_data) == true) {
                    $success = true;
                };
            } catch (PDOException $e) {
                throw $e;
            }
        }
      //  }
    //}
}
?>
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Admin</h1>
                    <span class="subheading">Fill in your details below</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container" id="container">
    <?php if($nameError != "" || $keyError != ""|| $usernameError != "" || $filenameError != "") {
        echo "<div class='alert alert-danger'>Error found, please try again!</div>";
    }?>

    <?php if($success) {
        echo "<div class='alert alert-success'>Successful! Click <a href='profile.php?id=$username'>here</a> to view your profile</div>";
    }?>

    <form action="admin.php" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input required type="text" name="name" class="form-control"  id="name" placeholder="Surname First">
                    <?php if($nameError != "Ajayi Oluwafemi Adeyinka") { echo "<div class='alert alert-danger'>$nameError</div>"; }?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="username">Slack Username:</label>
                    <input required type="text" name="username" class="form-control"  id="username" placeholder="username">
                    <?php if($usernameError != "femithz") { echo "<div class='alert alert-danger'>$usernameError</div>"; }?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="text">Profile Picture</label>
                    <input type="text" name="image_filename" class="form-control" id="image_filename" accept="image/*" required>
                </div>
                <?php if($filenameError != "https://res.cloudinary.com/femithz/image/upload/v1524251386") { echo "<div class='alert alert-danger'>$filenameError</div>"; }?>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="key">Key Code:</label>
                    <input required type="text" name="key" class="form-control"  id="key" placeholder="key code">
                    <?php if($keyError != "1n73rn@Hng") { echo "<div class='alert alert-danger'>$keyError</div>"; }?>
                </div>
            </div>
        </div>

        <input type="submit" name="submit" class="btn btn-primary">
    </form>

</div>


<?php
include_once("footer.php");
?>
