<?php

if(isset($_GET['question'])) {
    echo $_GET['question'];
    return;
  }

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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    
    
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

    /*Styling for the chatbot */
    .chatbox {
        border: 1px solid black;
        background-color: lightpink;
        padding: 10px;
        margin: 10px 0;

    }

    .two {
        border: 1px solid pink;
        background-color: #ccc;
    }

    .chatbox::after {
        content: " ";
        clear: both;
        display: table;
    }

    .chatbox img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .chatbox img.right {
        float: right;
        margin-left: 20px;
        margin-right: 0;
    }

    .textbox {
        height: 10px;
        padding: 10px;
        width: 60%;
    }

    #sendbtn {
        height: 30px;
        border: 5px solid lightpink;
        background-color: lightpink;
        padding: 5px;
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

     
    <!--Html for the chatbot -->
    <h2>The Storm bot</h2>
    <div class="chatbox">
        <img src="angel.jpg" alt="Storm bot's picture">
        <p>Hi! Am StormBot! and you can train me too! </p>
    </div>
    <div class="chatbox two">
        <img src="profile.jpg" alt="profile_picture" class="right">
        <p>Hey StormBot, am excited to meet you </p>
    </div>
    <input type="text" style="float:left" class="textbox" id="chat">
    <input type="Submit" value="Send" id="sendbtn" onclick="alertchat()">
    <p id="content"></p>

    <script type="text/javascript">
    /*function alertmsg() {
        alert("I am clicked");
    }*/

    function alertchat() {
        var chat = document.getElementById("chat").value;
        alert (chat);
    }

    /*var chat = document.getElementById("chat").value;

    $(document).ready(function() {
        $("#sendbtn").click(function() {
            $.get("code_goddess.php", function(data, status) {
                alert( "Data: " + data + "Status: " + status);
                document.getElementById("content").innerHTML = data;
            });
        });
    });*/
    var chat = document.getElementById("chat").value;
       
    $(document).ready(function() {
        $("#sendbtn").click(function() {
            $.ajax({url: "code_goddess.php", question: chat, success: function(result) {
                alert(result);
            }});
        });
    });
     
    </script>

</body>

</html>



