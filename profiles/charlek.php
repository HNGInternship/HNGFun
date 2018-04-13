 <!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/charlek.css">
</head>
<body>

<div id="frame">
    <div id="timeheading">CHARLEK - THE TIME</div>
    <div id="time">
<?php
    date_default_timezone_set('Africa/Harare');
    $today = date("H:i:s");
    echo $today;
?>
</div>
   <a href="index.php"><div id="refresh">refresh time</div></a>

</div>

</body>
</html> 