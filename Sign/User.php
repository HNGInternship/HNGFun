<<<<<<< HEAD
<?php session_start();
class User {
    
public $timee;
public $table;

public function __construct(){
    
    $this->table = "users";   
 date_default_timezone_set('Africa/Lagos');

}


//get data needed  from email
 public function get_data($email_data,$db){
         
          $query = "SELECT * FROM ".$this->table." WHERE email=? LIMIT 1";
          $statement = $db->prepare($query);
          $statement->bind_param("s",$email_data);
     if ( $statement->execute() ){   
         $result = $statement->get_result();
         $num = $result->num_rows;
         
         if($num > 0){
              $row = $result->fetch_assoc();
             
         return $row;
         }
         else{
    
            return false; 
         }
     }
     else{
        return false;
     }
          
      }
      
      //check if email exists already before registration to avoid double email
  public function check_email($email,$db){
         
          $query = "SELECT * FROM ".$this->table." WHERE email=? LIMIT 1";
          $statement = $db->prepare($query);
          $statement->bind_param("s",$email);
     if ( $statement->execute() ){   
         $result = $statement->get_result();
         $num = $result->num_rows;
         
         if($num > 0){
        //email exists   
         return "yes";
         }
         else{
             //email doesnt exist and is okay
            return "no"; 
         }
     }
     else{
        return false;
     }
          
      }


 

//register construct function
//
   
     public function register($firstname,$lastname,$email,$username,$nationality,$phone,$password,$db){
        
        $this->table = 'users';
        
        
        $password_hash = md5($password);
        $timee=date('Y-m-d H:i:s');

        $query = "INSERT INTO ".$this->table."(firstname,lastname,email,username,nationality,phone,password,timee ) VALUES(?,?,?,?,?,?,?,?)";
        
            $statement = $db->prepare($query);

           // echo $db->error.$query;
    
        $statement->bind_param("ssssssss",$firstname,$lastname,$email,$username,$nationality,$phone,$password_hash,$timee);

        
     $result = $db->query($query);
     
     if ( $statement->execute() ){
         
         return true;
     }
     
     else{
        
        return false;
        //echo $db->error;
     }
                   
        
    }

//get details of user

    public function get_profile($db){
        if(!isset($_SESSION['id'])){
            //location to redirect to should be set here 
            $location='';
=======
<?php
session_start();
class User
{
    
    public $timee;
    public $table;
    
    public function __construct()
    {
        
        $this->table = "interns_data";
        date_default_timezone_set('Africa/Lagos');
        
    }
    
    
    //get data needed  from email
    public function get_data($email_data, $db)
    {
        
        $query     = "SELECT * FROM " . $this->table . " WHERE email=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("s", $email_data);
        if ($statement->execute()) {
            $result = $statement->get_result();
            $num    = $result->num_rows;
            
            if ($num > 0) {
                $row = $result->fetch_assoc();
                
                return $row;
            } else {
                
                return false;
            }
        } else {
            return false;
        }
        
    }
    
    //check if email exists already before registration to avoid double email
    public function check_email($email, $db)
    {
        
         $query  = "SELECT * FROM interns_data WHERE email = '$email' LIMIT 1";
        // $query  = "SELECT * FROM interns_data WHERE email = :email LIMIT 1";
        // $stmt = $db->prepare($query);
        // $stmt->bindParam(':email', $email);
        // $stmt->execute();
        // $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // $results = $stmt->fetchAll();
        // if(count($results) > 0){
        //     return true;
        // }
        // return false;

         $result = mysqli_query($db, $query);
         if (mysqli_num_rows($result) > 0) {
            
            return true;
         } else {
             return false;
         }
        
    }
    
    
    
    
    //register construct function
    //
    
    public function register($firstname, $lastname, $email, $username='', $country=null, $state=null, $phone, $password, $public_key, $secret_key, $db)
    {
        
        $image_filename = '';
        $this->table = 'interns_data';
        
        
        $password_hash = md5($password);
        $timee         = date('Y-m-d H:i:s');
        
        
        //$query = "INSERT INTO ".$this->table."(first_name,last_name,email,username,phone,password) VALUES(?,?,?,?,?,?)"; 
        
        // $query = "INSERT INTO " . $this->table . "(first_name,last_name,email,username,country,state, phone, password, public_key, private_key, created_at, updated_at ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql = "insert into ".$this->table." (first_name, last_name, username, email, phone_number, password_hash, country, image_filename, public_key, private_key) values (:first_name, :last_name, :username, :email, :phone_number,
                                                    :password_hash, :country, :image_filename, :public_key, :private_key)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':first_name', $firstname);
        $stmt->bindParam(':last_name', $lastname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':image_filename', $image_filename);
        $stmt->bindParam(':public_key', $public_key);
        $stmt->bindParam(':private_key', $secret_key);
        
        
        // $statement = $db->prepare($query);
        
        // echo $db->error.$query;
        
        // $statement->bind_param('ssssssssssss', $firstname, $lastname, $email, $username, $country, $state, $phone, $password_hash, $public_key, $secret_hash, $created_at, $updated_at);
        
        // $result = $db->query($query);
        
        if ($stmt->execute()) {
            
            return true;
        }
        
        else {
            
            return false;
            //echo $db->error;
        }
        
        
    }
    
    //get details of user
    
    public function get_profile($db)
    {
        if (!isset($_SESSION['id'])) {
            //location to redirect to should be set here 
            $location = '';
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            redirect($location);
        }
        
        $id = $_SESSION['id'];
<<<<<<< HEAD
        if(empty($id)){
        die("Your session has expired or your not logged in. please Login");    
        }
        $dataa=array();
        $i=0;
        $query = "SELECT * FROM ".$this->table." WHERE id = '$id' LIMIT 1" ;
        
     $result = $db->query($query);
     $num = mysqli_num_rows($result);
     if($num > 0)
     {
     
      while($row = mysqli_fetch_array($result)){
         $dataa['fullname'] = $row['fullname'];
          $dataa['username'] = $row['username'];
         $dataa['email']= $row['email'];
         $dataa['timee'] = $row['timee'];
         $dataa['lastname'] = $row['lastname'];
    
         $dataa['id']= $row['id'];
        
        // $i++;
     }
     
     return $dataa;
    }
    
     else{
         return false;
        //echo $db->error;
        //return false; 
    
     }
                   
        
    
}
    
    //profile update function
    
    public function update_profile($fullname,$lastname,$email,$db){
        if(!isset($_SESSION['id'])){
=======
        if (empty($id)) {
            die("Your session has expired or your not logged in. please Login");
        }
        $dataa = array();
        $i     = 0;
        $query = "SELECT * FROM " . $this->table . " WHERE id = '$id' LIMIT 1";
        
        $result = $db->query($query);
        $num    = mysqli_num_rows($result);
        if ($num > 0) {
            
            while ($row = mysqli_fetch_array($result)) {
                $dataa['fullname'] = $row['fullname'];
                $dataa['username'] = $row['username'];
                $dataa['email']    = $row['email'];
                $dataa['timee']    = $row['timee'];
                $dataa['lastname'] = $row['lastname'];
                
                $dataa['id'] = $row['id'];
                
                // $i++;
            }
            
            return $dataa;
        }
        
        else {
            return false;
            //echo $db->error;
            //return false; 
            
        }
        
        
        
    }
    
    //profile update function
    
    public function update_profile($fullname, $lastname, $email, $db)
    {
        if (!isset($_SESSION['id'])) {
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            die("Your session has expired or your not logged in. please Login");
        }
        
        $id = $_SESSION['id'];
        
<<<<<<< HEAD
        $query="UPDATE ".$this->table." SET fullname=?,email=? WHERE id=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("ssss",$fullname,$email,$id);
    
    
     
     if ( $statement->execute() ){
         return true;
     }
     
     else{
        return false;
        
     }
        
        
        
    }   
    
    
    //password token update
    public function update_token($email,$token,$db){
        $query="UPDATE ".$this->table." SET password_token=? WHERE email=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("ss",$token,$email);
     
     if ( $statement->execute() ){
         return true;
     }
     
     else{
        return false;
        
     }
=======
        $query     = "UPDATE " . $this->table . " SET fullname=?,email=? WHERE id=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("sss", $fullname, $email, $id);
        
        
        
        if ($statement->execute()) {
            return true;
        }
        
        else {
            return false;
            
        }
        
        
        
    }
    
    
    //password token update
    public function update_token($email, $token, $db)
    {
        $query     = "UPDATE " . $this->table . " SET token=? WHERE email=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("ss", $token, $email);
        
        if ($statement->execute()) {
            return true;
        }
        
        else {
            return false;
            
        }
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
        
        
        
    }
    
    //update verification status
<<<<<<< HEAD
    public function verified($id,$db){
        $query="UPDATE ".$this->table." SET verify_status=1 WHERE id=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("s",$id);
     
     if ( $statement->execute() ){
         return true;
     }
     
     else{
        return false;
        
     }
=======
    public function verified($id, $db)
    {
        $query     = "UPDATE " . $this->table . " SET verify_status=1 WHERE id=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("s", $id);
        
        if ($statement->execute()) {
            return true;
        }
        
        else {
            return false;
            
        }
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
        
        
        
    }
    
<<<<<<< HEAD
//login check
  public function check($email,$password,$db){

        $this->table = "users";
          $password_hash = md5($password);
          $query = "SELECT * FROM ".$this->table." WHERE email=? AND password=? LIMIT 1";
          $statement = $db->prepare($query);
          $statement->bind_param("ss",$email,$password_hash);
     if ( $statement->execute() ){   
         $result = $statement->get_result();
         $num = $result->num_rows;
         
         if($num > 0){
             
             $row = $result->fetch_assoc();
             
             
            // print_r($row);
             $_SESSION['id'] = $row['id'];
             ;
             $_SESSION['email'] = $row['email'];
            
                return true;

         }
         else{
            return false; 
         }
     }
     else{
        return false;
     }
          
      }

  
  public function get_data_from_id($id,$db){
         
          $query = "SELECT * FROM ".$this->table." WHERE id=? LIMIT 1";
          $statement = $db->prepare($query);
          $statement->bind_param("s",$id);
     if ( $statement->execute() ){   
         $result = $statement->get_result();
         $num = $result->num_rows;
         
         if($num > 0){
              $row = $result->fetch_assoc();
             
         return $row;
         }
         else{
    
            return false; 
         }
     }
     else{
        return false;
     }
          
      }
  
  
   public function verify_code($id,$code,$db){
         
          $query = "SELECT * FROM ".$this->table." WHERE id=? LIMIT 1";
          $statement = $db->prepare($query);
          $statement->bind_param("s",$id);
     if ( $statement->execute() ){   
         $result = $statement->get_result();
         $num = $result->num_rows;
         
         if($num > 0){
              $row = $result->fetch_assoc();
              
                    $v=strcmp($row['verify_code'],$code);
                    
                    similar_text($row['verify_code'], $code, $percent); 
                    
                    
                   if (intval($percent) === 100){
                       return true;
                   
                   }
               else {
                 return "no";  
               }
         }
         else{
    
            return false; 
         }
     }
     else{
        return false;
     }
          
      }
  
  
  //for admin to get users on the database if need be
   public function get_users($db){
         $dataa=array();
         $i=0;
          $query = "SELECT * FROM ".$this->table." ";
          
            $result = $db->query($query);
            $num = mysqli_num_rows($result);
           if($num > 0){
                 while($row = mysqli_fetch_array($result)){
                 $dataa['firstname'][$i] = $row['name'];
                 $dataa['email'][$i]= $row['email'];
                 $dataa['timee'][$i] = $row['timee'];
                 $dataa['lastname'][$i] = $row['lastname'];
                
                 $i++;
             }
             return $dataa;  
               
           }
         else {
            return false; 
         }
    
          
      }

  
   


    //to check password token for password resets       
    public function check_token($token,$db){
          //$password_hash = md5($password);
          $query = "SELECT * FROM ".$this->table." WHERE password_token=? LIMIT 1";
          $statement = $db->prepare($query);
          $statement->bind_param("s",$token);
     if ( $statement->execute() ){   
         $result = $statement->get_result();
         $num = $result->num_rows;
         
         if($num > 0){
            // $row = $result->fetch_assoc();
            return true;
            
            // print_r($row);
            //return $row;
        
         }
         else{
            return false; 
         }
     }
     else{
        return false;
     }
          
      }


   //change password function
    public function update_password($password,$db){
         $password_hash = md5($password);
       $query="UPDATE ".$this->table." SET password=? WHERE id=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("ss",$password_hash,$id);
     
     if ( $statement->execute() ){
         return true;
     }
     
     else{
        return false;
        
     }
       
       
   }

//member class ends here    
}
=======
    //login check
    public function check($email, $password, $db)
    {
        $password_hash = md5($password);
        $table         = 'interns_data';
        // $query         = "SELECT * FROM interns_data WHERE email = '$email' AND password = '$password_hash' LIMIT 1";
        // $result        = mysqli_query($db, $query);
        // if (mysqli_num_rows($result) > 0) {
        //     $row               = mysqli_fetch_array($result);
        //     $_SESSION['id']    = $row['id'];
        //     $_SESSION['email'] = $row['email'];
        //     return true;
            
        // } else {
        //     return false;
        // }

        $query  = "SELECT * FROM interns_data WHERE email = :email AND password_hash = :password_hash LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt->fetchAll();
        if(count($results) > 0){
            $row               = $results[0];
            $_SESSION['id']    = $row['id'];
            $_SESSION['email'] = $row['email'];
            return true;
        }
        return false;
    }
    
    
    public function get_data_from_id($id, $db)
    {
        
        $query     = "SELECT * FROM " . $this->table . " WHERE id=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("s", $id);
        if ($statement->execute()) {
            $result = $statement->get_result();
            $num    = $result->num_rows;
            
            if ($num > 0) {
                $row = $result->fetch_assoc();
                
                return $row;
            } else {
                
                return false;
            }
        } else {
            return false;
        }
        
    }
    
    
    public function verify_code($id, $code, $db)
    {
        
        $query     = "SELECT * FROM " . $this->table . " WHERE id=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bind_param("s", $id);
        if ($statement->execute()) {
            $result = $statement->get_result();
            $num    = $result->num_rows;
            
            if ($num > 0) {
                $row = $result->fetch_assoc();
                
                $v = strcmp($row['verify_code'], $code);
                
                similar_text($row['verify_code'], $code, $percent);
                
                
                if (intval($percent) === 100) {
                    return true;
                    
                } else {
                    return "no";
                }
            } else {
                
                return false;
            }
        } else {
            return false;
        }
        
    }
    
    
    //for admin to get users on the database if need be
    public function get_users($db)
    {
        $dataa = array();
        $i     = 0;
        $query = "SELECT * FROM " . $this->table . " ";
        
        $result = $db->query($query);
        $num    = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $dataa['firstname'][$i] = $row['name'];
                $dataa['email'][$i]     = $row['email'];
                $dataa['timee'][$i]     = $row['timee'];
                $dataa['lastname'][$i]  = $row['lastname'];
                
                $i++;
            }
            return $dataa;
            
        } else {
            return false;
        }
        
        
    }
    
    
    
    
    
    //to check password token for password resets       
    public function check_token($token, $db)
    {
        // $query  = "SELECT * FROM interns_data WHERE token = '$token' LIMIT 1";
        $query  = "SELECT * FROM interns_data WHERE token = :token LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt->fetchAll();
        if(count($results) > 0){
            return true;
        }
        return false;

        // $result = mysqli_query($db, $query);
        // if (mysqli_num_rows($result) > 0) {
            
        //     return true;
        // } else {
        //     return false;
        // }
        
    }
    
    
    //change password function
    public function update_password($password, $token, $db)
    {
        $password_hash = md5($password);
        $query         = "UPDATE " . $this->table . " SET password_hash=? WHERE token=? LIMIT 1";
        $statement     = $db->prepare($query);
        $statement->bind_param("ss", $password_hash, $token);
        
        if ($statement->execute()) {
            return true;
        }
        
        else {
            return false;
            
        }
        
        
    }
    
    //member class ends here    
}
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
