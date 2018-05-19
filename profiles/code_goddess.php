<?php
if(!isset($conn)) {
        include '../../config.php';

        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    }

 // Retrieve user info from interns_data
  try {
    $output = $conn->query("Select * from secret_word LIMIT 1");
    $output = $output->fetch(PDO::FETCH_OBJ);
    $secret_word = $output->secret_word;
  } catch (PDOException $e) {
    die(var_dump($e));
  }

  try {
    $output_1 = $conn->query("select * from interns_data where username = 'code_goddess'");
    $user_info = $output_1->fetch(PDO::FETCH_OBJ);
  } catch (Exception $e) {
    die(var_dump($e));
  }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
    body {
	background-color: lightblue;
}
    div.profile_pic {
        margin: auto;
        border: 1px solid #f2f2f2;
        width: 250px;
    }

    div.profile_pic img {
        width: 100%;
        height: auto;
    }

    div.img_desc {
        padding: 2px;
        text-align: center;


    }

    table {
        width: 100%;
        border: 1px solid black;
        border-radius: 25px;
        margin-top: 10px;
    }

    td {
        text-align: left;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <div class="profile_pic" style="align: center;">
        <img src="<?php echo $user_info->image_filename ?>" alt="Picture of the intern" width="400" height="400">
        <div class="img_desc">
        <p><?php echo $user_info->name ?></p>
        <p>Web Designer and AI enthusiat</p>
        </div>
    </div>

    <table>
        <tr>
            <td>Location:</td>
            <td>Owerri, Imo State</td>   
        </tr>
        <tr>
            <td>Github Url:</td>
            <td><a href="https://github.com/SomtochiAma">Link to Github Page</a></td>
        </tr>
        <tr>
            <td>Programming Languages: </td>
            <td>JS, Python, PHP(in transit)</td>
        </tr>
        <tr>
            <td>Code Name</td>
            <td><?php echo $user_info->username ?></td>
        </tr>
	<tr>
	    <td>Sayings: </td>
	    <td>Let's make magic.....with some codes!
	        We are what we constantly do.</td>
	</tr>

    </table>



</body>

</html>


