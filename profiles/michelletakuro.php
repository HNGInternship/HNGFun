

<!DOCTYPE html>

<?php

	if(!defined('DB_USER')){
		require "../config.php";
		
	}

	try {
		$conn = new PDO("mysql:host=".DB_HOST."; dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("select * from secret_word limit 1");
		$stmt->execute();

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];
		}

		$name = null;
		$username = "michelletakuro";
		$image_filename = null;

		$stmt = $conn->prepare("select * from interns_data where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$name = $row['name'];
			$image_filename = $row['image_filename'];
		}

 }
	catch(PDOException $e)
	{
  echo "Connection failed: " . $e->getMessage();
	}
?>

<html lang="en" class="no-js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HNG Internship 4.0 | Takuro Gbemisola</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="HNG Internship 4.0 Profile Page for Miss Takuro Gbemisola">

        <style type="text/css">
            .innerTop {
                padding: 45px;
                background-color: rgba(25,92,90,0.7);
                background-image: linear-gradient(35deg, #64b5f6 36%, #536dfe 65%);
                text-align: center;
                font-family: Arial, monospace;
                font-size: 25px;
                color:white;
            }

            /* Style The Dropdown Button */
            .dropbtn {
                background-color: #1a237e;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            /* The container <div> - needed to position the dropdown content */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #CFD8DC;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            /* Links inside the dropdown */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {
                background-color: #f1f1f1;
            }

            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {
                display: block;
            }

            /* Change the background color of the dropdown button when the dropdown content is shown */
            .dropdown:hover .dropbtn {
                background-color: #00838f;
            }

            .Image {
                text-align: center;
                margin-top: 45px;
                margin-bottom:30px;
                    }


            .blue-bg{
                background-color: rgba(25,92,90,0.7);
                background-image: linear-gradient(35deg, #64b5f6 36%, #536dfe 65%);
                padding: 60px 30px;
                text-align: center;
            }

            .feat-title h2{
                color: #010101;
                text-align: center;
                font-size: 34px;
                text-transform: uppercase;
            }

            .box-white{
                background-color: white;
                border-radius: 20px;
                box-shadow: 0 3px 12px -2px rgba(0,0,0,0.08);
                margin: 10px;
                margin-bottom: 30px;
                padding: 30px 25px 25px;
                text-align: center;
                margin-top:70px;
            }


            .box-grey{
                background-color:white ;
                border-radius: 50px;
                box-shadow: 0 3px 12px -2px rgba(0,0,0,0.08);
                margin-top: 100px;
                margin-bottom: 30px;
                padding: 30px 25px 25px;
                text-align: center;
                height:contain;
            }

            .icons{
                display:inline;
                list-style: none;
            }

            .images{
                border-radius: 7px;
                margin-right: 50px;
                margin-top: 50px;
                text-align: center;
            }

            #footer p{
                margin-top: 50px;
                padding: 0px;
            }

            .Image2{
                text-align:center;
                margin-top: 30px;
                margin-bottom:15px;
                margin-left: 20px;
                display: inline;
            }
    </style>
    </head>

    <body>
        <section>
            <div class="innerTop">
                <h1> HNG FUN INTERNSHIP 4.0 </h1>
                <h2> PROFILE </h2>
                <div class="dropdown">
                    <button class="dropbtn">MENU</button>
                    <div class="dropdown-content">
                        <a href="file:///C:/Users/Gbemmy/Desktop/index.html#">Biography</a>
                        <a href="file:///C:/Users/Gbemmy/Desktop/index.html#">Skillset</a>
                        <a href="file:///C:/Users/Gbemmy/Desktop/index.html#">Connect with me</a>
                    </div>
                </div>

            </div>
        </section>

        <div class="Image">
            <img src="./httpS://res.cloudinary.com/michelletakuro/image/upload/v1526025467/DSC_0491.jpg" height="300px" width="30%">
        </div>

        <section class="blue-bg" id="Biography">
            <div class="box-white">
                <div class="feat-title"><h2>Biography</h2></div>
                <p class="small-text"> <strong>Takuro Gbemisola</strong> is a technology enthusiast with a keen interest in programming language as well as community impact.She is an avid reader, open learner and is constantly seeking opportunities to develop herself.She has worked with several notable organisations like AIESEC,Wecyclers,Ignite Africa etc. She is a fellow of the YALI West Africa RLC,
        Young Professional Network (YPB) and the Andela Learning Community.Takuro Gbemisola is a graduate of the University of Lagos Quantity surveying department.
                </p>
            </div>

            <div class="box-grey">
                  <div class="feat-title"><h2>SKILLSET</h2></div>
                <div class="Image2">
                    <img src="./https://res.cloudinary.com/michelletakuro/image/upload/v1526025462/download_2.png" height="95%" width="20%">
                    <img src="./https://res.cloudinary.com/michelletakuro/image/upload/v1526025462/download_1.png" height="95%" width="20%">
                    <img src="./https://res.cloudinary.com/michelletakuro/image/upload/v1526025462/download.png" height="95%" width="20%">
                    <img src="./https://res.cloudinary.com/michelletakuro/image/upload/v1526025462/images.png" height="95%" width="10%">
                </div>
            </div>

            <a href="https://twitter.com/GbemmySpeaks"> <img class="images" src="./https://res.cloudinary.com/michelletakuro/image/upload/v1526025462/images_1_1.jpg" height="50px" width="50px"> </a>
            <a href="https://www.facebook.com/gtakuro"> <img class="images" src="./https://res.cloudinary.com/michelletakuro/image/upload/v1526025462/images_1.png" height="50px" width="50px"> </a>
            <a href="https://ng.linkedin.com/in/gbemisola-takuro-78b34046"> <img class="images" src="./https://res.cloudinary.com/michelletakuro/image/upload/v1526025462/images_1_2.jpg" height="50px" width="50px"> </a>

            <footer id="footer">
                <p>©Takuro Gbemisola |HNG INTERNSHIP 4.0</p>
            </footer>
        </section>



</body></html>
