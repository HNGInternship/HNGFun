<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style>
        html, body {
    
    height: auto;
    margin: 0;
}

a {
    color: #ffa500;
}
.container {
    min-height: 100%;
    background: white;
    margin-left: 274px;
    position: relative;
    width: auto;
    overflow: auto;
    z-index: 1;
}
        
.Experience {
    margin-top: 74px;
}

.sidebar {
   width: 274px;
   position: fixed;
   height: 100%;
   background: black;
}

.content {
    width: auto;
    position: relative;
/*    background: white;*/
}

.sidebar-img {
    text-align: center;
    margin-top: 30px;

}

.img {
    border-radius: 131px;
    width: 250px;
}

.sidebar-text {
    text-align: center;
    margin-top: 75px;
}

.sidebar-text p {
    font-family: Satisfy;
    color: #FFA500;
    margin-top: 30px;
    font-size: 22px;
    
}

.social-links {
   margin-top: 75px;
/*   text-align: center;*/
}

.social-links img {
    margin-left: 45px;
    width: 30px;
    height: 30px;
    border-radius: 43px;
}

.content h1 {
    text-align: center;
}

.line {
    position: absolute;
    width: 248.33px;
    height: 0px;
    left: 428px;
    top: 50px;
    border: 1px solid #FFA500;
    transform: rotate(-4.49deg);
}


.writeups {
    margin-left: 60px;
    text-align: center;
}

.writeups p{
    font-size: 22px;
}

.colored {
    font-size: 40px;
}

.resume-content i {
    color: #FFA500;
}

.resume-content i {
    color: darkgray;
}

.resume-content .subheading {
    color: #FFA500;
}
    </style>
</head>
<body>
 <?php include "../header.php"; ?>
  <div class="sidebar">
     <div class="sidebar-img">
        <img class="img" src="https://scontent.flos5-1.fna.fbcdn.net/v/t1.0-9/12189606_682208521882532_6052298851762801031_n.jpg?_nc_cat=0&oh=f3af5a1e0f3278ad46141948a7ac6aa0&oe=5B516735" alt="profile picture" >
     </div>
     <div class="sidebar-text">
         <p>Kingsley Arinze</p>
         <p>Fullstack Web Developer</p>
     </div>
     <div class="social-links">
         <a href="https://github.com/King-Success"><img src="http://res.cloudinary.com/code4king/image/upload/v1523889230/github-icon.jpg" alt="github logo"></a>
         <a href="https://twitter.com/Ben_bruzzy"><img src="http://res.cloudinary.com/code4king/image/upload/v1523889241/twitter-logo_318-40209.jpg" alt="twitter logo"></a>
         <a href="https://medium.com/@kingsleyarinze"><img src="http://res.cloudinary.com/code4king/image/upload/v1523889250/medium-logo-white-on-black.png" alt="Medium logo"></a>
     </div>
  </div>
   <div class="container">
       <div class="content">
           <h1 class="Experience">Experience</h1>
<!--           <div class="line"></div>-->
           <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Private Projects </h3><i>March 2015 - Present</i>
              <div class="subheading mb-3">Agora, Fsprinters, campustell...</div>
              <p>I have delivered quiet a number of personal website for my client amongst which includes an Ecommerce website, a private buisness website, a mini social media app for my department at school and lots more.You can take a peep at the source code <a href="https://github.com/King-Success">here</a>.</p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Web Developer Intern</h3><i>September 2016 - March 2017</i>
              <div class="subheading mb-3">SoftSmart Buisness Solutions</div>
              <p>Built micro-services for high scalability. Recommended best-practices for design and implementation of new software projects.
Code reviewed other engineers code via team collaboration tool git.
Interfaced with clients for requirements gathering.
Translated business requirements to stories using Jira Atlassian and Trello boards.
Created database and table schema, including relational and document type database.
Coordinated team stand-up meetings.
Coordinated agile tests of features, improvements and bug fixes.
Wrote server side,frontend code using PHP, Python, HTML, CSS, and JavaScript.
Worked alongside other developers to write backend logics including database setup.
Maintained legacy code.</p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">E-Voting System</h3><i>September 2015</i>
              <div class="subheading mb-3">Abubakar Tafawa Belewa University</div>
              <p>I contributed in delivering an Electronic Voting System to my school for its 2015/2016 session's student union goverment (SUG) elections. I was part of a four developers team and used slack for internal communication. I used PHP to write server side code, JavaScript for its frontend and Mysql database.</p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">E-Hostel Booking Portal</h3><i>March 2015</i>
              <div class="subheading mb-3">Abubakar Tafawa Belewa University</div>
              <p> I perticipated in a Hackathon orgainised by the Department of Information and Communication Technology (DICT). I was part of a team of four that delivered an E-Hostel Booking portal, i wrote APIs in PHP, used Mysql database and JavaScript for client side code.</p>
            </div>
          </div>

        </div>

      </section>
       </div>
   </div>
   
   <?php include "../footer.php"; ?>
   
  <?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;
  $result2 = $conn->query("Select * from interns_data where username = 'king'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
  
  try {
      $sql = "SELECT secret_word FROM secret_word";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
?>
    
</body>
</html>