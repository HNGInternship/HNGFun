<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />
  <meta name="author" content="Umar Yusuf" />

  <title>Umar Yusuf</title>

  <!-- shortcut icon -->
  <link rel="shortcut icon" href="" />

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.2.43/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  <style>
     body{
        font-family: ubuntu;
        background-color: #fcfcfc;
      }

      nav ul a,
      nav .brand-logo {
        color: #444;
      }
      .brand-logo{
        font-family: pacifico;
      }
      p {
        line-height: 2rem;
      }

      .button-collapse {
        color: #26a69a;
      }
      .block{
        width: 100%;
      }
      .desc{
        font-weight: bold;
      }
      .parallax-container {
        min-height: 360px;
        line-height: 0;
        height: auto;
        color: rgba(255,255,255,.9);
      }
      .round{
        padding: 10px;
        background-color: #ffab40;
        border-radius: 10px;
      }
      .photo{
        width: 300px;
      }
      .card-title{
        color: #ffab40 !important;
        font-weight: bold !important;
      }
      .parallax-container .section {
        width: 100%;
      }

      @media only screen and (max-width : 992px) {
        .parallax-container .section {
          position: absolute;
          top: 40%;
        }
        #index-banner .section {
          top: 10%;
        }
      }

      @media only screen and (max-width : 600px) {
        #index-banner .section {
          top: 0;
        }
        .photo{
          width: 150px;
        }
        h1{
          font-size: 2em;
        }
      }

      .icon-block {
        padding: 0 15px;
      }
      .icon-block .material-icons {
        font-size: inherit;
      }

      footer.page-footer {
        margin: 0;
      }
  </style>
</head>
<body>
 <!--  <div class="navbar-fixed"> -->
    <nav class="white" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="index.html" class="brand-logo orange-text accent-2">umaryusuf</a>
        <ul class="right hide-on-med-and-down">
          <li class=""><a href="#about" class="orange-text accent-2">About</a></li>
          <li class=""><a href="#portfolio" class="orange-text accent-2">Portfolio</a></li>
          <li class=""><a href="#contact" class="orange-text accent-2">Contact</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li>
            <div class="userView">
              <div class="background">
                <img src="https://images.pexels.com/photos/370799/pexels-photo-370799.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="responsive-img">
              </div>
              <a href="#"><img class="circle" src="https://scontent.fabv1-1.fna.fbcdn.net/v/t1.0-9/28279304_1562888970497340_4021730504442038310_n.jpg?_nc_cat=0&_nc_eui2=v1%3AAeHhvadUhw1OSKseoz2oT3Mzn1dnnQcM43W12tkQwZgq1SVt0PV2jDqWcbl8xVLpVR7xRYLJEHTQWS5AeDwa4QD8_KzgdV3pqrz2dFyRFjW0NA&oh=4b52810f095888bd7072bea04fc01dd5&oe=5B285CA4"></a>
              <a href="#"><span class="white-text name">Umar Yusuf</span></a>
              <a href="#"><span class="white-text email">umaryusuf602@gmail.com</span></a>
            </div>
          </li>
          <li><a href="#about" class="orange-text accent-2">About</a></li>
          <li><a href="#portfolio" class="orange-text accent-2">Portfolio</a></li>
          <li><a href="#contact" class="orange-text accent-2">Contact</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi mdi-menu"></i></a>
      </div>
    </nav>
 <!--  </div> -->

  <div id="index-banner" class="parallax-container">
    <div  class="section no-pad-bot scrollspy" id="about">
      <div class="container center">
        <br>
        <img src="https://scontent.fabv1-1.fna.fbcdn.net/v/t1.0-9/28279304_1562888970497340_4021730504442038310_n.jpg?_nc_cat=0&_nc_eui2=v1%3AAeHhvadUhw1OSKseoz2oT3Mzn1dnnQcM43W12tkQwZgq1SVt0PV2jDqWcbl8xVLpVR7xRYLJEHTQWS5AeDwa4QD8_KzgdV3pqrz2dFyRFjW0NA&oh=4b52810f095888bd7072bea04fc01dd5&oe=5B285CA4" class="circle responsive-img photo" alt="umar yusuf">
        <h1 class="header center text-lighten-2 ">Umar Yusuf</h1>
        <div class="row center">
          <h5 class="header col s12 orange-text accent-2 flow-text desc">Hello!, I'am Umar Yusuf web application developer based in Kaduna Nigeria, I provide application development, enhancement, and I also accept paid work.</h5>
        </div>
        <div class="row center">
          <a href="#" id="download-button" class="btn-large hoverable waves-effect waves-light teal lighten-1">lets get to work</a>
        </div>
        <br>
      </div>
    </div>
    <div class="parallax"><img src="https://images.pexels.com/photos/370799/pexels-photo-370799.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Unsplashed background img 1"></div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m12">
          <h4 class="center-align orange-text accent-2">Languages & Skills</h4>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-text accent-2"><i class="mdi mdi-flash"></i></h2>
            <ul class="collection">
              <li class="collection-item">
                <div>HTML
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-html5"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>CSS
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-css3"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>JavaScript
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-javascript"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>PHP
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-php"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>SQL
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-code-tags"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Mongodb
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-code-tags"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-text accent-2"><i class="mdi mdi-group"></i></h2>
            <ul class="collection">
              <li class="collection-item">
                <div>Twitter Bootstrap
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-css3"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Materialize
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-css3"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Foundation
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-css3"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>AngularJS
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-angular"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>ReactJS
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-language-javascript"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Sass
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-code-tags"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-text accent-2t"><i class="mdi mdi-settings"></i></h2>
            <ul class="collection">
              <li class="collection-item">
                <div>Web Design
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-web"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Front-end Development
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-xml"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Back-end Development
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-code-braces"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>UI/UX design
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-account-check"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Mobile Web Development
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-cellphone-android"></i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Progressive Web Apps
                  <a href="#" class="secondary-content">
                    <i class="mdi mdi-google-physical-web"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div  class="section no-pad-bot ">
      <div class="container">
        <div class="row center">
          <h2 id="portfolio" class="header center text-lighten-2 scrollspy">Portfolio</h2>
          <h5 class="header col s12 orange-text accent-2">These are some of the projects i've made.</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="https://images.pexels.com/photos/547114/pexels-photo-547114.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m4 center">
          <div class="card hoverable">
            <div class="card-image">
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAYFBMVEXa2tpVVVXd3d1MTExSUlK2trZvb29LS0tTU1Ph4eGNjY2cnJzU1NRaWlpgYGBPT0+np6fGxsavr6/AwMCGhoaioqJpaWnMzMx+fn6UlJS7u7t1dXWzs7NERERkZGSdnZ1LtC8/AAACkElEQVR4nO3b626qQBRAYeYiM2NVVPCCWvv+b3lEUUDhpIpJ42Z9/0qFOCsTYFCjCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwCPqN/nosr9Grdfw+4a+H8xL95bx9F/+pDRL1PjSgAQ0kNLDOuFeZxHgBDZJ8N+phNxPQwCxDn3ujMPMCGsx7vX0hDXrd54pokDzZ4G5pMLwGWqfL5aa+w+Aa6EV8upDarLZpaA30wtvzKWRfbRtcg315Z+mqfYbWYHO9ufbxUBvokbmuDqaiG/wvSHprMJPcQI+2nRV0VK4NVJLdhiyxwdqNO4ej59+X04HfCJ4HemmUybsj5C7xiVG76hXyGkTH04jMT3eENIvjfBOqXcQ10KvzWc+tuiPoEEJ9ySCuQTS9DKh4ptB4afdRpDUIeVI+GXOH+pj0rjuCtAaT6+VfeVsf9kRtO6eCsAYhqz1odmk1PbIkWU86IshqoDemSqDsdHHb7k5/HjftEYQ12DY+b7C2HHXYFwtmm6StwxTVQKdONdjZOYI+XKaH9cu2cYpqEGKr7iNMin+Ug+y4bZDUoLYwvinOhPqr2m7Gj+cESQ2itX9ooGwcTWqbvXm8RgpqEOatH8Am26yx/TwzGkcR1ECrlmlQzIS7NHa2kNogrB7PBu1sfeEcSWowmf4yQbFD4xoppoFe/HYaFFweqlOjoAZPfSXFZAKfoTzZQJn9bQklqUH7ZaGDN6clVHl7KaeBnz4rvRxFTIPTheF5l6MIavAyGohpEHo5Cmjg9+M+8vIO86MbnJZFvSgJDd6DBjSgwUc3yL/NuzjzmQ2ixaHPl/abDh/64z5+3wgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAz/kH0Z07XHC7XZ8AAAAASUVORK5CYII=">
            </div>
            <div class="card-content">
              <span class="card-title">HNG inter</span>
              <p>Official google developers group website, kaduna state university</p>
            </div>
            <div class="card-action">
              <a href="#">Visit HNG Intrn</a>
            </div>
          </div>
        </div>

        <div class="col s12 m4 center">
          <div class="card hoverable">
            <div class="card-image">
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAYFBMVEXa2tpVVVXd3d1MTExSUlK2trZvb29LS0tTU1Ph4eGNjY2cnJzU1NRaWlpgYGBPT0+np6fGxsavr6/AwMCGhoaioqJpaWnMzMx+fn6UlJS7u7t1dXWzs7NERERkZGSdnZ1LtC8/AAACkElEQVR4nO3b626qQBRAYeYiM2NVVPCCWvv+b3lEUUDhpIpJ42Z9/0qFOCsTYFCjCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwCPqN/nosr9Grdfw+4a+H8xL95bx9F/+pDRL1PjSgAQ0kNLDOuFeZxHgBDZJ8N+phNxPQwCxDn3ujMPMCGsx7vX0hDXrd54pokDzZ4G5pMLwGWqfL5aa+w+Aa6EV8upDarLZpaA30wtvzKWRfbRtcg315Z+mqfYbWYHO9ufbxUBvokbmuDqaiG/wvSHprMJPcQI+2nRV0VK4NVJLdhiyxwdqNO4ej59+X04HfCJ4HemmUybsj5C7xiVG76hXyGkTH04jMT3eENIvjfBOqXcQ10KvzWc+tuiPoEEJ9ySCuQTS9DKh4ptB4afdRpDUIeVI+GXOH+pj0rjuCtAaT6+VfeVsf9kRtO6eCsAYhqz1odmk1PbIkWU86IshqoDemSqDsdHHb7k5/HjftEYQ12DY+b7C2HHXYFwtmm6StwxTVQKdONdjZOYI+XKaH9cu2cYpqEGKr7iNMin+Ug+y4bZDUoLYwvinOhPqr2m7Gj+cESQ2itX9ooGwcTWqbvXm8RgpqEOatH8Am26yx/TwzGkcR1ECrlmlQzIS7NHa2kNogrB7PBu1sfeEcSWowmf4yQbFD4xoppoFe/HYaFFweqlOjoAZPfSXFZAKfoTzZQJn9bQklqUH7ZaGDN6clVHl7KaeBnz4rvRxFTIPTheF5l6MIavAyGohpEHo5Cmjg9+M+8vIO86MbnJZFvSgJDd6DBjSgwUc3yL/NuzjzmQ2ixaHPl/abDh/64z5+3wgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAz/kH0Z07XHC7XZ8AAAAASUVORK5CYII=">
            </div>
            <div class="card-content">
              <span class="card-title">Online Snack Ordering</span>
              <p>An online platform for snack ordering that delivers a very delicious snacks.</p>
            </div>
            <div class="card-action">
              <a href="#">Visit this link</a>
            </div>
          </div>
        </div>

        <div class="col s12 m4 center">
          <div class="card hoverable">
            <div class="card-image">
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAYFBMVEXa2tpVVVXd3d1MTExSUlK2trZvb29LS0tTU1Ph4eGNjY2cnJzU1NRaWlpgYGBPT0+np6fGxsavr6/AwMCGhoaioqJpaWnMzMx+fn6UlJS7u7t1dXWzs7NERERkZGSdnZ1LtC8/AAACkElEQVR4nO3b626qQBRAYeYiM2NVVPCCWvv+b3lEUUDhpIpJ42Z9/0qFOCsTYFCjCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwCPqN/nosr9Grdfw+4a+H8xL95bx9F/+pDRL1PjSgAQ0kNLDOuFeZxHgBDZJ8N+phNxPQwCxDn3ujMPMCGsx7vX0hDXrd54pokDzZ4G5pMLwGWqfL5aa+w+Aa6EV8upDarLZpaA30wtvzKWRfbRtcg315Z+mqfYbWYHO9ufbxUBvokbmuDqaiG/wvSHprMJPcQI+2nRV0VK4NVJLdhiyxwdqNO4ej59+X04HfCJ4HemmUybsj5C7xiVG76hXyGkTH04jMT3eENIvjfBOqXcQ10KvzWc+tuiPoEEJ9ySCuQTS9DKh4ptB4afdRpDUIeVI+GXOH+pj0rjuCtAaT6+VfeVsf9kRtO6eCsAYhqz1odmk1PbIkWU86IshqoDemSqDsdHHb7k5/HjftEYQ12DY+b7C2HHXYFwtmm6StwxTVQKdONdjZOYI+XKaH9cu2cYpqEGKr7iNMin+Ug+y4bZDUoLYwvinOhPqr2m7Gj+cESQ2itX9ooGwcTWqbvXm8RgpqEOatH8Am26yx/TwzGkcR1ECrlmlQzIS7NHa2kNogrB7PBu1sfeEcSWowmf4yQbFD4xoppoFe/HYaFFweqlOjoAZPfSXFZAKfoTzZQJn9bQklqUH7ZaGDN6clVHl7KaeBnz4rvRxFTIPTheF5l6MIavAyGohpEHo5Cmjg9+M+8vIO86MbnJZFvSgJDd6DBjSgwUc3yL/NuzjzmQ2ixaHPl/abDh/64z5+3wgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAz/kH0Z07XHC7XZ8AAAAASUVORK5CYII=">
            </div>
            <div class="card-content">
              <span class="card-title">Website</span>
              <p>An educational project, that allows students to easy swap their books.</p>
            </div>
            <div class="card-action">
              <a href="#">Visit this link</a>
            </div>
          </div>
        </div>
      </div><!--end first row-->
    </div><!--end section-->
  </div><!--end container-->

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center scrollspy" id="contact">
          <h2 class="header center text-lighten-2">Contact</h2>
          <h5 class="header col s12 orange-text accent-2">Write to me and start working on your dream project</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Unsplashed background img 3"></div>
  </div>
  
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m3 push-m8 offset-m1">
          <h4 class="orange-text accent-2">Address:</h4>
          <p><i class="mdi mdi-map-marker orange-text accent-2"></i> Barnawa, Kaduna State, Nigeria. </p>
          <p><i class="mdi mdi-phone-in-talk orange-text accent-2"></i> +234 (0) 806 6249 684</p>
          <p><i class="mdi mdi-email orange-text accent-2"></i> umaryusuf***@site.com</p>
        </div>
        <div class="col s12 m8 pull-m4 ">
          <div class="row">
            <h4 class="orange-text accent-2">Message:</h4>
            <form class="col s12" role="form" method="POST" action="">
              <div class="input-field">
                <i class="mdi mdi-account prefix"></i>
                <input id="fullname" type="text" class="validate" name="fullname">
                <label for="fullname">Full Name:</label>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="mdi mdi-cellphone prefix"></i>
                  <input id="phone" type="tel" class="validate" name="phone">
                  <label for="phone">Phone:</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="mdi mdi-email-outline prefix"></i>
                  <input id="email" type="email" class="validate" name="email">
                  <label for="email">Email:</label>
                </div>
              </div>
              <div class="input-field">
                <i class="mdi mdi-message prefix"></i>
                <textarea id="message" class="materialize-textarea" name="message"></textarea>
                <label for="message">Message:</label>
              </div>
              <button class="btn btn-large waves-effect waves-light block" type="submit" name="submit">Send Message
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fixed-action-btn">
    <a class="btn-floating btn-large orange accent-3">
      <i class="large mdi mdi-pencil"></i>
    </a>
    <ul>
      <li class="waves-effect waves-light">
        <a class="btn-floating blue lighten-1" href="#"><i class="mdi mdi-twitter"></i></a>
      </li>
      <li class="waves-effect waves-light">
        <a class="btn-floating blue darken-4" href="#"><i class="mdi mdi-facebook"></i></a>
      </li>
      <li class="waves-effect waves-light">
        <a class="btn-floating red darken-2" href="#"><i class="mdi mdi-google-plus"></i></a>
      </li>
      <li class="waves-effect waves-light">
        <a class="btn-floating blue darken-2" href="#"><i class="mdi mdi-linkedin"></i></a>
      </li>
      <li class="waves-effect waves-light">
        <a class="btn-floating pink accent-1" href="#"><i class="mdi mdi-instagram"></i></a>
      </li>
    </ul>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About Me</h5>
          <p class="grey-text text-lighten-4">Hello!, I'am Umar Yusuf web application developer based in Kaduna Nigeria, I provide application development, enhancement, and I also accept paid work.</p>

        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Projects</h5>
          <ul>
            <li class="white-text">GDD Kasu</li>
            <li class="white-text">Online Snacks Ordering</li>
            <li class="white-text">Swap my book</li>
            <li class="white-text">KTC etc.</li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#">twitter</a></li>
            <li><a class="white-text" href="#">facebook</a></li>
            <li><a class="white-text" href="#">google-plus</a></li>
            <li><a class="white-text" href="#">linkedin</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="#">Umar Yusuf</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script>
    (function($){
        $(function(){
              
          $('.button-collapse').sideNav();
          $('.parallax').parallax();
          $('.scrollspy').scrollSpy();

          $('.button-collapse').sideNav({
            menuWidth: 240,
            edge: 'left', 
            closeOnClick: true, 
            draggable: true,
          });

        }); // end of document ready
      })(jQuery); // end of jQuery name space
  </script>
  </body>
</html>
