<!doctype html>
<?php

    //fetch-store results
    try {
        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_query = 'SELECT * FROM interns_data WHERE username="dautX"';
        $query_my_intern_db = $conn->query($sql_query);
        $query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
        $intern_db_result = $query_my_intern_db->fetch();
   }
   catch (PDOException $exceptionError) {
       throw $exceptionError;
   }

  $secret_word = $query_result['secret_word'];
  $name = $intern_db_result['name'];
  $username = $intern_db_result['username'];
  $image_addr = $intern_db_result['image_filename'];
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
            <p><strong>Username: </strong><?php echo $username; ?> </p>
        </div>

    </body>
</html>
