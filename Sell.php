<?php
if(!isset($_SESSION)) { session_start(); }
class Sell
{
    
    public $table;
    
    public function __construct()
    {
        
        $this->table = "sell_requests";
        date_default_timezone_set('Africa/Lagos');
        
    }
    
    
    public function postRequest($intern_id, $amount, $trade_limit=2, $price_per_coin, $account, $preferred_buyer=0, $status="Open", $db)
    {        
            
        $sql = "insert into ".$this->table." (intern_id, amount, trade_limit, price_per_coin, account, preferred_buyer, status) values (:intern_id, :amount, :trade_limit, :price_per_coin, :account, :preferred_buyer, :status)";
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

    //member class ends here    
}
