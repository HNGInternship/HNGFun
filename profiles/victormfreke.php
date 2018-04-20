<?php
 try {
    $sql = 'SELECT * FROM secret_word LIMIT 1';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}    
try {
    $sql = "SELECT * FROM interns_data WHERE `username` = 'victormfreke' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $my_data = $q->fetch();
    
} catch (PDOException $e) {
    throw $e;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        * {
            /*outline: 1px solid red !important; */
        }
        html, body {
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
            }
            .wrapper {
                height: inherit;
                width: inherit;
                background: linear-gradient(to bottom right, rgba(33, 18, 43, 0.74) 0%, #836195 0%, rgba(1, 7, 13, 0.67)59.12%); 
            }
            h4 {
                font-family: 'Cabin';
                font-weight: 700;
                letter-spacing: 1.5px;
            }
            #pro-pic {
			    padding-top:20px;
                border-radius: 50%;
                border: 4px solid #fff;
                width: 120px;
                height: 120px;
                margin-top: 140px;
                margin-left: 90px;
                padding: 0px;
            }
            #body {
				margin-left: 90px;
                line-height: 14px;
                font-size: 16px;
                font-family: 'Cabin';
                color: #BDBDBD;
				
            }
            #name {
				margin-left: 90px;
                font-size: 22px;
                color: #F2F2F2;
            }
                         /* 
            ##Device = Most of the Smartphones Mobiles (Portrait)
            ##Screen = B/w 320px to 479px
            */
            @media (min-width: 320px) and (max-width: 480px) {
                
                #name {
                padding-top: 55px;
                font-size: 30px;
                color: #F2F2F2;
                
                line-height: 20px;
            }
            h4 {
                font-family: 'Cabin';
                font-weight: 700;
                letter-spacing: 1.5px;
            }
            #pro-pic {
                border-radius: 50%;
                border: 2px solid #fff;
                width: 60px;
                height: 60px;
                margin-top: 40px;
                margin-left: 40px;
                padding-bottom: 20px;
                padding: 0px;
                /*padding: 20px;*/
            }
            #body {
                line-height: 30px;
                font-size: 16.5px;
                font-family: 'Cabin';
                color: #BDBDBD;
                padding: 15px;
            }
            .hi {
                height: 100px;
            }
            .bi {
                height: 470px;
            }
           
            }
            .wrapper {
                height: 710px;
            }
                
            }
    </style>
</head>
<body>
    <div class="wrapper">

            <div class="grid-x margin-x hi">
                    <div class="small-0 medium-0 large-1">
                            
                    </div>
                    <div class="small-4 large-1">
                            <img src="http://res.cloudinary.com/dae4sosbl/image/upload/v1523715892/IMG_20170804_101248.jpg" alt="" id="pro-pic">
                    </div>
                    <div class="small-8 medium-0 large-10" id="name">
                            <h4>Victor Peter</h4>
                    </div>
                    
                </div>
    
                <div class="grid-x margin-x body bi">
                       
                        <div class="small-12 medium-0 large-4" id="body">
                                <p>
                                    Victor, a student currently studying Computer Engineering.
                                    <br /><br />
                                    He has intermediate experience in Computer Languages like HTML, CSS, Python and PHP.<br /><br />
                                    He is  also a Drummer 
                                </p>
                       
                    </div>
    
                   
    </div>
</body>
</html>
