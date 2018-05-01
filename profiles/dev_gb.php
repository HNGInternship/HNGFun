<?php
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
$username = "dev_gb";
$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' LIMIT 1 ");
$my_data = $data->fetch(PDO::FETCH_BOTH);
$name = $my_data['name'];
$img = $my_data['image_filename'];
$username =$my_data['username'];

function decifer($string){
  
  if (strpos($string, ":") !== false)
  {
    $field = explode (":", $string, 2);
    $key = $field[0];
    $key = strtolower(preg_replace('/\s+/', '', $key));
  if(($key == "train")){
     $password ="password";
     $trainer =$field[1];
     $result = explode ("#", $trainer);
  if($result[2] && $result[2] == $password){
    echo"<br>Training mode<br>";
    return $result;
  } 
  else echo "opssss!!! Looks like you are trying to train me without permission";   
  }
   }
}


function assistant($string)
 {  
    $reply = "";
    
    if ($string == 'what is the capital of Lagos') {
      $reply =var_export('The capital of Lagos is Ikeja');
      return $reply;
        
    }
    elseif ($string == 'what is the capital of Ogun') {
      $reply =var_export('The capital of Ogun is Abeokuta');
      return $reply;
        
    }
    elseif ($string == 'what is the capital of Oyo') {
      $reply =var_export('The capital of Oyo is Ibadan');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Ondo') {
      $reply =var_export('The capital of Ondo is Akure');
      return $reply;     
    }
   elseif ($string == 'what is the capital of Imo') {
       
      $reply =var_export('The capital of Imo is Owerri');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Akwa-Ibom') { 
      $reply =var_export('The capital of Akwa-Ibom is Uyo');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Adamawa') { 
      $reply =var_export('The capital of Adamawa is Yola');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Ekiti') { 
      $reply =var_export('The capital of Ekiti is Ado-Ekiti');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Bauchi') { 
      $reply =var_export('The capital of Bauchi is Bauchi');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Bayelsa') { 
      $reply =var_export('The capital of Bayelsa is Yenagoa');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Abia') { 
      $reply =var_export('The capital of Abia is Umuahia');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Anambra') { 
      $reply =var_export('The capital of Anambra is Awka');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Borno') { 
      $reply =var_export('The capital of Borno is Maiduguiri');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Cross-River') { 
      $reply =var_export('The capital of Cross-River is Calabar');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Delta') { 
      $reply =var_export('The capital of Delta is Asaba');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Benue') { 
      $reply =var_export('The capital of Benue is Makurdi');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Edo') { 
      $reply =var_export('The capital of Edo is Benin');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Enugu') { 
      $reply =var_export('The capital of Enugu is Enugu');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Kebbi') { 
      $reply =var_export('The capital of Kebbi is Birnin Kebbi');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Katsina') { 
      $reply =var_export('The capital of Katsina is Katsina');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Kano') { 
      $reply =var_export('The capital of Kano is Kano');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Kaduna') { 
      $reply =var_export('The capital of Kaduna is Kaduna');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Jigawa') { 
      $reply =var_export('The capital of Dutse is Dutse');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Kwara') { 
      $reply =var_export('The capital of Kwara is Ilorin');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Gombe') { 
      $reply =var_export('The capital of Gombe is Gombe');
      return $reply;     
    }
    elseif ($string == 'what is the capital of Nasarawa') { 
      $reply =var_export('The capital of Nasarawa is Lafia');
      return $reply;     
    }
    else {
        $reply = "Please enter a valid question";
        return $reply;
    }
}

$existError =false;
$reply = "";//process starts
if($_SERVER['REQUEST_METHOD'] === 'POST'){ 

  if ($_POST['msg'] == 'Help') {
    $reply = 'These is a sample format of a question <p>what is the capital of Lagos</br>For compound names separate with a dash </br>e.g what is the capital of Ado-Ekiti</p>';
    echo $reply;
  } 
      if($reply==""){
       $reply = assistant($_POST['msg']);
       echo $reply;
       
     }
$reply=="";
$testfor = "train";
if(substr( $reply, 0, strlen($testfor) ) === "train") {

    $post= $_POST['msg'];
    $result = decifer($post);
    if($result){
      $question=$result[0]; 
      $answer= $result[1];
      $sql = "SELECT * FROM chatbot WHERE question = '$question' And answer = '$answer'";
      $stm = $conn->query($sql);
      $stm->setFetchMode(PDO::FETCH_ASSOC);

      $result = $stm->fetchAll();
        
        if (count(($result))> 0) {
              
          // while($result) {
          //   $strippedQ = strtolower(preg_replace('/\s+/', '', $question));
          //   $strippedA = strtolower(preg_replace('/\s+/', '', $answer));
          //   $strippedRowQ = strtolower(preg_replace('/\s+/', '', $result['question']));
          //   $strippedRowA = strtolower(preg_replace('/\s+/', '', $result['answer']));
          //   if(($strippedRowQ == $strippedQ) && ($strippedRowA == $strippedA)){
          //   $reply = "I know this already, but you can make me smarter by giving another response to this command";
          //   $existError = true;
          //   break;
            
          //   }
              
          // }  
          $existError = true; 
          echo "I know this already, but you can make me smarter by giving another response to this command";
            
        } 
      else
        if(!($existError)){
          $sql = "INSERT INTO chatbot(question, answer) VALUES(:quest, :ans)";
          $stm =$conn->prepare($sql);
          $stm->bindParam(':quest', $question);
          $stm->bindParam(':ans', $answer);

          $saved = $stm->execute();
            
          if ($saved) {
              echo  "I am smarter now";
          } else {
              echo "oops, I could not execute your command";
          }
            
          
        }  
  }
  else{
    $input = trim($post); 
 
  if($input){
    
    $sql = "SELECT * FROM chatbot WHERE question = '$input'";
    $stm = $conn->query($sql);
    $stm->setFetchMode(PDO::FETCH_ASSOC);

    $res = $stm->fetchAll();
    
    if (count($res) > 0) {
    
      $index = rand(0, count($res)-1);
      $response = $res[$index]['answer'];  

      echo $response;
    
    }
    else{
       echo "";
    }       
  }
}
          
      
    
      }       
  
 

}
    else{
       echo "";
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>dev_gb</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>



<style type="text/css">
  *, *:after, *:before {
  -moz-box-sizing:border-box;
  box-sizing:border-box;
  -webkit-font-smoothing:antialiased;
  font-smoothing:antialiased;
  text-rendering:optimizeLegibility;
}

html {
  font-size:75%;
}
body {
  font: 400 normal 14px/1.4 'Lato', sans-serif;
  color: #000000;
  background: #F0F0F0;
}

.clear:before,
.clear:after {
   content: ' ';
   display: table;
}

.clear:after {
    clear: both;
}
.clear {
    *zoom: 1;
}
img {
  width: 100%;
  vertical-align: bottom;
}
a, a:visited {
  color: #2895F1;
  text-decoration: none;
}
a:hover, a:focus {
  text-decoration: none;
}
a:focus {
  outline: 1;
}

/*------------------------------------*\
    Structure
\*------------------------------------*/

.wrapper {
  width: 100%;
}

.content {
  width: 736px;
  height: 560px;
  margin: 40px auto;
  border-radius: 10px;
  box-shadow: 0 15px 30px 5px rgba(0,0,0,0.4);
}

.sidebar {
  float: left;
  width: 100%;
  max-width: 296px;
  height: 100%;
  background: #F0F0F0;
  border-radius: 10px 0 0 10px;
}

.chatbox {
  position: relative;
  float: left;
  width: 100%;
  max-width: 440px;
  height: 100%;
  background: #fdfdfd;
  border-radius: 0 10px 10px 0;
  box-shadow: inset 20px 0 30px -20px rgba(0, 0, 0, 0.6);
}

/*------------------------------------*\
    Sidebar
\*------------------------------------*/


/* Contact List */

.contact-list {
  margin: 0;
  padding: 0;
  list-style-type: none;
  height: 100%;
  max-height: 460px;
  overflow-y: hidden;
}


.contact-list .person {
  position: relative;
  padding: 12px 0;
  border-bottom: 1px solid rgba(112,108,114,0.3);
  cursor: pointer;
}


.contact-list .person.active:after {
  content: '';
  display: block;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
  border-right: 4px solid #0bf9c7;
  box-shadow: inset -4px 0px 4px -4px #0bf9c7;
}

.person .avatar img {
  width: 200px;
  margin-left: 25px;
  border-radius: 100%;
}

.person .avatar {
  position: relative;
  display: inline-block;
}

.person .avatar .status {
  position: absolute;
  right: 6px;
  bottom: 0;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #F0F0F0;
  border: 4px solid #222; 
}

.person .avatar .status.online {
  background: #0bf9c7;
}

.person .avatar .status.away {
  background: #f4a711;
}

.person .avatar .status.busy {
  background: #f42464;
}

.person .info {
  display: inline-block;
  width: auto;
  padding: 0 0 0 10px; 
  font-size: 16px;
  font-style: italic;
}

.person .name, .person .status-msg {
  display: inline-block;
  width: auto; 
}

.person .name {
  color: #FFFFFF;
  font-size: 17px;
  font-size: 1.7rem;
  font-weight: 700;
}

.person .status-msg {
  width: 180px;
  font-size: 14px;
  font-size: 1.4rem;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}



/*------------------------------------*\
    Chatbox
\*------------------------------------*/

.chatbox {
  color: #a0a0a0;
}

/* Chatbox header */

.chatbox .person {
  position: relative;
  margin: 12px 20px 0 0;
  padding-bottom: 12px;
  border-bottom: 1px solid rgba(112,108,114,0.2);
}

.chatbox .person .avatar .status {
  border-color: #fff;
}

.chatbox .person .info {
  width: 290px;
  padding-left: 20px;
}

.chatbox .person .name {
  color: #a0a0a0;
  font-size: 19px;
  font-size: 1.9rem;
}

.chatbox .person .login-status {
  display: block;
}

/* Chatbox messages */

.chatbox-messages {
  margin: 20px 20px 0 44px;
  height: 376px;
  overflow-y: overlay;
}

.chatbox-messages .avatar {
  float: left;
}

.chatbox-messages .avatar img {
  width: 56px;
    border-radius: 50%;
}

.chatbox-messages .message-container {
  position: relative;
  float: right;
  width: 320px;
  padding-left: 10px;
}

.chatbox-messages .message {
  display: inline-block;
  max-width: 260px;
  margin-bottom: 12px;
  border: 1px solid #dedede;
  border-radius: 25px;
}

.chatbox-messages .sender .message {
  background: #fff;
}

.chatbox-messages .user .message {
  background: #dedede;
}

.chatbox-messages .sender .message-container:first-child .message {
  border-radius: 0 50px 50px 50px;
}

.chatbox-messages .user .message-container:first-child .message {
  border-radius: 50px 0 50px 50px;
}

.chatbox-messages .message p {
  margin: 14px 24px;
  font-size: 11px;
  font-size: 1.1rem;
}

.chatbox-messages .delivered {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 10px;
  font-size: 1.0rem;
}

/* Chatbox message form */

.message-form-container {
  width: 400px;
  height: 74px;
  position: absolute;
  left: 0;
  bottom: 0;
  margin: 0 20px;
  border-top: 1px solid rgba(112,108,114,0.2);
}

.message-form textarea {
  width: 290px;
  margin: 6px 0 0 24px;
  resize: none;
  border: 0;
  color: #a0a0a0;
  outline: 0;
}

.message-form textarea::-webkit-input-placeholder { color: #a0a0a0; }
.message-form textarea::-moz-placeholder { color: #a0a0a0;  }
.message-form textarea::-ms-placeholder { color: #a0a0a0; }
.message-form textarea:-moz-placeholder { color: #a0a0a0; }

.message-form textarea:focus::-webkit-input-placeholder { color: transparent; }
.message-form textarea:focus::-moz-placeholder { color: transparent;  }
.message-form textarea:focus::-ms-placeholder { color: transparent; }
.message-form textarea:focus:-moz-placeholder { color: transparent; }

/*------------------------------------*\
    Contacts List - Custom Scrollbar
\*------------------------------------*/
</style>
</head>


                <div class="content">

                  <div class="sidebar">

                <br><br>

                    <div class="contacts">

                   <li class="person">
                          <span class="avatar">
                            <img src="http://res.cloudinary.com/devgeaks/image/upload/v1523731563/2017-03-02_08.30.03.jpg" alt="Sacha Griffin" />
                            <span class="status online"></span>
                          </span>
                          <span class="info">
                            <br/>
                            “My name is Akinduko Olugbenga.<br/><br/>I enjoy meeting new people and finding ways to help them have an uplifting experience.<br/><br/>I have had a variety of Software development opportunities, through which I was able to solve real life problems.<br/><br/>Would you like to reach me? Drop a message” 
                        </span>
                        </li>
                      </ul><!-- /.contact-list -->

                    </div><!-- /.contacts -->

                  </div><!-- /.sidebar -->

                  <div class="chatbox">

                    <div class="person">
                      <span class="info">
                       <span class="login-status">Online    | <?php
            echo "" . date("h:i:a");
            ?>, <?php
            
            $ip=$_SERVER['REMOTE_ADDR'];
            $reply = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
            echo var_export('Glad to have a vistor from '. $reply['geoplugin_regionName'] .','.$reply['geoplugin_countryName'] );
            ?></span>
                        
                      </span>
                    </div><!-- /.person -->
                <script>
            $(document).ready(function(){
            var hiddenDiv = $(".messages");
            var show = function() {
            hiddenDiv.fadeIn();
            play();

            };

            hiddenDiv.hide();
            setTimeout(show, 2000);


            });
                </script>
                    <div class="chatbox-messages" >
                      <div class="messages clear"><span class="avatar"><img src="https://store.storeimages.cdn-apple.com/4974/as-images.apple.com/is/image/AppleInc/aos/published/images/H/LJ/HLJ02/HLJ02?wid=572&hei=572&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1503083822390" alt="Support" /></span><div class="sender"><div class="message-container"><div class="message"><p>
                      Welcome to Dev_GB's profile page <i class="em em-sunglasses"></i> How can i be of help to you? <i class="em em-smiley"></i></p>
                              <p>Tips: Type "Help' to see FAQ.<br>To train use the format: train#Question#Answer#Password</p>
                              </div><span class="delivered">
                                <?php echo "" . date("h:i:a");?>
                                  
                                </span>
                              </div>
                    </div>
                    </div>
                            <div class="push"></div>

                    </div><!-- /.chatbox-messages -->


                    <div class="message-form-container">

                      <script type="text/javascript">

                                  $(document).ready(function(){
               $('#msg').keypress(
                function(e){
                    if (e.keyCode == 13) {
                        e.preventDefault();
                        var msg = $(this).val();
                  $(this).val('');
                        if(msg !== '' )
                  $('<div class="messages clear"><div class="user"><div class="message-container"><div class="message"><p>'+msg+'</p></div><span class="delivered"><?php
            echo "" . date("h:i:a");
            ?></span></div></div><!-- /.user --></div>').insertBefore('.push');
                  

                  formSubmit();

                    }

                function formSubmit(){
                var message = $("#msg").val();
                    var dataString = 'msg=' + msg;
                    jQuery.ajax({
                        url: "/profiles/dev_gb.php",
                        data: dataString,
                        type: "POST",
                         cache: false,
                             success: function(response) {
            setTimeout(function(){
                     $(' <div class="messages clear"><p>'+response+'</p></div><span class="delivered"><?php
            echo "" . date("h:i:a");
            ?></span></div>').insertBefore('.push');
                  
                  play();
                },  1000);

                  },
                        error: function (){}
                    });
                return true;
                }
                    });
            });
             
            </script>

                      <form class="message-form" method="POST" action="" >
                        <textarea id="msg" name="msg" value=""  placeholder="Type a message here..."></textarea>
                          </form><!-- /.search-form -->


                    </div><!-- /.message-form-container -->

                  </div><!-- /.chatbox -->


        </div>
      </div>
      <!-- /.row -->

    

    </div>

</html>