<?php
    require_once 'db.php';
    try {
        $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'jaycodes'");
        $intern_data->execute();
        $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
        $result = $intern_data->fetch();
    
    
        $secret_code = $conn->prepare("SELECT * FROM secret_word");
        $secret_code->execute();
        $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
        $code = $secret_code->fetch();
        $secret_word = $code['secret_word'];
     } catch (PDOException $e) {
         throw $e;
     }
    if(isset($_POST['ques'])){
        //function definitions
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = preg_replace("([?.!])", "", $data);
            $data = preg_replace("(['])", "\'", $data);
            return $data;
        }
        function chatMode($ques){
            $ques = test_input($ques);
            $conn = mysqli_connect("localhost", "root", "root", "hng_fun");
            if(!$conn){die("Unable to connect");}
            $query = "SELECT answer FROM chatbot WHERE question LIKE '$ques'";
            $result = $conn->query($query)->fetch_all();
            
            echo json_encode([
                'status' => 1,
                'answer' => $result
            ]);
            return ;
        }
        function trainerMode($ques){
            $questionAndAnswer = substr($ques, 6); //get the string after train
            $questionAndAnswer =test_input($questionAndAnswer); //removes all shit from 'em
            $questionAndAnswer = preg_replace("([?.])", "", $questionAndAnswer);  //to remove all ? and .
            $questionAndAnswer = explode("#",$questionAndAnswer);
            if((count($questionAndAnswer)==2)){
                $question = $questionAndAnswer[0];
                $answer = $questionAndAnswer[1];
            }
            
            if(isset($question) && isset($answer)){
                //Correct training pattern
                $question = test_input($question);
                $answer = test_input($answer);
                if($question == "" ||$answer ==""){
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "empty question or response"
                    ]);
                    return;
                }
                $conn = mysqli_connect("localhost", "root", "root", "hng_fun");
                if(!$conn){die("Unable to connect");}
                $query = "INSERT INTO `chatbot` (`question`, `answer`) VALUES  ('$question', '$answer')";
                if($conn->query($query) ===true){
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "trained successfully"
                    ]);
                }else{
                    echo json_encode([
                        'status'    => 1,
                        'answer'    => "Error training me: ".$conn->error
                    ]);
                }
                

                return;
            }else{ //wrong training pattern or error in string
            echo json_encode([
                'status'    => 0,
                'answer'    => "Wrong training pattern<br> PLease use this<br>train: question # answer"
            ]);
            return;
            }
        }

        $ques = test_input($_POST['ques']);
        if(strpos($ques, "train:") !== false){
            trainerMode($ques);
        }else{
            chatMode($ques);
        }





    return;
    }