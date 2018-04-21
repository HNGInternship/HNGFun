<?php

$sql = "SELECT * FROM `secret_word` LIMIT 1";
$q = $conn->prepare($sql);
$q->execute();
$data = $q->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];

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
        @Tonerolima
      </p>
    </div>
    <div id="positioned">
      <img class="img-thumbnail" src="https://res.cloudinary.com/tonerolima/image/upload/v1523880092/20170909_104232.jpg">
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
        <li>Anthony</li>
        <li>Oyathelmhi</li>
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