<?php 
//Bytenaija Entry. Do not modify
$file = realpath(__DIR__) . "/db.php"    ;
require_once $file;
global $conn;


    
if(isset($_GET['bytenaija'])){
    if(isset($_GET['train'])){
        $quest = trim($_GET["keyword"]);
        $keyword = "bytenaija: " . $quest;
        $response = trim($_GET["response"]);
        if($response == ''){
            echo "Answer cannot be empty. What are you trying to do? Confuse me?";
        }else{
            try {
            $sql = "INSERT INTO chatbot(question, answer) VALUES ('" . $keyword . "', '" . $response . "')";
            
            $conn->exec($sql);
    
         $message = "Saved " . $quest ." : " . $response;
            
            echo $message;
    
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

        }
    }else if(isset($_GET['query'])){
               
        $query = $_GET['query'];
        $str = "'%bytenaija: ".$query."%'";
        $sql = "SELECT answer FROM chatbot WHERE question LIKE " . $str . " ORDER BY question ASC LIMIT 1";
        
      foreach ($conn->query($sql) as $row) {
            echo $row["answer"];
        } 
      
    } else if(isset($_GET['list'])){
        $sql = "SELECT COUNT(*) FROM chatbot";
        if ($res = $conn->query($sql)) {
             
        $string = '';
     
    /* Check the number of rows that match the SELECT statement */
        if ($res->fetchColumn() > 0) {
            $sql = "SELECT * FROM chatbot ORDER BY question ASC";
       
      foreach ($conn->query($sql) as $row) {
          $res = $row["question"];
          $question = '';
          if(strpos($res, ":" ) !== false){
            $question = explode(":", $res);
            $res = $question[1];
          }
            
            $string .= "<li>" . $res. "</li>";
        } 
         echo $string;
         
    }
        
     
    }
}
}
?>

<?php

    //functions defined by @chigozie. DO NOT MODIFY!!!
    function getDaysInMonth($month){
        $months_with_31_days = ["january", "march", "may", "july", "august", "october", "december"];
        $months_with_30_days = ["april", "june", "september", "november"];
        $other = ["february"];

        $month = strtolower(trim($month));
        if(in_array($month, $months_with_31_days)){
            return ucfirst($month)." has 31 days";
        }else if(in_array($month, $months_with_30_days)){
            return ucfirst($month)." has 30 days";
        }else if(in_array($month, $other)){
            $ans = "In a leap year, February has 29 days otherwise, it has 28 days. ";
            $ans .= "If you are asking about the current year ".date("Y").", then February has ";
            if(isCurrentYearLeap()){
                $ans .= "29 days";
            }else{
                $ans .= "28 days";
            }
            return $ans;
        }else{
            return "I don't recognize the month you entered";
        }
    }

    function isCurrentYearLeap(){
        $currrent_year = intval(date('Y'));
        if($currrent_year % 400 === 0){
            return true;
        }
        if($currrent_year % 100 === 0){
            return false;
        }
        if($currrent_year % 4 === 0){
            return true;
        }
        return false;
    }

?>
