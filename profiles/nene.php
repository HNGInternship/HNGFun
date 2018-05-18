<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
                //die('Hi');
                require'../../config.php';
                $conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
                
                if(!$conn){
                    die('Unable to connect');
                }
                $question = $_POST['message'];
                $pos = strpos($question, 'train:');
        
                if($pos === false){
                    $sql = "SELECT answer FROM chatbot WHERE question like '$question' ";
                    $query = $conn->query($sql);
                    if($query){
                        echo json_encode([
                            'results'=> $query->fetch_all()
                        ]);
                        return;
                    }else{
                        echo json_encode([
                            'results'=> 'error fetching from db'
                        ]);
                        return;
                    }
                }else{
                    $trainer = substr($question,6 );
                    $data = explode('#', $trainer);
                    $data[0] = trim($data[0]);
                    $data[1] = trim($data[1]);
                    $data[2] = trim($data[2]);
        
                    if($data[2] == 'password'){
        
                        $sql = "INSERT INTO chatbot (question, answer)
                        VALUES ('$data[0]', '$data[1]')";
        
        
                        $query = $conn->query($sql);
                        if($query){
                            echo json_encode([
                                'results'=> 'Trained Successfully'
                            ]);
                            return;
                        }else{
                            echo json_encode([
                                'results'=> 'Error training'
                            ]);
                            return;
                        }
                        
                    }else{
                        echo json_encode([
                            'results'=> 'Wrong Password'
                        ]);
                        return;
                    }
                    
                }
                
                echo json_encode([
                    'reply'=>  $pos
                ]);
                
            return ;
            }else{
                //echo 'HI';
                //return;
            }
            
        
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Bootstrap-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!--my css -->
     <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    </head>
<style>

#chatarea {

 height: 30px;

 width: 100%;
 background-color:rgb(1, 1, 53);

   padding: 1rem;

   border-radius: 10px

}
.chat{
    border: 5px black;
    background-color: gray;

}
   
</style>
<body>
    <div>
        <div class="container">
           <br>
          <br>
            <div class="row">
                   <div class="col-md-6">
                          <img src="http://res.cloudinary.com/dubydhsmk/image/upload/v1524350340/DSC_3172_-_Copy.jpg" class="img-fluid" style="width:2000px;">
                    </div>
                    <div class='col-md-6'>
                      <center>
                         <p>This is Esther Ekereuke.<br><br>
                    
                                Three things about her you must know and perhaps she is good at;
                                 Coming to a friends defense, getting the last word, being adventurous and creating fun ideas. 
                                    She avoid negative people, for they are the greatest destroyer of self-confidence and self-esteem. She surround yourself with people who bring out the best in her. 
                         </p>
                      </center>
                      <center><h1>Nene's Bot</h1></center>
                      <div class=" chat">
                      <div class=" mb-3" id="chat-area"></div>

                          <input class="form-control" name="message" id="message" class="chat" placeholder="Hi there! Type here to talk to me.">            

                          <button style= "btn-primary" onclick= loadDoc()> send</button>

                       </div>
                                   

                     </div>
                    <br>
         </div>    

        </div>
    </div>
    <script>
    function loadDoc() {
        //alert('Hello');
        var message = document.querySelector('#message');
        //alert(message.value);
        var p = document.createElement('p');
        p.id = 'user';
        var chatarea = document.querySelector('#chat-area');
        p.innerHTML = message.value;
        chatarea.appendChild(p);
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
            console.log(xhttp.responseText);
            var result = JSON.parse(xhttp.responseText);
            
            var pp = document.createElement('p');
            pp.id = 'bot';
            if(result.results == ''){
                pp.innerHTML = 'Not in database. please train me';
                chatarea.append(pp)
                return;
            }
            console.log(typeof(result.results))
            if(typeof(result.results) == 'object' ){
                var res = Math.floor(Math.random() * result.results.length);
                pp.innerHTML = result.results[res];
                chatarea.append(pp)
            }else{
                var res = Math.floor(Math.random() * result.results.length);
                pp.innerHTML = result.results;
                chatarea.append(pp)
            }
            
            }
        };
        xhttp.open("POST", "/profiles/nene.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message.value);
    }
    </script>
    
    
    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
