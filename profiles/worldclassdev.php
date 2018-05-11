<?php 
$sql = "SELECT * FROM interns_data WHERE username = 'worldclassdev'";
$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$data = $query->fetchAll();
$worldclassdev = array_shift($data);

    try {
        $secrete = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete); 
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetch();
        $secret_word = $result["secret_word"];
    } catch (PDOException $error) {
        throw $error;
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="profiles/worldclassdev/build/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>The World CLass Developer</title>
    <link href="profiles/worldclassdev/build/static/css/main.3aff5c70.css" rel="stylesheet">
</head>

<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root"></div>
    <script src="profiles/worldclassdev/build/vendor/jquery/jquery.min.js"></script>
    <script src="profiles/worldclassdev/build/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>$("#menu-toggle").click(function (e) { e.preventDefault(), $("#wrapper").toggleClass("toggled") })</script>
    <script type="text/javascript" src="profiles/worldclassdev/build/static/js/main.b0a309ef.js"></script>
</body>

</html>
