
<!DOCTYPE html>
<?php
    try {
        $sql = "SELECT * FROM secret_word";
        $secret_word_query = $conn->query($sql);
        $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
        $query_result = $secret_word_query->fetch();

        $sql_queryname = 'SELECT * FROM interns_data WHERE username="Dan"';
        $query_my_intern_db = $conn->query($sql_queryname);
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
<style>

.chat-box {
      display: flex;
      flex-direction: column;
      margin: 50px auto 30px auto;
      border: 1px solid rgba(0, 0, 0, .3);
      border-radius: 30px;
      width: 90%;
      padding-bottom: 10px;
      height: 80%;
    }
.column {
  margin-top: 50px;
    text-align: center;
   float: left;
  
}

.left {
    width: 75%;
}

.right {
    width: 25%;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}
.title {
    color: grey;
    font-size: 18px;
}
.customchat {
    width: auto;
    max-width: 60%;
    text-align: center;
    margin-left: 10%;
    font-size: 18px;
}
.chat-type {
      position: relative;
      bottom: 1px;
      width: 100%;
      margin: 0 auto;
    }

 .chat-msg {
      width: 95%;
      margin: 0 auto;
      outline: none;
      border: 1px solid rgba(0, 0, 0, .3);
      background: transparent;
      position: relative;
      /* position: relative; */
      resize: none;
      padding: 10px;
      padding-right: 75px;
      height: 90px;
      border-radius: 10px;
      font-size: 18px;
}
button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100px;
    font-size: 18px;
}
a {
    text-decoration: none;
    font-size: 18px;
    color: blue;
}
button:hover, a:hover {
    opacity: 0.7;
}
  </style>
<head>
  <title>My Profile</title>
 </head>
<body>
  <div id="mypage" class="row">
    <div class="column left">
      <div>
      <?php
      echo "<h1>" .$name. "</h1>";
      ?>
      </div>
      <div class="title">Web and Mobile Developer</div>
      <div>Hotels.ng Internship</div>
      <div align="center"> <img width="200px" height="200px" src="https://res.cloudinary.com/danuluma/image/upload/v1525636698/hng.jpg"></div>
      <?php
      echo " Username :" .$username. "";
      ?>
      <div>Slack: @Dan</div>
      <div>Github: <a href="https://github.com/danuluma" target="_blank">danuluma</a></div>
      
      <div><a class="button" href="mailto:anericod@gmail.com" target="_blank"><button>Contact</button> </a></div>
    </div>

   <div class="column right" align="center" >

      <form class="chat-box" action="" method="post">   
        <div class="chat-msgs">
          
          <p class="customchat">Want to teach me? Just type and submit:<br> train: question#answer#password</p>
        
        <div class="chat-type">
          <textarea class="chat-msg" name="message" placeholder="Type here..." required></textarea>
          <br>
          <input type="submit">
        </div>
        </div>
      </form>

   </div>
</div>
</body>
</html>