<<<<<<< HEAD
<?php

function debugResults($var, $strict = false) {
    if ($var != NULL) {
        if ($strict == false) {

            if (is_array($var) || is_object($var)) {
                echo "<pre>";
                print_r($var);
                echo "</pre>";
            } else {
                echo $var;
            }
        } else {

            if (is_array($var) || is_object($var)) {
                echo "<pre>";
                var_dump($var);
                echo "</pre>";
            } else {
                var_dump($var);
            }
        }
    } else {
        var_dump($var);
    }
}

function errorMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function simple_redirect($url) {

    echo "<script language=\"JavaScript\">\n";
    echo "<!-- hide from old browser\n\n";

    echo "window.location = \"" . $url . "\";\n";

    echo "-->\n";
    echo "</script>\n";

    return true;
}

function getHomeURL() {
    return HTTP_SERVER . SITE_DIR;
}

// Return a random value
function db_prepare_input($string) {
    return trim(addslashes($string));
}

//Encryption function
function easy_crypt($string) {
    return base64_encode($string . "_@#!@");
}

//Decodes encryption
function easy_decrypt($str) {
    $str = base64_decode($str);
    return str_replace("_@#!@", "", $str);
}

function getParentCategoryName($id) {
    global $DB;
    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE 1 AND page_id = :id";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
    
   return ($results[0]["page_title"] <> "" ) ? $results[0]["page_title"] : "None";
}

function getPageDetailsByName($pageAlias) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE 1 AND page_alias = :pname";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":pname", $pageAlias);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}

?>
=======
<?php

function debugResults($var, $strict = false) {
    if ($var != NULL) {
        if ($strict == false) {

            if (is_array($var) || is_object($var)) {
                echo "<pre>";
                print_r($var);
                echo "</pre>";
            } else {
                echo $var;
            }
        } else {

            if (is_array($var) || is_object($var)) {
                echo "<pre>";
                var_dump($var);
                echo "</pre>";
            } else {
                var_dump($var);
            }
        }
    } else {
        var_dump($var);
    }
}

function errorMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function simple_redirect($url) {

    echo "<script language=\"JavaScript\">\n";
    echo "<!-- hide from old browser\n\n";

    echo "window.location = \"" . $url . "\";\n";

    echo "-->\n";
    echo "</script>\n";

    return true;
}

function getHomeURL() {
    return HTTP_SERVER . SITE_DIR;
}

// Return a random value
function db_prepare_input($string) {
    return trim(addslashes($string));
}

//Encryption function
function easy_crypt($string) {
    return base64_encode($string . "_@#!@");
}

//Decodes encryption
function easy_decrypt($str) {
    $str = base64_decode($str);
    return str_replace("_@#!@", "", $str);
}

function getParentCategoryName($id) {
    global $DB;
    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE 1 AND page_id = :id";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
    
   return ($results[0]["page_title"] <> "" ) ? $results[0]["page_title"] : "None";
}

function getPageDetailsByName($pageAlias) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE 1 AND page_alias = :pname";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":pname", $pageAlias);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}

?>
>>>>>>> aca03ae9fbd8ae27fe330a2c33c832630d7e8199
