<?php
include_once("header.php");
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- styles link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

  <!-- font-awesome -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    main {
      margin-top: 50px;
    }
    a {
      text-decoration: none !important;
      color: #000;
    }
    .nav-item:hover,
    .active {
      border-bottom: none !important;
    }
    .nav-pills {
      border: 1px solid lightgrey;
    }
    .nav-pills .nav-link {
      border-radius: 0;
      border-bottom: 1px solid lightgrey;
      font-size: 1rem;
      color: grey;
      padding: 20px;
      text-align: center;
      background-color: #F4F4F4;
    }
    .nav-pills .nav-link:hover {
      font-size: 1rem;
      color: #007bff;
    }
    .nav-pills .nav-link.active {
      background-color: #F4F4F4;
      color: #007bff;
      border-bottom: 1px solid lightgrey !important;
    }
  </style>
</head>
<main>
  <div class="container" style="padding-top: 20px">
    <div class="row">
      <div class="col-3" style="padding-right: 30px">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="border-radius: 5px">
          <a class="nav-link active" id="v-pills-tab-1" data-toggle="pill" href="#v-pills-tab-1-label" role="tab" aria-controls="v-pills-tab-1-label"
            aria-selected="true" style="border-radius: 5px 5px 0px 0px">HNG 3.0</a>
          <a class="nav-link" id="v-pills-tab-2" data-toggle="pill" href="#v-pills-tab-2-label" role="tab" aria-controls="v-pills-tab-2-label"
            aria-selected="false">HNG 2.0</a>
          <a class="nav-link" id="v-pills-tab-3" data-toggle="pill" href="#v-pills-tab-3-label" role="tab" aria-controls="v-pills-tab-3-label"
            aria-selected="false" style="border-radius: 0px 0px 5px 5px">HNG 1.0</a>
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="v-pills-tabContent">
          <!-- hng 3.0 -->
          <div class="tab-pane fade show active" id="v-pills-tab-1-label" role="tabpanel" aria-labelledby="v-pills-tab-1">
            <img class="img-fluid" src="http://res.cloudinary.com/somiari/image/upload/v1525520338/3_zqwis4.jpg"
              width="100%" style="margin-bottom:20px;">

            <h3 style='padding: 40px 0px 30px 0px'>About HNG 3.0</h3>
            <p style="text-align: justify; font-size: 1rem; line-height: 170%" class="text-muted">Sept 1, 2017, the third edition of the prestigious hotels.ng remote internship started with over 1000 remote interns. This time the Akwa Ibom State Government supported the internship and promised that the Ibom e-library in Akwa Ibom state would be available for all interns within the region to use. This move ameliorated the issues of lack of power and internet for interns in that region and led to an increase in the levels of productivity of interns in that region. Of the over 1000 remote interns that signed up, only 100 actually made it to the finals. A lot of tools were built during the internship (e.g. Hotels.ng Android App, an Internal Financial tool for Hotels.ng, etc.) and a lot of lessons were learnt. The third edition of the hotels.ng internship consolidated the hng internship as the best remote software internship in the world, and as a favourite for all junior developers and designers.</p>
            <div class="row" style='padding: 40px 0px 30px 0px'>
              <div class="col-6">
                <h4 style="padding-bottom: 20px">Duration</h4>
                <p class="text-muted">August - November 2017</p>
              </div>
              <div class="col-6">
                <h4 style="padding-bottom: 20px">Final participants</h4>
                <p>
                  <a href="alumni.php" style="color: #007bff;">View Participants</a>
                </p>
              </div>
            </div>
            <h4 style="padding-bottom: 20px">Partners</h4>
            <img class="img-fluid rounded" src="img/hng-square.png" width="100" style="margin-right: 50px;">
            <img class="img-fluid rounded" src="http://res.cloudinary.com/somiari/image/upload/v1525524191/aks_logo_hvncqt.png" width="100" style="margin-right: 50px;">
          </div>
          <!-- end of hng 3.0 -->
          <!-- hng 2.0 -->
          <div class="tab-pane fade" id="v-pills-tab-2-label" role="tabpanel" aria-labelledby="v-pills-tab-2">
            <img class="img-fluid" src="https://res.cloudinary.com/somiari/image/upload/v1525526412/2.0_real_gkkbzs.jpg" width="100%" style="margin-bottom:20px;">
            <h3 style='padding: 40px 0px 30px 0px'>About HNG 2.0</h3>
            <p style="text-align: justify; font-size: 1rem; line-height: 170%" class="text-muted">January 3, 2017, Mark Essien (CEO, Hotels.ng) hinted the commencement of Hotels.ng remote internship programme in a tweet. That tweet fulfilled the promise of continuity and growth, and the pledge to help develop the Nigerian tech community, it opened up doors once more to people eager to learn and develop themselves, and set up the remote internship as a hotels.ng tradition. Not look after that tweet, the second edition of Hotels.ng Internship started, this time with over 800 remote interns on the Slack Workspace. It was as exciting and educative as the first edition and people that did not make it to the end of the first edition had another chance to prove themselves. Following the same strategy used in the previous one, interns were dropped weekly until they finally arrived at the final 30 (who are all doing wonders in their various fields now). As part of their projects during the internship, they built a Project Management Tool (Factory).</p>
            <div class="row" style='padding: 40px 0px 30px 0px'>
              <div class="col-6">
                <h4 style="padding-bottom: 20px">Duration</h4>
                <p class="text-muted">January - March 2017</p>
              </div>
              <div class="col-6">
                <h4 style="padding-bottom: 20px">Final participants</h4>
                <p>
                  <a href="alumni.php" style="color: #007bff;">View Participants</a>
                </p>
              </div>
            </div>
            <h4 style="padding-bottom: 20px">Partners</h4>
            <img class="img-fluid rounded" src="img/hng-square.png" width="100" style="margin-right: 50px;">
          </div>
          <!-- end of hng 2.0 -->
          <!-- hng 1.0 -->
          <div class="tab-pane fade" id="v-pills-tab-3-label" role="tabpanel" aria-labelledby="v-pills-tab-3">
            <img class="img-fluid" src="https://res.cloudinary.com/somiari/image/upload/v1525520360/1_lfjyd9.jpg" width="100%" style="margin-bottom:20px;">
            <h3 style='padding: 40px 0px 30px 0px'>About HNG 1.0</h3>
            <p style="text-align: justify; font-size: 1rem; line-height: 170%" class="text-muted">The prestigious Hotels.ng internship started far back as 2016 when Mr. Mark Essien (CEO, Hotels.ng) and Neo Ighodaro
              (Former CTO, Hotels.ng) conceived the idea to start a software development Internship. The plan was simple;
              anyone could join, but people would only get paid when they they deliver on their tasks. They kicked off the
              internship and 170 people started. The task they had to do at first was to setup git, pull and push some code.
              One week later, only 80 people were left in the programme. The second task was to write a bit of code (front-end
              mostly) and push to the repository. By the end of that week, only 30 people were left. Some dropped off because
              they could not meet up, and some because other things got in their way. The internship finished up with 15
              interns - brilliant software developers - people with the get-it-done attitude. They would run out of power
              and code on their phones. Some would go to class in the morning, and code at night. Some went to internet cafes
              to code. They ended up building 4 products - Spots.ng (a listing of places in Nigeria), Raven (an internal
              email sending tool), Locations API (an API for Nigerian addressing system), and a yet to be released product(Hotels.ng
              for Businesses).</p>
            <div class="row" style='padding: 40px 0px 30px 0px'>
              <div class="col-6">
                <h4 style="padding-bottom: 20px">Duration</h4>
                <p class="text-muted">August - October 2016</p>
              </div>
              <div class="col-6">
                <h4 style="padding-bottom: 20px">Final participants</h4>
                <p>
                  <a href="alumni.php" style="color: #007bff;">View Participants</a>
                </p>
              </div>
            </div>
            <h4 style="padding-bottom: 20px">Partners</h4>
            <img class="img-fluid rounded" src="img/hng-square.png" width="100" style="margin-right: 50px;">
            <!-- 
            <img class="img-fluid rounded" src="img/oracle-red.png" width="100" style="margin-right: 50px;">
          <img class="img-fluid rounded" src="img/figma-dark.png" width="100" style="margin-right: 50px;">
          <img class="img-fluid rounded" src="img/bluechips.png" width="100" style="margin-right: 20px;">
-->
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<div style='color: #3D3D3D; padding-bottom: 80px'>

</div>


<?php
    include_once("footer.php");
?>
