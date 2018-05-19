<?php
if(!isset($_SESSION)) { session_start(); }
class Transaction
{
    
    public $timee;
    public $table;
    
    public function __construct()
    {
        
        $this->buy_table = "buy_transactions";
        $this->sell_table = "sell_transactions";
        $this->sell_requests_table = "sell_requests";
        $this->buy_requests_table = "buy_requests";
        date_default_timezone_set('Africa/Lagos');
        
    }
    
    

    public function postSellRequest($intern_id, $amount, $trade_limit=2, $price_per_coin, $account, $preferred_buyer=0, $status="Open", $db)
    {        
            
        $sql = "insert into ".$this->sell_table." (intern_id, amount, trade_limit, price_per_coin, account, status) values (:intern_id, :amount, :trade_limit, :price_per_coin, :account, :preferred_buyer, :status)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':intern_id', $intern_id);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':trade_limit', $trade_limit);
        $stmt->bindParam(':price_per_coin', $price_per_coin);
        $stmt->bindParam(':account', $account);
        $stmt->bindParam(':preferred_buyer', $preferred_buyer);
        $stmt->bindParam(':status', $status);
    
        if ($stmt->execute()) {
            
            return true;
        }
        
        else {
            
            return false;
            //echo $db->error;
        }
    }


    public function cancelSellTransaction($id, $db)
    {
       
        $query  = "UPDATE " . $this->sell_requests_table . " SET status = 'Closed' WHERE id = :id LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return true;
        }
        else{
        return false;
    }
    
}
  

public function cancelBuyTransaction($id, $db)
{
    
    $query  = "UPDATE " . $this->buy_requests_table . " SET status = 'Closed' WHERE id = :id LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        return true;
    }
    else{
    return false;
}

}

public function createAccount($bank_name, $account_name, $account_number, $db){
    $intern_id = $_SESSION['id'];
    $nRows = $db->query('select count(*) from banks where name = "' . $bank_name . '"')->fetchColumn();
    
    if($nRows > 0){
        $statement = $db->prepare("select * from banks where name = :name");
        $statement->execute(array(':name' => $bank_name));
        $row = $statement->fetch();
        $id = $row['id'];
        
        } else {

    $sql = "insert into banks (name) values (:bank_name)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':bank_name', $bank_name);    
        if ($stmt->execute()) {
            $stmt = $db->query("SELECT LAST_INSERT_ID()");
            $id = $stmt->fetchColumn(); 
        }
    }      
            $sql = "insert into accounts (intern_id, bank_id, name, number) values (:intern_id, :bank_id, :name, :number)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':intern_id', $intern_id);
            $stmt->bindParam(':bank_id', $id);  
            $stmt->bindParam(':name', $account_name);  
            $stmt->bindParam(':number', $account_number);      
        if ($stmt->execute()) {
           
            return True;
        }else{
            return False;
        }
        
}

}
