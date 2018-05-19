<?php

require_once 'dbconfig.php';

class USER
{

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function lasdID()
    {
        $stmt = $this->conn->lastInsertId();
        return $stmt;
    }

    public function register($firstname, $lastname, $email, $upass, $code)
    {
        try {
            $password = md5($upass);
            $stmt = $this->conn->prepare("INSERT INTO users (firstname, lastname, email, userPass, tokenCode )
            VALUES(:firstname, :lastname, :user_mail, :user_pass, :active_code)");
            $stmt->bindparam(":firstname", $firstname);
            $stmt->bindparam(":lastname", $lastname);
            $stmt->bindparam(":user_mail", $email);
            $stmt->bindparam(':user_pass', $password);
            $stmt->bindparam(":active_code", $code);

            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }
    public function login($email, $upass)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=:email_id");
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1) {
                if ($userRow['userStatus'] == "Y") {
                    if ($userRow['userPass'] == md5($upass)) {
                        $_SESSION['userSession'] = $userRow['id'];
                        return true;
                    } else {
                        header("Location: index.php?error");
                        exit;
                    }
                } else {
                    header("Location: index.php?inactive");
                    exit;
                }

            } else {
                header("Location: index.php?error");
                exit;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['userSession'])) {
            header("Location: $url");
        }
    }

    public function logout()
    {
        session_destroy();
        $_SESSION['userSession'] = false;
    }

    function send_mail($email, $message, $subject)
    {

        require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
        require '/usr/share/php/libphp-phpmailer/class.smtp.php';
                // require_once('mailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->AddAddress($email);
        $mail->Username = "chikodi543@gmail.com";
        $mail->Password = "password";
        $mail->SetFrom('chikodi543@gmail.com', 'Dragon Slayer');
        $mail->AddReplyTo("chikodi543@gmail.com", "Dragon Slayer");
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    }

    //get public key from id
    public function getPublicKey($id, $db)
    {

        if (empty($id)) {
            return false;
        }
        $query = "SELECT public_key FROM " . $this->table . " WHERE id=:id LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt->fetchAll();
        if (count($results) > 0) {
            $row = $results[0];

            return $row['public_key'];
        } else {

            return false;
        }
    }

//get public key from id
    public function getPrivateKey($id, $db)
    {
        $query = "SELECT private_key FROM " . $this->table . " WHERE id=:id LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt->fetchAll();
        if (count($results) > 0) {
            $row = $results[0];

            return $row['private_key'];
        } else {

            return false;
        }
    }



//get public key from id
    public function getAccounts($id, $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT accounts.id, banks.name FROM accounts inner join banks on accounts.bank_id = banks.id  WHERE Intern_id=:id ";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt->fetchAll();
        if (count($results) > 0) {
            $row = $results;

            return $row;
        } else {

            return false;
        }
    }

    //member class ends here
}