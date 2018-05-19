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



function assistant($string)
 {  
    $reply = "";
    if ($string == 'What is the capital of Lagos?') {
      $reply = "The capital of Lagos is Ikeja";
      return $reply;
        
    }
    elseif ($string == 'What is the capital of Ogun?') {
      $reply ="The capital of Ogun is Abeokuta";
      return $reply;
        
    }
    elseif ($string == 'What is the capital of Oyo?') {
      $reply = "The capital of Oyo is Ibadan";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Ondo?') {
      $reply = "The capital of Ondo is Akure";
      return $reply;     
    }
   elseif ($string == 'What is the capital of Imo?') {
       
      $reply = "The capital of Imo is Owerri";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Akwa-Ibom?') { 
      $reply = "The capital of Akwa-Ibom is Uyo";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Adamawa?') { 
      $reply ="The capital of Adamawa is Yola";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Ekiti?') { 
      $reply ="The capital of Ekiti is Ado-Ekiti";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Bauchi?') { 
      $reply = " The capital of Bauchi is Bauchi";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Bayelsa?') { 
      $reply = "The capital of Bayelsa is Yenagoa";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Abia?') { 
      $reply = "The capital of Abia is Umuahia";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Anambra?') { 
      $reply = "The capital of Anambra is Awka";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Borno?') { 
      $reply = "The capital of Borno is Maiduguiri";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Cross-River?') { 
      $reply = "The capital of Cross-River is Calabar";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Delta?') { 
      $reply = "The capital of Delta is Asaba";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Benue?') { 
      $reply ="The capital of Benue is Makurdi";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Edo?') { 
      $reply ="The capital of Edo is Benin";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Enugu?') { 
      $reply ="The capital of Enugu is Enugu";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Kebbi?') { 
      $reply ="The capital of Kebbi is Birnin Kebbi";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Katsina?') { 
      $reply ="The capital of Katsina is Katsina";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Kano?') { 
      $reply ="The capital of Kano is Kano";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Kaduna?') { 
      $reply ="The capital of Kaduna is Kaduna";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Jigawa?') { 
      $reply = "The capital of Dutse is Dutse";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Kwara?') { 
      $reply ="The capital of Kwara is Ilorin";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Gombe?') { 
      $reply ="The capital of Gombe is Gombe";
      return $reply;     
    }
    elseif ($string == 'What is the capital of Nasarawa?') { 
      $reply ="The capital of Nasarawa is Lafia";
      return $reply;     
    }
    else {
        $reply = 'Non' ;
        return $reply;
    }
}

$existError =false;
$check = "";//process starts

if($_SERVER['REQUEST_METHOD'] === 'POST'){ 

  if ($_POST['msg'] == 'Help') {
      help();
  } 
  if($check==""){
       $reply = assistant($_POST['msg']);

       if ($reply === 'Non' ){
            $post= $_POST['msg'];
            $input = trim($post); 
 
            if($input){
    
                  $sql = "SELECT * FROM chatbot WHERE question = '$input'";
                  $stm = $conn->query($sql);
                  $stm->setFetchMode(PDO::FETCH_ASSOC);

                  $res = $stm->fetchAll();
                  
              if (count($res) > 0) {
                  
                    $index = rand(0, count($res)-1);
                    $feed = $res[$index]['answer'];  

                    echo "<div id='result'>".$feed."</br></br></div>";
                  
                  }
              else{
              echo "<div id='result'>     Tips: Type 'Help' to see FAQ. </br> To add new states ==> 'Train:Question#answer#password</br>'</div>";
                  }       
                }

       }
       else {
       echo "<div id='result'>".$reply."</br></br></div>"; 
       }
       
     }
    $data  = $_POST[ 'msg' ];
    $temp  = explode( ':', $data );
    $temp2 = preg_replace( '/\s+/', '', $temp[0] );
  if( $temp2  === "Train") {
    train( $temp[1] );
      }       

}
else{
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js" type="text/javascript" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>

  

<title>dev_gb</title>  

<style type="text/css" >

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
  height: auto;
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
<body>
                <div class="content">

                  <div class="sidebar">

                </br></br>

                    <div class="contacts">

                   <li class="person">
                          <span class="avatar">
                            <img src="http://res.cloudinary.com/devgeaks/image/upload/v1523731563/2017-03-02_08.30.03.jpg" alt="Sacha Griffin" />
                            <span class="status online"></span>
                          </span>
                          <span class="info">
                            <br/>
                            “My name is Akinduko Olugbenga.<br/><br/>I enjoy meeting new people and finding ways to help them have an uplifting experience.<br/><br/>I have had a variety of Software development opportunities, through which I was able to solve real life problems.<br/>” 
                        </span>
                        </li>
                      </ul><!-- /.contact-list -->

                    </div><!-- /.contacts -->

                  </div><!-- /.sidebar -->

                  <div class="chatbox">

                    <div class="person">
            <span class="info">
            <span class="login-status">Online    | <?php echo "" . date("h:i:a"); ?>, 
            <?php
            
            $ip=$_SERVER['REMOTE_ADDR'];
            $reply = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
            echo var_export('Glad to have a vistor from '. $reply['geoplugin_regionName'] .','.$reply['geoplugin_countryName'] );
            ?>
            </span>
            </span>
                    </div><!-- /.person -->
            <script>
            $(document).ready(function(){
            var hiddenDiv = $(".messages");
            var show = function() {
            hiddenDiv.fadeIn();
            };
            hiddenDiv.hide();
            setTimeout(show, 2000);
            });
            </script>
                    <div class="chatbox-messages" >
                      <div class="messages clear"><span class="avatar"><img src="https://store.storeimages.cdn-apple.com/4974/as-images.apple.com/is/image/AppleInc/aos/published/images/H/LJ/HLJ02/HLJ02?wid=572&hei=572&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1503083822390" alt="Support" /></span><div class="sender"><div class="message-container"><div class="message"><p>
                      Welcome to Dev_GB's profile page</br>You can check State capitals by just asking.</p>
                              <p></br>Tips: Type "Help' to see FAQ.</br>To add new states ==> 'Train:Question#answer#password'</p>
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
            $('<div class="messages clear"><div class="user"><div class="message-container"><div class="message"><p>'+msg+'</p></div><span class="delivered"> <?php echo "<b>You  </b>" . date("h:i:a"); ?> </span></div></div></div>').insertBefore('.push');
            $('.chatbox-messages').scrollTop($('.chatbox-messages')[0].scrollHeight);

                  formSubmit();

                    }

                function formSubmit(){
                var message = $("#msg").val();
                    var dataString = 'msg=' + msg;
                    $.ajax({
                        url: "profile.php?id=dev_gb",
                        data: dataString,
                        type: "POST",
                         cache: false,
      success: function(response) {
                              
          var result = $($.parseHTML(response)).find('#result').text();
            setTimeout(function(){
          $(' <div class="messages clear"><span class="avatar"><img style="height:50px; width:50px;" src="https://store.storeimages.cdn-apple.com/4974/as-images.apple.com/is/image/AppleInc/aos/published/images/H/LJ/HLJ02/HLJ02?wid=572&hei=572&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1503083822390"/></span><div class="sender"><div class="message-container"><div class="message"><p>'+result+'</p></div><span class="delivered"> <?php echo "<b>Support  </b>" . date("h:i:a"); ?></span></div>').insertBefore('.push');
          $('chatbox-messages').animate({ scrollTop: $('chatbox-messages').get(0).scrollHeight }, 1500);
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



                </div><!-- /.content -->

              </div><!-- /.wrapper -->


        </div>
      </div>
      <!-- /.row -->

    

    </div>        

  </body>

</html>
<?php 
}
function help() {
   $help = "These are question sample formats  1.What is the capital of Lagos?  2.What is the capital of Akwa-Ibom?";
    echo "<div id='result'>".$help. "</br></div>";
}
function train($input) {
    $input    = explode( '#', $input );
    $question = trim( $input[ 0 ] );
    $answer   = trim( $input[ 1 ] );
    $password = trim( $input[ 2 ] );
    if ( $password == 'password' ) {
        $sql = 'SELECT * FROM chatbot WHERE question = "' . $question . '" and answer = "' . $answer . '" LIMIT 1';
        $q   = $GLOBALS[ 'conn' ]->query( $sql );
        $q->setFetchMode( PDO::FETCH_ASSOC );
        $data = $q->fetch();
        if ( empty( $data ) ) {
            $training_data = array(
                 ':question' => $question,
                ':answer' => $answer 
            );
            $sql = 'INSERT INTO chatbot ( question, answer)
              VALUES (
                  :question,
                  :answer
              );';
            try {
                $q = $GLOBALS[ 'conn' ]->prepare( $sql );
                if ( $q->execute($training_data) == true ) {
                    echo "<div id='result'></br></br>   Training Successful!</br></div>";

                }
            }
            catch ( PDOException $e ) {
                throw $e;
            }
        } else {
            echo "<div id='result'></br></br>   Teach me something new!</br></div>";
        }
    } else {
        echo "<div id='result'></br></br>   Invalid Password, Try Again!</br></div>";
    }

}

?>
