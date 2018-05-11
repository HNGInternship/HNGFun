<<<<<<< HEAD
<?php

class Regex
{
    var $dbcon;

    function __construct($conn){
		$this->dbcon = $conn;
	}

    function query($qwer){
        $link = mysqli_query($this->dbcon,$qwer );
         if($link === false){ return print_r(mysqli_error_list($this->dbcon));}
        $getURL = mysqli_fetch_assoc($link);
       
        return $getURL;
	}
	
	function query3($qwer){
        $link = mysqli_query($this->dbcon,$qwer );
         if($link === false){ return print_r(mysqli_error_list($this->dbcon));}
      
	}
	

    function query2($qwer){
        $link = mysqli_query($this->dbcon,$qwer );
         if($link === false){ return print_r(mysqli_error_list($this->dbcon));}
        
        while ($ddf = mysqli_fetch_assoc($link)){
        $getURL[] = $ddf['email'];
        }

       
        return $getURL;
    }

    
    function train($var){
        //remove train from text
       $var = str_replace('train:', '', $var);
        //seperate # to get question and answer
        $array = explode('#', $var);
        //insert the rest 
            $insert = $this->query3( "INSERT INTO `chatbot` (`id`, `question`, `answer` ) VALUES (null, '".$array[0]."', '".$array[1]."') ");
			if($insert){$insertCount++;}
        return "I have been trained! Thank You!";
    }

    function fetchanswer($limit){
		$limit = strtolower($limit);
		$limit = rtrim($limit);
		$limit = ltrim($limit);

        if (stripos($limit, "train:") !== false) {
            return $this->train( $limit );
		}
		
		$limit =  str_replace('?', '', $limit);
		$limit =   str_replace('!', '', $limit);
		$limit =   str_replace('is', '', $limit);
       $limit =   str_replace('the', '', $limit);
       $limit =   str_replace('what', '', $limit);
       $limit =   str_replace('who', '', $limit);
		$limit =  str_replace('where', '', $limit);
		$limit = rtrim($limit);
		$limit = ltrim($limit);
		$add = " question like '%$limit%'";
	 	$lim = explode(' ', $limit);
		foreach ($lim as $slim){
			$add .= " or question like '%$slim%'";
		//	var_dump($add);	
		}
		 
		$qrrrt = "SELECT `answer` FROM `chatbot` where $add order by rand() limit 1";
		// echo $qrrrt;
	  $answer =  $this->query($qrrrt);
	 // echo $answer;
	 
	return $this->giveresponse($answer['answer']);
    }

     function giveresponse($buffer){
        if (preg_match('/\(\((.*?)\)\)/i', $buffer, $regs)) {
			$result = $regs[1];  // Matched text
			$ffd =  $this->$result();
			$buffer = str_replace("(($result))", "$ffd", $buffer);
	
		} 
		
		
		return $buffer;


     }

     function errot(){
         return "an error occured!";
	 }
	 
	 function current_time(){
		return date("H:i");
	 }

	 function todays_date(){
		return date("D d M Y");
	 }

	//Define regex patterns
	private static $pattern = array(
	"int" => "\d+",
	"float" => "\d*\.\d+",
	"mailstrings" => "(content\-type|mime\-version|multipart\/mixed|Content\-Transfer\-Encoding|bcc|cc|to|headers):",
	"email" => "[\w.-]+@[\w.-]+\.[a-zA-Z]{2,4}",
	"html" => "<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*>.*?<\/\\1>",
	"url" => "([-a-z0-9+.]*(:|:\/\/))?([\w_-]+\.)+[a-zA-Z]{2,}[-%\$_.+!*'(),;\/?:@=&\w#]*",
	"zip" => "^((\d{5}-\d{4})|(\d{5})|([A-Z]\d[A-Z]\s\d[A-Z]\d))",
	"alpha" => "[a-zA-Z]+",
	"num" => "\d+",
	"bbcode" => "\[([a-zA-Z][a-zA-Z0-9]*)\b[^]]*].*?\[\/\\1\]",
	"usphone" => "(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])[-.:]?\s*(\d+))*",
	"usaddress" => "\d+\s[-\w.,\s#:]+",
	"fullname" => "[a-zA-Z]+\s+([-a-zA-Z.'\s]|[0-9](nd|rd|th))+",
	"name" => "[-a-zA-Z.'\s]+",
	"lastname" => "([-a-zA-Z.'\s]|[0-9](nd|rd|th))+"
	);
	
	//Define the descriptions as they will appear in emails or response text
	private static $description = array(
	"int" => "Integer",
	"float" => "Float",
	"mailstrings" => "Mail Strings",
	"email" => "Email",
	"html" => "HTML",
	"url" => "URL",
	"zip" => "Zip Code",
	"alpha" => "Alphabetic Character",
	"num" => "Number",
	"bbcode" => "BB Code",
	"usphone" => "Phone",
	"usaddress" => "Address",
	"name" => "Name",
	"fullname" => "Name",
	"lastname" => "Last Name"
	);
	
	//Returns the match result for an exact match
	public static function is($type, $val)
	{
		//Make sure the type is formatted properly
		$type = Regex::getType($type);		
		
		$pattern = self::$pattern[$type];
		
		return preg_match("/^". $pattern . "$/",$val);
	}
	
	//Returns the match result for a match contained anywhere in the string
	public static function has($type, $val)
	{
		//Make sure the type is formatted properly
		$type = Regex::getType($type);		
		
		$pattern = self::$pattern[$type];
		
		return preg_match("/". $pattern . "/",$val);
	}
	//Returns the match result for match options contained anywhere in the string
	public static function hasAny($types, $val)
	{
		//Parse the string passed in for types
		$types = Regex::getArray($types);
		
		//Assume none are found
		$flag = false; 
		
		foreach($types as $type)
		{		
			//Make sure the type is formatted properly
			$type = Regex::getType($type);
			
			if(Regex::has($type,$val))
			{
				$flag = true;
			}		
		}
		
		return $flag;
	}
		
	//Get the text description of a validation type
	public static function getDescription($type)
	{
		//Make sure the type is formatted properly. Return the description.
		$type = Regex::getType($type);		
		
		return self::$description[$type];
	}
		
	//Transforms a comma delimited string into an array
	public static function getArray($str)
	{
		//Get rid of blank spaces
		$str = str_replace(" ", "", $str);
		
		return explode(",",$str);		
	}
	
	//Get the type from a string that may contain integers, or may not be
	//lowercase.
	public static function getType($string)
	{
		$string = strtolower(preg_replace('/\d/',"",$string));
		if(isset(self::$pattern[$string]))
		{
			return $string;
		}
		else
		{
			return false;	
		}
	}	
}
?>
=======
<?php

class Regex
{
    var $dbcon;

    function __construct($conn){
		$this->dbcon = $conn;
	}

    function query($qwer){
        $link = mysqli_query($this->dbcon,$qwer );
         if($link === false){ return print_r(mysqli_error_list($this->dbcon));}
        $getURL = mysqli_fetch_assoc($link);
       
        return $getURL;
	}
	
	function query3($qwer){
        $link = mysqli_query($this->dbcon,$qwer );
         if($link === false){ return print_r(mysqli_error_list($this->dbcon));}
      
	}
	

    function query2($qwer){
        $link = mysqli_query($this->dbcon,$qwer );
         if($link === false){ return print_r(mysqli_error_list($this->dbcon));}
        
        while ($ddf = mysqli_fetch_assoc($link)){
        $getURL[] = $ddf['email'];
        }

       
        return $getURL;
    }

    
    function train($var){
        //remove train from text
       $var = str_replace('train:', '', $var);
        //seperate # to get question and answer
        $array = explode('#', $var);
        //insert the rest 
            $insert = $this->query3( "INSERT INTO `chatbot` (`id`, `question`, `answer` ) VALUES (null, '".$array[0]."', '".$array[1]."') ");
			if($insert){$insertCount++;}
        return "I have been trained! Thank You!";
    }

    function fetchanswer($limit){
		$limit = strtolower($limit);
		$limit = rtrim($limit);
		$limit = ltrim($limit);

        if (stripos($limit, "train:") !== false) {
            return $this->train( $limit );
		}
		
		$limit =  str_replace('?', '', $limit);
		$limit =   str_replace('!', '', $limit);
		$limit =   str_replace('is', '', $limit);
       $limit =   str_replace('the', '', $limit);
       $limit =   str_replace('what', '', $limit);
       $limit =   str_replace('who', '', $limit);
		$limit =  str_replace('where', '', $limit);
		$limit = rtrim($limit);
		$limit = ltrim($limit);
		$add = " question like '%$limit%'";
	 	$lim = explode(' ', $limit);
		foreach ($lim as $slim){
			$add .= " or question like '%$slim%'";
		//	var_dump($add);	
		}
		 
		$qrrrt = "SELECT `answer` FROM `chatbot` where $add order by rand() limit 1";
		// echo $qrrrt;
	  $answer =  $this->query($qrrrt);
	 // echo $answer;
	 
	return $this->giveresponse($answer['answer']);
    }

     function giveresponse($buffer){
        if (preg_match('/\(\((.*?)\)\)/i', $buffer, $regs)) {
			$result = $regs[1];  // Matched text
			$ffd =  $this->$result();
			$buffer = str_replace("(($result))", "$ffd", $buffer);
	
		} 
		
		
		return $buffer;


     }

     function errot(){
         return "an error occured!";
	 }
	 
	 function current_time(){
		return date("H:i");
	 }

	 function todays_date(){
		return date("D d M Y");
	 }

	//Define regex patterns
	private static $pattern = array(
	"int" => "\d+",
	"float" => "\d*\.\d+",
	"mailstrings" => "(content\-type|mime\-version|multipart\/mixed|Content\-Transfer\-Encoding|bcc|cc|to|headers):",
	"email" => "[\w.-]+@[\w.-]+\.[a-zA-Z]{2,4}",
	"html" => "<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*>.*?<\/\\1>",
	"url" => "([-a-z0-9+.]*(:|:\/\/))?([\w_-]+\.)+[a-zA-Z]{2,}[-%\$_.+!*'(),;\/?:@=&\w#]*",
	"zip" => "^((\d{5}-\d{4})|(\d{5})|([A-Z]\d[A-Z]\s\d[A-Z]\d))",
	"alpha" => "[a-zA-Z]+",
	"num" => "\d+",
	"bbcode" => "\[([a-zA-Z][a-zA-Z0-9]*)\b[^]]*].*?\[\/\\1\]",
	"usphone" => "(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])[-.:]?\s*(\d+))*",
	"usaddress" => "\d+\s[-\w.,\s#:]+",
	"fullname" => "[a-zA-Z]+\s+([-a-zA-Z.'\s]|[0-9](nd|rd|th))+",
	"name" => "[-a-zA-Z.'\s]+",
	"lastname" => "([-a-zA-Z.'\s]|[0-9](nd|rd|th))+"
	);
	
	//Define the descriptions as they will appear in emails or response text
	private static $description = array(
	"int" => "Integer",
	"float" => "Float",
	"mailstrings" => "Mail Strings",
	"email" => "Email",
	"html" => "HTML",
	"url" => "URL",
	"zip" => "Zip Code",
	"alpha" => "Alphabetic Character",
	"num" => "Number",
	"bbcode" => "BB Code",
	"usphone" => "Phone",
	"usaddress" => "Address",
	"name" => "Name",
	"fullname" => "Name",
	"lastname" => "Last Name"
	);
	
	//Returns the match result for an exact match
	public static function is($type, $val)
	{
		//Make sure the type is formatted properly
		$type = Regex::getType($type);		
		
		$pattern = self::$pattern[$type];
		
		return preg_match("/^". $pattern . "$/",$val);
	}
	
	//Returns the match result for a match contained anywhere in the string
	public static function has($type, $val)
	{
		//Make sure the type is formatted properly
		$type = Regex::getType($type);		
		
		$pattern = self::$pattern[$type];
		
		return preg_match("/". $pattern . "/",$val);
	}
	//Returns the match result for match options contained anywhere in the string
	public static function hasAny($types, $val)
	{
		//Parse the string passed in for types
		$types = Regex::getArray($types);
		
		//Assume none are found
		$flag = false; 
		
		foreach($types as $type)
		{		
			//Make sure the type is formatted properly
			$type = Regex::getType($type);
			
			if(Regex::has($type,$val))
			{
				$flag = true;
			}		
		}
		
		return $flag;
	}
		
	//Get the text description of a validation type
	public static function getDescription($type)
	{
		//Make sure the type is formatted properly. Return the description.
		$type = Regex::getType($type);		
		
		return self::$description[$type];
	}
		
	//Transforms a comma delimited string into an array
	public static function getArray($str)
	{
		//Get rid of blank spaces
		$str = str_replace(" ", "", $str);
		
		return explode(",",$str);		
	}
	
	//Get the type from a string that may contain integers, or may not be
	//lowercase.
	public static function getType($string)
	{
		$string = strtolower(preg_replace('/\d/',"",$string));
		if(isset(self::$pattern[$string]))
		{
			return $string;
		}
		else
		{
			return false;	
		}
	}	
}
?>
>>>>>>> 68dc670ae8cfe4c0d9a06ed93d0ba2f2745287bf
