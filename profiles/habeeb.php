<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hng_fun";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$secret_word = "";
$secret_query = "SELECT * FROM secret_word WHERE id = 1";
$data = "SELECT * FROM interns_data WHERE intern_id = 15";

$query1 = mysqli_query($conn, "SELECT * FROM interns_data WHERE intern_id = 15");

while($res = mysqli_fetch_array($query1)){
$name = $res['name'];
$username = $res['username'];
$image_filename = $res['image_filename'];
}

$query2 = mysqli_query($conn, "SELECT * FROM secret_word WHERE id = 1");

while($res = mysqli_fetch_array($query2)){
    $secret_word = $res['secret_word'];
}
?>

<!DOCTYPE html>
<html>
<title>Habeeb Salaudeen </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Roboto", sans-serif
    }

</style>

<body class="w3-light-grey">

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">

                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-display-container">
                        <img src="<?php echo $image_filename; ?>" style="width:100%; border-radius: 50%;" alt="Avatar">
                        <div class="w3-display-bottomleft w3-container w3-text-black">
                            <h2 style="color:teal;"><?php echo $name; ?></h2>
                            <h4 style="color:teal;">Username: <?php echo $username; ?></h4>

                        </div>
                    </div>
                    <div class="w3-container">
                        <p>secret word: <?php echo $secret_word; ?></p>
                        <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Software Engineer</p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Nicosia, North Cyprus</p>
                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>hksalaudeen@gmail.com, hksalaudeen@outlook.com</p>
                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>+90 542 877 34 84, +234 813 968 64 04</p>
                        <hr>

                        <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
                        <p>Web Development</p>
                        <div class="w3-light-grey w3-round-xlarge w3-small">
                            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
                        </div>
                        <p>Android Development</p>
                        <div class="w3-light-grey w3-round-xlarge w3-small">
                            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">
                                <div class="w3-center w3-text-white">50%</div>
                            </div>
                        </div>
                        <p>Data Science and Machine Learning</p>
                        <div class="w3-light-grey w3-round-xlarge w3-small">
                            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:45%">45%</div>
                        </div>
                        <p>Desktop Application</p>
                        <div class="w3-light-grey w3-round-xlarge w3-small">
                            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
                        </div>
                        <br>

                        <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
                        <p>English</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
                        </div>
                        <p>Turkish</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-round-xlarge w3-teal" style="height:24px;width:45%"></div>
                        </div>
                        <p>French</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
                        </div>
                        <br>
                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>

            <!-- Right Column -->
            <div class="w3-twothird">

                <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Expertise</h2>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>Front End Developer / HTML5, CSS, Bootstrap, AngularJS</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
                        <p>Front end web development technologies and frameworks</p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>Back End Developer</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2014 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
                        <p>Development of server-side functionalities for applications using JAVA and nodejs. Knowledge of various back-end frameworks. Also integrating applications with databases such as MySQL and MongoDB, and cloud support. </p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>JavaFX Developer</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2016 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
                        <p>Developing Desktop applications with JavaFX using Java8 and frameworks including Hibernate, Spring e.t.c</p><br>
                    </div>
                     <div class="w3-container">
                        <h5 class="w3-opacity"><b>Python Developer</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2017 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
                        <p>Using various python libraries for Data Analysis project. I also use python in developing various Machine Learning algorithms and solutions</p><br>
                    </div>
                </div>

                <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education and Certification</h2>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>University of Michigan | Data Science</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2017</h6>
                        <p>Introduction to Data Science in Python (90.7%). Verify at <a href="coursera.org/verify/DWWCHRVXQUR7">https://www.coursera.org/account/accomplishments/certificate/DWWCHRVXQUR7</a></p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>Oracle Certified Associate</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2016</h6>
                        <p>Java Programmer, SE7</p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>Cyprus International University | Information Technologies</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2017 - 2018</h6>
                        <p>Masters Degree</p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>Kwara State University | Computer Science</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2011 - 2015</h6>
                        <p>Bachelor Degree</p><br>
                    </div>
                </div>
                 <div class="w3-container w3-card-2 w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Interests</h2>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>Software Engineering</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
                        <p>To fully understand the development of standard professional software with all standards and principles checked and which leaves room for maintaining and scaling. </p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>Open Source and Open Data</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
                        <p>To develop critical skills, and muster action toward a more open system for sharing the world’s information—from software and scientific research, to educational materials, to digital research data</p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>Photography | Street</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
                        <p>Hobby</p><br><hr>
                    </div>
                     <div class="w3-container">
                        <h5 class="w3-opacity"><b>Food</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
                        <p>Hobby</p><br>
                    </div>
                </div>



                <!-- End Right Column -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>

    <footer class="w3-container w3-teal w3-center w3-margin-top">
        <p>Find me on social media.</p>
        <a href="https://www.facebook.com/hsalaudeen1"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
        <a href="https://www.instagram.com/habibiskolapo/"><i class="fa fa-instagram w3-hover-opacity"></i></a>
        <a href="https://twitter.com/habeebkolapo"><i class="fa fa-twitter w3-hover-opacity"></i></a>
        <a href="https://www.linkedin.com/in/habeeb-salaudeen-8890b994/"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
        <p>Powered by <a href="#" target="_blank">softcast tech</a></p>
    </footer>

</body>

</html>
