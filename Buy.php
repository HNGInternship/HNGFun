<?php
if(!isset($_SESSION)) { session_start(); }
class Buy
{
    
    public $table;
    
    public function __construct()
    {
        
        $this->table = "buy_requests";
        date_default_timezone_set('Africa/Lagos');
        
    }
    
    
    public function postRequest($intern_id, $amount, $trade_limit=2, $bid_per_coin, $status="Open", $db)
    {        
            
        $sql = "insert into ".$this->table." (intern_id, amount, trade_limit, bid_per_coin, status) values (:intern_id, :amount, :trade_limit, :bid_per_coin, :status)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':intern_id', $intern_id);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':trade_limit', $trade_limit);
        $stmt->bindParam(':bid_per_coin', $bid_per_coin);
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