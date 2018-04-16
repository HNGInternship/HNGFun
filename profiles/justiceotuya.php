<!doctype html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Justice Otuya</title>

  <style>
    html,
    body,
    div,
    span,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    a,
    img,
    small {
      margin: 0;
      padding: 0;
      border: 0;
      font-size: 100%;
      font: inherit;
      vertical-align: baseline;
      outline: none;
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    html {
      overflow-y: scroll;
    }

    body {
      background: #f0f0f0;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      color: #313131;
      font-size: 62.5%;
      line-height: 1;
    }

    img {
      border: 0;
      max-width: 100%;
    }

    /** typography **/

    h1 {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      font-size: 2.5em;
      line-height: 1.5em;
      letter-spacing: -0.05em;
      margin-bottom: 20px;
      padding: .1em 0;
      color: #444;
      position: relative;
      overflow: hidden;
      white-space: nowrap;
      text-align: center;
    }

    h1:before,
    h1:after {
      content: "";
      position: relative;
      display: inline-block;
      width: 50%;
      height: 1px;
      vertical-align: middle;
      background: #f0f0f0;
    }

    h1:before {
      left: -.5em;
      margin: 0 0 0 -50%;
    }

    h1:after {
      left: .5em;
      margin: 0 -50% 0 0;
    }

    h1>span {
      display: inline-block;
      vertical-align: middle;
      white-space: normal;
    }


    h2 {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      font-size: 2.1em;
      line-height: 1.4em;
      letter-spacing: normal;
      margin-bottom: 20px;
      padding: .1em 0;
      color: #444;
      position: relative;
      overflow: hidden;
      white-space: nowrap;
      text-align: center;
    }

    p {
      display: block;
      font-size: 1.4em;
      line-height: 1.55em;
      margin-bottom: 22px;
      color: #555;
    }

    a {
      color: #5a9352;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    /** page structure **/

    #w {
      display: block;
      width: 750px;
      margin: 0 auto;
      padding-top: 30px;
      padding-bottom: 45px;
    }

    .content {
      display: inline-block;
      width: 50%;
      background: #fff;
      padding: 25px 20px;
      padding-bottom: 35px;

      -webkit-box-shadow: 10px 10px 31px -5px rgba(6, 15, 5, 0.55);
      -moz-box-shadow: 10px 10px 31px -5px rgba(6, 15, 5, 0.55);
      box-shadow: 10px 10px 31px -5px rgba(6, 15, 5, 0.55);

    }

    #userphoto {
      display: block;
      float: right;
      margin-left: 10px;
      margin-bottom: 8px;
    }

    #userphoto img {
      display: block;
      padding: 2px;
      background: #fff;
      -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
      -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    }

    .setting {
      display: block;
      font-weight: normal;
      padding: 7px 3px;
      border-top: 1px solid #d6d1af;
      margin-bottom: 5px;
    }

    .setting span {
      float: left;
      width: 250px;
      font-weight: bold;
    }

    .setting span img {
      cursor: pointer;
    }

    /** clearfix **/

    .clearfix:after {
      content: ".";
      display: block;
      clear: both;
      visibility: hidden;
      line-height: 0;
      height: 0;
    }

    .clearfix {
      display: inline-block;
    }

    html[xmlns] .clearfix {
      display: block;
    }

    * html .clearfix {
      height: 1%;
    }
  </style>
</head>

<body>


  <div id="w">
    <div class="content" class="clearfix">


      <h1>
        <?php echo $user->name ?>
      </h1>
      <small>(@
        <?php echo $user->username ?>)</small>


      <section id="bio">
        <p>Charismatic and energetic individual who is creative and is looking for a fast-paced environment where he can develop
          his IT skills and is a firm believer of self- learning and development , Opportunities are all i ask for, I love
          learning and experimenting with technology and as such resourceful and versatile. Researching is my forte</p>
      </section>

      <section id="settings">
        <p>Details</p>

        <p class="setting">
          <span>E-mail Address
          </span> jotuya2@gmail.com</p>

        <p class="setting">
          <span>Language
          </span> JS, jQuery,html,css, mjml, php(in-view)</p>

        <p class="setting">
          <span>Connected Accounts
          </span> None</p>
      </section>
    </div>
    <!-- @end #content -->
    <div class="content" style="float: right;">
      <div id="userphoto">
        <img src="<?php echo $user->image_filename ?>" />
	  </div>
	  <div>
		  <a href="https://github.com/justiceotuya">
				<i class="fa fa-github"></i>

			</a>
			<a href="https://twitter.com/justiceotuya">
				<i class="fa fa-twitter"></i>

			</a>
			<a href="https://facebook.com/justiceotuya">
				<i class="fa fa-facebook"></i>
	  </div>
    </div>

  </div>
  <!-- @end #w -->

</body>

</html>