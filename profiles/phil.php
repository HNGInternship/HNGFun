<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tobi</title>

<?php 
		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'phil'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>


<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .profile-h1 {
    text-align: center;
    font-size: 25px;
    margin-top: 40px;
    margin-bottom: -30px;
  }
  .profile-card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-top: 70px;
}
.profile-image {
  height: 70%;
  width: 100%;
}
.profile-title {
  color: black;
  font-size: 30px;
  font-family: 'Open Sans Condensed';
  margin-top: 15px;
}
.prop-username {
  letter-spacing: 1px;
  font-size: 15px;
}
.prop-name {
  padding-bottom: 40px;
  letter-spacing: 1px;
  font-size: 15px;
}
.profile-name {
  font-family: 'Open Sans Condensed';
  font-size: 30px;
}
  </style>
</head>

<main id="profileContainer" class="container">
          <h1 class="profile-h1">My Profile</h1>
          <div class="profile-card">
            <img src="<?php echo $image_url ?>" alt="Phil" class="profile-image" />
            <p class="profile-title">Username</p>
            <p>
            <?php
              echo $username;
            ?>
            </p>
            <p class="profile-name">Name</p>
            <p class="prop-name"><?php
              echo $name;
            ?>  </p>
          </div>
        </main>

