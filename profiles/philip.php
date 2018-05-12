<?php 
    try {
        $secrete = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $result = $sql->fetch();
        $secret_word = $result["secret_word"];
    } catch (PDOException $error) {
        throw $error;
    }?>

<!DOCTYPE html>
        <html>
        <head>
            <title>PHILIP OBIORAH</title>
            <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Clicker+Script|Cormorant+Upright|Graduate|Gugi|Libre+Barcode+39+Text|Philosopher" rel="stylesheet">
            <style type="text/css">

            body{
               background-color:#F2F2F2;
           }
           .social_icons{
              position:absolute;
              top:70%;
               left:20%;

          }

          .heading{
              /* Rectangle */

              position: absolute;
              width: 100%;
              height: 66px;
              left: 0px;
              top: 6px;
              -webkit-box-shadow: 10px 10px 94px 7px rgba(25,189,10,1);
              -moz-box-shadow: 10px 10px 94px 7px rgba(25,189,10,1);
              box-shadow: 10px 10px 94px 7px rgba(25,189,10,1);
              border-radius: 108.5px;
              background: #DDCBE3;

              /* PHILIP OBIORAH */
              text-align:center;
              /*font-family: Quattrocento;*/
              font-family: 'Philosopher', sans-serif;
              font-style: normal;
              font-weight: bold;
              line-height: normal;
              font-size: 48px;
              letter-spacing: 0.4em;

              color: #000000;
          }
          .bio{
              position: absolute;
              width: 70%;
              height: 84px;
              left: 15%;
              top: 434px;

              /*background: #DDCBE3;*/
              background: rgba(226,226,226,1);
              border-radius: 108.5px;
              -webkit-box-shadow: 10px 10px 94px 7px rgba(25,189,10,1);
              -moz-box-shadow: 10px 10px 94px 7px rgba(25,189,10,1);
              box-shadow: 10px 10px 94px 7px rgba(25,189,10,1);

              font-family: 'Aref Ruqaa', serif;
              font-style: normal;
              font-weight: thin;
              line-height: normal;
              font-size: 20px;
              letter-spacing: 0.1em;
              text-align: center;
              color: #000000;
              padding: 10px;
              border: solid #6ed926 2px;
          }

          img{
              border-radius:50%;
              position: absolute;
              width: 211px;
              height: 211px;
              left: 40%;
              top: 139px;

              /*border:2px solid #4c4a91;*/
              background-image: url(http://res.cloudinary.com/atimorcloud/image/upload/c_scale,w_150/v1525036584/knlfzGAX_400x400.jpg);
              background-repeat: no-repeat;
              #C4C4C4;
              -webkit-box-shadow: -1px 1px 18px 7px rgba(129,13,140,1);
              -moz-box-shadow: -1px 1px 18px 7px rgba(129,13,140,1);
              box-shadow: -1px 1px 18px 7px rgba(129,13,140,1);
              background-size: cover;

          }


          /* Thanks to Ruandré Janse van Rensburg  for the Social Media Icons @ https://codepen.io/ruandre/pen/howFi   */
          html {
              box-sizing: border-box;
          }

          /* *, *:before, *:after {
              box-sizing: inherit;
          } */

          html {
              background: #0e1a25;
              font-size: 0.625em;
          }

          .soc {
              display: block;
              font-size: 0;
              list-style: none;
              margin: 0;
              padding: 48px;
              padding: 4.8rem;
              text-align: center;
          }
          .soc li {
              display: inline-block;
              margin: 12px;
              margin: 1.2rem;
          }
          .soc a, .soc svg {
              display: block;
          }
          .soc a {
              position: relative;
              height: 96px;
              height: 9.6rem;
              width: 96px;
              width: 9.6rem;
          }
          .soc svg {
              height: 100%;
              width: 100%;
          }
          .soc em {
              font-size: 14px;
              line-height: 1.5;
              margin-top: -0.75em;
              position: absolute;
              text-align: center;
              top: 50%;
              right: 0;
              bottom: 0;
              left: 0;
          }

           .email_icon:hover, .facebook_icon:hover, .github_icon:hover, .linkedin_icon:hover, .twitter_icon:hover, .stackoverflow_icon:hover{
              border-radius: 100%;
              color: #0e1a25;
              fill: #0e1a25;
              -webkit-transform: scale(1.25);
              transform: scale(1.25);
              transition: background-color 0.5s, -webkit-transform 0.5s ease-out;
              transition: background-color 0.5s, transform 0.5s ease-out;
              transition: background-color 0.5s, transform 0.5s ease-out, -webkit-transform 0.5s ease-out;
          }

          
          .email_icon {
              color: #6ed926;
              fill: #6ed926;
          }
          .email_icon:hover {
              background: #6ed926;
          }

          .facebook_icon {
              color: #26d926;
              fill: #26d926;
          }
          .facebook_icon:hover {
              background: #26d926;
          }

          .github_icon {
              color: #26d991;
              fill: #26d991;
          }
          .github_icon:hover {
              background: #26d991;
          }

          .linkedin_icon {
              color: #2691d9;
              fill: #2691d9;
          }
          .linkedin_icon:hover {
              background: #2691d9;
          }

        
          .stackoverflow_icon {
              color: #9126d9;
              fill: #9126d9;
          }
          .stackoverflow_icon:hover {
              background: #9126d9;
          }

           .twitter_icon {
              color: #2691d9;
              fill: #2691d9;
          }
          .twitter_icon:hover {
              background: #2691d9;
          }

             </style>
          <!-- End of CSS -->
      </head>

      <body>
         <div class="heading">PHILIP OBIORAH</div>
         <img />

         <div class="bio">| Web  Developer | Oracle Certified Professional, Java SE Programmer | Tech Evangelist | Academician | Researcher | HNG Intern|</div>

         <div class="social_icons">
          <ul class="soc">
              <li><a href="mailto:philip.obiorah@outlook.com" class="email_icon email" title="Email"><svg viewBox="0 0 512 512"><path d="M101.3 141.6v228.9h0.3 308.4 0.8V141.6H101.3zM375.7 167.8l-119.7 91.5 -119.6-91.5H375.7zM127.6 194.1l64.1 49.1 -64.1 64.1V194.1zM127.8 344.2l84.9-84.9 43.2 33.1 43-32.9 84.7 84.7L127.8 344.2 127.8 344.2zM384.4 307.8l-64.4-64.4 64.4-49.3V307.8z"/></svg><!--[if lt IE 9]><em>Email</em><![endif]--></a></li>


              <li><a href="https://www.facebook.com/philipsatimor2" target="_blank" class="facebook_icon facebook" title="Facebook"><svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg><!--[if lt IE 9]><em>Facebook</em><![endif]--></a></li>



              <li><a href="https://github.com/philipobiorah" target="_blank" class="github_icon github" title="GitHub"><svg viewBox="0 0 512 512"><path d="M256 70.7c-102.6 0-185.9 83.2-185.9 185.9 0 82.1 53.3 151.8 127.1 176.4 9.3 1.7 12.3-4 12.3-8.9V389.4c-51.7 11.3-62.5-21.9-62.5-21.9 -8.4-21.5-20.6-27.2-20.6-27.2 -16.9-11.5 1.3-11.3 1.3-11.3 18.7 1.3 28.5 19.2 28.5 19.2 16.6 28.4 43.5 20.2 54.1 15.4 1.7-12 6.5-20.2 11.8-24.9 -41.3-4.7-84.7-20.6-84.7-91.9 0-20.3 7.3-36.9 19.2-49.9 -1.9-4.7-8.3-23.6 1.8-49.2 0 0 15.6-5 51.1 19.1 14.8-4.1 30.7-6.2 46.5-6.3 15.8 0.1 31.7 2.1 46.6 6.3 35.5-24 51.1-19.1 51.1-19.1 10.1 25.6 3.8 44.5 1.8 49.2 11.9 13 19.1 29.6 19.1 49.9 0 71.4-43.5 87.1-84.9 91.7 6.7 5.8 12.8 17.1 12.8 34.4 0 24.9 0 44.9 0 51 0 4.9 3 10.7 12.4 8.9 73.8-24.6 127-94.3 127-176.4C441.9 153.9 358.6 70.7 256 70.7z"/></svg><!--[if lt IE 9]><em>GitHub</em><![endif]--></a></li>





              <li><a href="https://www.linkedin.com/in/philip-obiorah-b5b974b5/" target="_blank" class="linkedin_icon linkedin" title="LinkedIn"><svg viewBox="0 0 512 512"><path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z"/></svg><!--[if lt IE 9]><em>LinkedIn</em><![endif]--></a></li>



              <li><a href="https://stackoverflow.com/users/story/9420918" target="_blank" class="stackoverflow_icon stackoverflow" title="StackOverflow"><svg viewBox="0 0 512 512"><path d="M294.8 361.2l-122 0.1 0-26 122-0.1L294.8 361.2zM377.2 213.7L356.4 93.5l-25.7 4.5 20.9 120.2L377.2 213.7zM297.8 301.8l-121.4-11.2 -2.4 25.9 121.4 11.2L297.8 301.8zM305.8 267.8l-117.8-31.7 -6.8 25.2 117.8 31.7L305.8 267.8zM321.2 238l-105-62 -13.2 22.4 105 62L321.2 238zM346.9 219.7l-68.7-100.8 -21.5 14.7 68.7 100.8L346.9 219.7zM315.5 275.5v106.5H155.6V275.5h-20.8v126.9h201.5V275.5H315.5z"/></svg><!--[if lt IE 9]><em>StackOverflow</em><![endif]--></a></li>




              <li><a href="https://twitter.com/philipobiorah" target="_blank" class="twitter_icon twitter" title="Twitter"><svg viewBox="0 0 512 512"><path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"/></svg><!--[if lt IE 9]><em>Twitter</em><![endif]--></a></li>

          </ul>
      </div>
  </body>
  </html>