<?php 
    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

        throw $err;
    }?>

<style>
      body {
			
			background-size: cover;
		}
		p{ color:white
		
		}
		h1{ color: blue
		}
		h3{ color: blue
		}
      </style>

  </head>

  <body style = "background-image:url(http://res.cloudinary.com/iamdharmy/image/upload/v1523622015/iam__dharmy.png)">

  

<!-- Main Content -->

<div class="container">

    <div class="testimonial">
        <div class="col-lg-10 col-md-10 mx-auto">
		<br/><br/>
		<h1>Welcome to iam__dharmy profile</h1>
		<br/><br/>
		
		
            <h3>Here is a little about me</h3>
            <p>I am an effective, creative and proactive individual, with a personal objective to build a career in an Information Technology company with a continuous improvement Environment</p>
            <p>And so far HNG Internship has been helping in developing my IT skills in order for me to be able to achieve this objective.</p>
        </div>
    </div>
	<div class="testimonial">
                                    <!--Avatar-->
                                    <div class="avatar mx-auto">
                                        <img src="http://res.cloudinary.com/iamdharmy/image/upload/v1523622015/iam__dharmy.png" class="rounded-circle img-fluid">
                                    </div>
                                    <!--Content-->
                                    <h4>iam__dharmy</h4>
                                    <h6 class="blue-text font-weight-bold">Intern - HNG Internship 4</h6>
                                    <p>
                                        <i class="fa fa-quote-left"></i> This internship has been WOW.
                                        I've been able to greatly improve my html/css and design skills, and I have learnt the use of github, figma, MySQL, Pivotal Tracker, Dropbox Paper and so many other tools.</p>
                                </div>
</div>
 <footer>
<div>
				<a href="https://github.com/iam-dharmy"><i class="fa fa-github"></i></i></a>
				<a href="https://twitter.com/iam@dharmy"><i class="fa fa-twitter"></i></i></a>
				<a href="https://medium.com/@damis"><i class="fa fa-medium"></i></i></a>
				<a href="https://web.facebook.com/soyombo.damilola"><i class="fa fa-facebook"></i></i></a>	
			</div>
</footer>
</body>
</html>