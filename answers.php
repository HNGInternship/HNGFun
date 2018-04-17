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
            $question = explode(":", $res)[1];
          }
            
            $string .= "<li>" . $row["question"] . "</li>";
        } 
         echo $string;
         
    }
        
     
    }
}
}
?>
