<?php

$username = "tonerolima";

$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data_` WHERE `username`='$username'";
$sql0 = "SELECT * FROM `secret_word` LIMIT 1";
$stmt0 = $conn->prepare($sql0);
$stmt0->execute();
$data = $stmt0->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<html>
<head>
  <title>Anthony Oyathelemhi</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300i,400,700" rel="stylesheet">
  <style type="text/css">
    body {
      font-family: 'Fira Sans', sans-serif;
      font-size: 25px;
      color: rgb(120, 120, 120);
    }

    .main {
      width: 1300px;
      height: 500px;
      margin: 50px auto;
      padding-top: 2rem;
    }

    #fixed {
      display: inline-block;
      height: 100px;
      width: 1200px;
      border-radius: .25rem;
      background: rgb(120, 120, 120);
      text-align: right;

    }

    p {
      color: #fff;
      font-weight: 700;
      font-size: 65px;
      margin-right: 150px;
      letter-spacing: .5rem;
      text-transform: capitalize;
    }

    #positioned {
      position: absolute;
      top: 200px;
      width: 1150px;
      padding-left: 3%;

    }

    img {
      width: 450px;
      max-height: 450px;
      float: left;
      box-sizing: content-box;
    }

    ul {
      list-style: none;
    }

    a {
      color: #fff !important;
    }

    a:hover {
      text-decoration: none;
    }

    #second_list {
      font-style: italic;
      font-weight: 300;
    }

    .list_items {
      float: left;
      font-weight: 400;
      margin-top: 50px;
    }

  </style>
</head>
<body>
  <div class="main">
    <div id="fixed">
      <p>
        @<?php echo $result["username"]; ?>
      </p>
    </div>
    <div id="positioned">
      <img class="img-thumbnail" src="<?php echo $result["image_filename"] ?>">
      <ul class="list_items">
        <li>First Name:</li>
        <li>Last Name:</li>
        <li>Other Names:</li>
        <li>Nationality:</li>
        <li>State:</li>
        <li>Current City:</li>
        <li>Phone Number:</li>
        <li>Email Address:</li>
        <li>Specializations:</li>
      </ul>
      <ul class="list_items" id="second_list">
        <li><?php echo substr($result["name"], stripos($result["name"], " "))?></li>
        <li><?php echo substr($result["name"], 0, stripos($result["name"], " ")) ?></li>
        <li>Oghenakhogie</li>
        <li>Nigerian</li>
        <li>Edo</li>
        <li>Lagos</li>
        <li>07081627814</li>
        <li>tonero91@gmail.com</li>
        <li>Web Development <br>Oracle Database Administration <br>Linux System Administration </li>
      </ul>
    </div>

  </div>

</body>
</html>