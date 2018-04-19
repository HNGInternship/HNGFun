<?php
    // Query secret_word table
    $resultSecretWord = $conn->query("SELECT * FROM secret_word LIMIT 1");
    $resultSecretWord = $resultSecretWord->fetch(PDO::FETCH_OBJ);
    $secret_word = $resultSecretWord->secret_word;

    // Query secret_word table
    $resultInternData = $conn->query("SELECT * FROM interns_data WHERE username = 'ArthurEzenwanne'");
    $userData = $resultInternData->fetch(PDO::FETCH_OBJ);
    $internName = $userData->name;
    $internUserName = $userData->username;
    $internImgURL = $userData->image_filename;
?>

<!doctype html>
<html lang="en" class="no-js">
    <head>
        <title>HNG Internship 4.0 | @ArthurEzenwanne</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="HNG Internship 4.0 Profile Page for @ArthurEzenwanne">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <style type="text/css">
        	.innerTop {
    		    padding: 53px 30px;
    		    background-color: rgba(25,92,90,0.7);
    		    /*background-image: linear-gradient(17deg, #8cc43f 30%, #195c5a 70%);*/
    		    /*background-image: linear-gradient(17deg, #8cc43f 50%, #195c5a 50%);*/
    		    background-image: linear-gradient(30deg, #8cc43f 36%, #195c5a 0%);
    		}
    		.images {
                display: block;
    		    width: 30%;
    		    height: 30%;
    		    border-radius: 15px 50px;
    		    padding: 20px;
                margin-right: auto;
                margin-left: auto;
    		}
    		.tab{
    			background: white;
    			box-shadow: 0 2px 5px rgba(0,0,0,.26);
    		}
            .tab ul {
                list-style: none;
                padding: 0px;
                margin: 0px;
                display: inline-block;
            }
            .tab ul li {
                display: inline-block;
                font-size: 14px;
                line-height: 1.4285;
                color: #333;
                background-color: #fff;
            }
            .tab a.active {
                border-bottom: 2px solid #195c5a;
                font-weight: 900;
                color: #195c5a;
            }
            .tab ul li a {
                color: #444;
                padding: 15px;
                display: block;
                font-family: "Raleway";
                font-weight: 600;
            }
    		.grey-bg{
    			background: #f2f2f2;
    			padding: 70px 0px;
    			text-align: center;
    		}
    		.feat-title{
    			margin-bottom: 10px;
    		}
    		.feat-title h2{
    			color: #010101;text-align: center;font-size: 34px;text-transform: uppercase;
    		}
    		.feat-brd{
    			border: 1px solid #0fa46c;width: 57px;margin: auto;display: block;margin-bottom: 2em;
    		}
    		.box-white{
    			background-color: white;
    		    border-radius: 3px;
    		    box-shadow: 0 3px 12px -2px rgba(0,0,0,0.08);
    		    margin: 10px;
    		    margin-bottom: 30px;
    		    padding: 30px 25px 25px;
    		    text-align: center;
    		}
    		.box-white i{
    			color:#8cc43f;
    		}
    		.box-white .small-text{
    			font-weight: bold;
    		}
    		.referral{
    			padding: 60px 20px;
    			background-image: linear-gradient(17deg, #195c5a 0%, #8cc43f 100%);
    		}
            .referral h2 {
                font-weight: 800;
                color: #fff;
            }
    		.green-bg{
    			background-color:#195c5a;
    			color:white; 
    		}
    		.box-trans{
    			margin-bottom: 30px;
    		    padding: 30px 25px 25px;
    		}
    		.faq{
    			padding: 70px 0px;
    		}
        </style>
    </head>

    <body>        
        <section>
            <div class="innerTop">
                <div class="content">
                    <img class="images" src="http://res.cloudinary.com/arthurezenwanne/image/upload/v1523899157/image_arthurezenwanne.jpg" alt="@ArthurEzenwanne HNG Internship 4.0 image">
                </div>
            </div>
        </section>

        <section class="tab text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="#about" class="active">About Me</a></li>
                            <li><a href="#passion">My Vision For African Tech</a></li>
                            <li><a href="#vision">My Vision For Nigeria</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="grey-bg" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="feat-title"><h2>About Me</h2></div>
                        <div class="feat-brd"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="box-white">
                            <i class="fa fa-flash fa-3x"></i>
                            <h4 class="small-text">I. Learn</h4>
                            <p>I am <strong><em><?php echo "$internName";?></em></strong>, an Open Learner. I look out for opportunities to improve my skills set.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box-white">
                            <i class="fa fa-money fa-3x"></i>
                            <h4 class="small-text">I. Code</h4>
                            <p>Tech is a medium to uplift the African Youth. I have an interest in web technologies.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box-white">
                            <i class="fa fa-credit-card fa-3x"></i>
                            <h4 class="small-text">I. Network</h4>
                            <p>To achieve greatness, I must walk with others. I look out for networking opportunities and to be of value to my networks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="referral green-bg" id="passion">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">My Vision For African Tech</h2><br/><br/><br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box-trans text-center">
                            <i class="fa fa-list-alt fa-3x"></i>
                            <h4 class="small-text">SetUp. Environment</h4>
                            <p>I'd love to create an enabling enviroment for the African youth interested TransformingAfrica.</p>
                        </div>
                    </div>        
                    <div class="col-md-4">
                        <div class="box-trans text-center">
                            <i class="fa fa-user-plus fa-3x"></i>
                            <h4 class="small-text">Devs. Devs. Devs</h4>
                            <p>Invest in human capital and raise #100 core Devs in AI, BigData, IOT every year for the next 5 years.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-trans text-center">
                            <i class="fa fa-check fa-3x"></i>
                            <h4 class="small-text">Add. Value</h4>
                            <p>Create tech solutions that <strong><em>ACTUALL ADDS VALUE</em></strong> to human lives and improve wellbeing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="faq" id="vision">
            <div class="container">
                <div class="row">
                    <div class="feat-title col-md-12">
                        <h2 class="text-center">My Vision For Nigeria</h2>
                        <div class="feat-brd"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-white">
                                <i class="fa fa-flash fa-3x"></i>
                                <h4 class="small-text">Hhmmm...</h4>
                                <p class="text-center">Just find a way to <strong><em>POLITICALLY ELIMINATE</em></strong> all these Nigerian Political Leaders that has vowed <strong><em>NEVER TO DO THE RIGHT THINGS!!!</em></strong> and <strong><em>improve the standard of living of the Nigerian Youth</em></strong>!!!</p>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript" src="https://use.fontawesome.com/d17124b961.js"></script>
    </body>
</html>
