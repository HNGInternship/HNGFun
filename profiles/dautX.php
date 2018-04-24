<!doctype html>
<?php
    $server = 'localhost';
    $username = 'root';
    $pswd = '';
    $db = 'hng_fun';

    //connect to hng_fun table
    $conn = mysqli_connect($server, $username, $pswd, $db);

    if(!$conn)
        die("-Could not connect to the database-".mysqli_error());


    //fetch-store results
    $results = mysqli_query($conn, "SELECT * FROM interns_data WHERE intern_id = 15");  //query interns_data
    $resultz = mysqli_query($conn, "SELECT * FROM secret_word");    //query secret_word table


    //store values for profile
    while ($row = mysqli_fetch_assoc($results)) {
        $name =  $row['name'];
        $user_name = $row['username'];
        $image_addr = $row['image_filename'];
    }

    //store values for secret_word
    while ($row = mysqli_fetch_assoc($resultz)) {
        $secret_word = $row['secret_word'];
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>daut.X | Profile</title>

        <style>
            #top{
                height: 40px;
                background-color: #6FCF97;
            }

            #heading{
                height: 30px;
                padding-left: 5px;
            }

            #content{
                background-color: aliceblue;
                min-height: 40px;
                padding: 2px 0px 2px 5px;
                width: 30%;
                border-radius: 5px;
            }

            #pix{
                background-color: #c4c4c4;
                margin: 5px;
                border-radius: 4px;
                height: 400px;
                width: 30%;
            }

        </style>
    </head>

    <body>
        <div id="top"></div>

        <div id="heading" style="clear: both;">
            <h3>Patsoks' Profile</h3>
        </div>

        <div id="pix">
            <img src="<?php echo $image_addr ?>" height="400px" width="100%" alt="Profile image">
        </div>

        <!-- profile info display -->
        <div id="content">
            <p><strong>Name: </strong><?php echo $name; ?></p>
            <p><strong>Username: </strong><?php echo $user_name; ?> </p>
        </div>

    </body>
</html>
