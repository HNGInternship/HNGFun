<?php

        require_once 'db.php';
        try {
            $select = 'SELECT * FROM secret_word';
            $query = $conn->query($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $data = $query->fetch();

            $result2 = $conn->query("Select * from interns_data where username = 'ekumamait'");
            $user = $result2->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eric Ebulu — UI/UX Designer and Software Engineer based in Uganda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="preload" href="http://res.cloudinary.com/dghqhkadc/image/upload/c_scale,w_512/v1526500624/imp.jpg" as="image">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script> -->
    <link rel="icon" type="image/jpg" href="http://res.cloudinary.com/dghqhkadc/image/upload/v1526542000/impfavicon.jpg">
    <link rel="shortcut icon" type="image/jpg" href="http://res.cloudinary.com/dghqhkadc/image/upload/v1526542000/impfavicon.jpg">

    
    <style>

       *,:after,:before {
 -webkit-box-sizing:border-box;
 box-sizing:border-box
}
html {
 font-size:16px;
 background-color:#fff;
 -webkit-font-smoothing:antialiased;
 -moz-osx-font-smoothing:grayscale;
 -webkit-tap-highlight-color:transparent
}
footer,header {
 display:block
}
body {
 margin:0;
 color:#727885;
 font-family:-apple-system,BlinkMacSystemFont,"Segoe UI","Roboto","Helvetica Neue",sans-serif;
 font-size:1rem;
 font-weight:400;
 text-align:center
}
img {
 display:inline-block;
 max-width:100%
}
h1,h2,h3,h4,h5,h6 {
 margin:0 0 1rem;
 font-family:inherit;
 color:#2e294e;
 font-weight:700
}
h1,h2,h3 {
 line-height:1.1
}
body,h4,h5,h6,p {
 line-height:1.5
}
h1 {
 font-size:3rem
}
h2 {
 font-size:2.5rem
}
h3 {
 font-size:2rem
}
h4 {
 font-size:1.5rem
}
h5 {
 font-size:1rem
}
h6 {
 font-size:.875rem
}
p {
 margin:0 0 1.5rem;
 color:#727885;
 font-size:16px
}
ol,ul {
 margin:1.5rem 0;
 padding-left:1.5rem
}
a,a:visited {
 color:#8661c1;
 text-decoration:underline;
 -webkit-transition:color .3s;
 transition:color .3s
}
a:active,a:focus,a:hover {
 color:#603c99;
 cursor:pointer
}
::-moz-selection {
 background:rgba(134,97,193,.875);
 color:#fff
}
::selection {
 background:rgba(134,97,193,.875);
 color:#fff
}
.text-red {
 color:#c14953
}
.outdated {
 margin:0;
 padding:.75rem 1rem;
 color:#2d2a23;
 background:#ffc53a
}
@media screen and (min-width:48em) {
 .outdated {
  padding:1rem 1.5rem
 }
}
.outdated a {
 color:#1a1a1a;
 font-weight:700;
 text-decoration:underline
}
.outdated a:active,.outdated a:focus,.outdated a:hover,.outdated a:visited {
 color:#6f46b1;
 text-decoration:underline
}
.profile {
 width:100%;
 margin:0 0 7rem;
 padding:0 1rem
}
@media screen and (min-width:37.5em) {
 .profile {
  padding:0 1.5rem
 }
}
@media screen and (min-width:48em) {
 .profile {
  margin-bottom:8rem
 }
}
.profile-image-wrap {
 position:relative;
 width:10rem;
 height:10rem;
 margin:7.5% auto 1rem
}
.profile-image-wrap img {
 display:block;
 width:100%;
 height:100%;
 border-radius:50%
}
@media screen and (min-width:37.5em) {
 .profile-image-wrap {
  margin-top:7%
 }
}
@media screen and (min-width:48em) {
 .profile-image-wrap {
  margin-top:6.5%;
  width:12rem;
  height:12rem
 }
}
@media screen and (min-width:81.25em) {
 .profile-image-wrap {
  margin-top:5%;
  width:13rem;
  height:13rem
 }
}
@media screen and (min-width:100em) {
 .profile-image-wrap {
  width:14rem;
  height:14rem
 }
}
.profile-name {
 margin-bottom:.5rem;
 color:#2e294e;
 font-size:2.25rem
}
@media screen and (min-width:37.5em) {
 .profile-name {
  font-size:2.4rem
 }
}
@media screen and (min-width:48em) {
 .profile-name {
  font-size:2.5rem
 }
}
@media screen and (min-width:81.25em) {
 .profile-name {
  font-size:2.75rem
 }
}
.profile-headline {
 margin-bottom:2rem;
 color:#788399;
 font-size:1.25rem;
 font-weight:400
}
@media screen and (min-width:37.5em) {
 .profile-headline {
  margin-bottom:2.5rem
 }
}
@media screen and (min-width:48em) {
 .profile-headline {
  font-size:1.4rem;
  margin-bottom:3rem
 }
}
@media screen and (min-width:81.25em) {
 .profile-headline {
  font-size:1.5rem;
  margin-bottom:3.5rem
 }
}
@media screen and (min-width:100em) {
 .profile-headline {
  margin-bottom:4rem
 }
}
.profile-description {
 max-width:60rem;
 margin:0 auto 1.4rem;
 color:#a4abba;
 font-size:1.2rem;
 font-weight:300
}
.profile-description a {
 position:relative;
 text-decoration:none;
 color:#a4abba
}
.profile-description a:after {
 content:"";
 position:absolute;
 left:0;
 right:0;
 top:100%;
 height:1px;
 background-color:#a4abba;
 -webkit-transition:all .3s;
 transition:all .3s
}
@media screen and (min-width:48em) {
 .profile-description a:after {
  height:2px
 }
}
.profile-description a:active,.profile-description a:focus,.profile-description a:hover {
 color:#788399
}
.profile-description a:active:after,.profile-description a:focus:after,.profile-description a:hover:after {
 background-color:#8661c1
}
@media screen and (min-width:37.5em) {
 .profile-description {
  font-size:1.4rem;
  margin-bottom:1.6rem
 }
}
@media screen and (min-width:48em) {
 .profile-description {
  font-size:1.6rem;
  margin-bottom:2rem
 }
}
@media screen and (min-width:62.5em) {
 .profile-description {
  margin-bottom:2.5rem
 }
}
@media screen and (min-width:81.25em) {
 .profile-description {
  margin-bottom:3rem
 }
}
.profile-links {
 position:relative
}
.profile-link,.profile-link:visited {
 position:relative;
 display:inline-block;
 width:1.5rem;
 height:1.5rem;
 margin:0 .375rem;
 color:#959eaf;
 text-decoration:none;
 vertical-align:top
}
.profile-link img {
 opacity:.4;
 -webkit-transition:opacity .3s;
 transition:opacity .3s
}
.profile-link svg {
 display:block;
 width:100%;
 height:100%;
 fill:#959eaf;
 -webkit-transition:fill .3s;
 transition:fill .3s
}
.profile-link:active,.profile-link:focus,.profile-link:hover {
 text-decoration:none;
 color:#603c99
}
.profile-link:active img,.profile-link:focus img,.profile-link:hover img {
 opacity:.9
}
.profile-link:active svg,.profile-link:focus svg,.profile-link:hover svg {
 fill:#603c99
}
@media screen and (min-width:37.5em) {
 .profile-link {
  width:1.6rem;
  height:1.6rem;
  margin:0 .5rem
 }
}
@media screen and (min-width:48em) {
 .profile-link {
  width:1.8em;
  height:1.8em;
  margin:0 .65rem
 }
}
@media screen and (min-width:62.5em) {
 .profile-link {
  width:2em;
  height:2em
 }
}
.footer {
 padding:.75rem 1rem;
 position:fixed;
 bottom:0;
 left:0;
 right:0;
 background:#fff
}
@media screen and (min-width:48em) {
 .footer {
  padding:1rem 1.5rem
 }
}
.footer.is-overlayed {
 border-top:1px solid #eaeaea;
 -webkit-box-shadow:0 -2px 6px rgba(0,0,0,.05);
 box-shadow:0 -2px 6px rgba(0,0,0,.05)
}
.sr-only {
 position:absolute;
 width:1px;
 height:1px;
 padding:0;
 margin:-1px;
 overflow:hidden;
 clip:rect(0,0,0,0);
 border:0
}
.fade {
 opacity:0;
 -webkit-transition:opacity .3s;
 transition:opacity .3s
}
.fade.in {
 opacity:1
}
  
    </style>

</head>

<body>
<!--[if lt IE 9]>
<p class="outdated">You're using an outdated browser. <a href="http://browsehappy.com/" rel="noopener">Upgrade to a
    different browser</a> to better experience this site.</p>
<![endif]-->

<div class="profile">
    <div class="profile-image-wrap">
        <noscript id="profile-image-noscript">
            <img src="http://res.cloudinary.com/dghqhkadc/image/upload/c_scale,w_512/v1526500624/imp.jpg" alt="Eric Ebulu">
        </noscript>
    </div>
    <h1 class="profile-name"><?php echo $user->name ?></h1>
    <h4>@<?php echo $user->username ?></h4>
    <h3 class="profile-headline">I design and build intuitive user interfaces</h3>
    <p class="profile-description">
        I currently learning Design and Full-stack development at
        <a target="_blank" rel="noopener" href="http://hng.com">Hotels.ng</a>.
        <br>I'm finishing work on something wonderful. Stay in touch.
    </p>
    <div class="profile-links">
        <a target="_blank" rel="noopener" class="profile-link" href="https://github.com/ekumamait">
            <span class="sr-only">GitHub</span>
            <svg width="438.549" height="438.549" viewBox="0 0 438.549 438.549"><path d="M409.132 114.573c-19.608-33.596-46.205-60.194-79.798-79.8-33.598-19.607-70.277-29.408-110.063-29.408-39.781 0-76.472 9.804-110.063 29.408-33.596 19.605-60.192 46.204-79.8 79.8C9.803 148.168 0 184.854 0 224.63c0 47.78 13.94 90.745 41.827 128.906 27.884 38.164 63.906 64.572 108.063 79.227 5.14.954 8.945.283 11.419-1.996 2.475-2.282 3.711-5.14 3.711-8.562 0-.571-.049-5.708-.144-15.417a2549.81 2549.81 0 0 1-.144-25.406l-6.567 1.136c-4.187.767-9.469 1.092-15.846 1-6.374-.089-12.991-.757-19.842-1.999-6.854-1.231-13.229-4.086-19.13-8.559-5.898-4.473-10.085-10.328-12.56-17.556l-2.855-6.57c-1.903-4.374-4.899-9.233-8.992-14.559-4.093-5.331-8.232-8.945-12.419-10.848l-1.999-1.431c-1.332-.951-2.568-2.098-3.711-3.429-1.142-1.331-1.997-2.663-2.568-3.997-.572-1.335-.098-2.43 1.427-3.289 1.525-.859 4.281-1.276 8.28-1.276l5.708.853c3.807.763 8.516 3.042 14.133 6.851 5.614 3.806 10.229 8.754 13.846 14.842 4.38 7.806 9.657 13.754 15.846 17.847 6.184 4.093 12.419 6.136 18.699 6.136 6.28 0 11.704-.476 16.274-1.423 4.565-.952 8.848-2.383 12.847-4.285 1.713-12.758 6.377-22.559 13.988-29.41-10.848-1.14-20.601-2.857-29.264-5.14-8.658-2.286-17.605-5.996-26.835-11.14-9.235-5.137-16.896-11.516-22.985-19.126-6.09-7.614-11.088-17.61-14.987-29.979-3.901-12.374-5.852-26.648-5.852-42.826 0-23.035 7.52-42.637 22.557-58.817-7.044-17.318-6.379-36.732 1.997-58.24 5.52-1.715 13.706-.428 24.554 3.853 10.85 4.283 18.794 7.952 23.84 10.994 5.046 3.041 9.089 5.618 12.135 7.708 17.705-4.947 35.976-7.421 54.818-7.421s37.117 2.474 54.823 7.421l10.849-6.849c7.419-4.57 16.18-8.758 26.262-12.565 10.088-3.805 17.802-4.853 23.134-3.138 8.562 21.509 9.325 40.922 2.279 58.24 15.036 16.18 22.559 35.787 22.559 58.817 0 16.178-1.958 30.497-5.853 42.966-3.9 12.471-8.941 22.457-15.125 29.979-6.191 7.521-13.901 13.85-23.131 18.986-9.232 5.14-18.182 8.85-26.84 11.136-8.662 2.286-18.415 4.004-29.263 5.146 9.894 8.562 14.842 22.077 14.842 40.539v60.237c0 3.422 1.19 6.279 3.572 8.562 2.379 2.279 6.136 2.95 11.276 1.995 44.163-14.653 80.185-41.062 108.068-79.226 27.88-38.161 41.825-81.126 41.825-128.906-.01-39.771-9.818-76.454-29.414-110.049z"/></svg>
        </a>
        <a target="_blank" rel="noopener" class="profile-link" href="https://linkedin.com/in/ericebulu">
            <span class="sr-only">LinkedIn</span>
            <svg width="438.536" height="438.535" viewBox="0 0 438.536 438.535"><path d="M5.424 145.895H99.64v282.932H5.424zm403.418 25.844c-19.791-21.604-45.967-32.408-78.512-32.408-11.991 0-22.891 1.475-32.695 4.427-9.801 2.95-18.079 7.089-24.838 12.419-6.755 5.33-12.135 10.278-16.129 14.844-3.798 4.337-7.512 9.389-11.136 15.104v-40.232h-93.935l.288 13.706c.193 9.139.288 37.307.288 84.508 0 47.205-.19 108.777-.572 184.722h93.931V270.942c0-9.705 1.041-17.412 3.139-23.127 4-9.712 10.037-17.843 18.131-24.407 8.093-6.572 18.13-9.855 30.125-9.855 16.364 0 28.407 5.662 36.117 16.987 7.707 11.324 11.561 26.98 11.561 46.966V428.82h93.931V266.664c-.007-41.688-9.897-73.328-29.694-94.925zM53.103 9.708c-15.796 0-28.595 4.619-38.4 13.848C4.899 32.787 0 44.441 0 58.529 0 72.42 4.758 84.034 14.275 93.358c9.514 9.325 22.078 13.99 37.685 13.99h.571c15.99 0 28.887-4.661 38.688-13.99 9.801-9.324 14.606-20.934 14.417-34.829-.19-14.087-5.047-25.742-14.561-34.973C81.562 14.323 68.9 9.708 53.103 9.708z"/></svg>
        </a>
        <a target="_blank" rel="noopener" class="profile-link" href="https://twitter.com/ekumamait">
            <span class="sr-only">Twitter</span>
            <svg width="449.956" height="449.956" viewBox="0 0 449.956 449.956"><path d="M449.956 85.657c-17.702 7.614-35.408 12.369-53.102 14.279 19.985-11.991 33.503-28.931 40.546-50.819-18.281 10.847-37.787 18.268-58.532 22.267-18.274-19.414-40.73-29.125-67.383-29.125-25.502 0-47.246 8.992-65.24 26.98-17.984 17.987-26.977 39.731-26.977 65.235 0 6.851.76 13.896 2.284 21.128-37.688-1.903-73.042-11.372-106.068-28.407C82.46 110.158 54.433 87.46 31.403 59.101c-8.375 14.272-12.564 29.787-12.564 46.536 0 15.798 3.711 30.456 11.138 43.97 7.422 13.512 17.417 24.455 29.98 32.831-14.849-.572-28.743-4.475-41.684-11.708v1.142c0 22.271 6.995 41.824 20.983 58.674 13.99 16.848 31.645 27.453 52.961 31.833a95.543 95.543 0 0 1-24.269 3.138c-5.33 0-11.136-.475-17.416-1.42 5.9 18.459 16.75 33.633 32.546 45.535 15.799 11.896 33.691 18.028 53.677 18.418-33.498 26.262-71.66 39.393-114.486 39.393-8.186 0-15.607-.373-22.27-1.139 42.827 27.596 90.03 41.394 141.612 41.394 32.738 0 63.478-5.181 92.21-15.557 28.746-10.369 53.297-24.267 73.665-41.686 20.362-17.415 37.925-37.448 52.674-60.097 14.75-22.651 25.738-46.298 32.977-70.946 7.23-24.653 10.848-49.344 10.848-74.092 0-5.33-.096-9.325-.287-11.991 18.087-13.127 33.504-29.023 46.258-47.672z"/></svg>
        </a>
        <a target="_blank" rel="noopener" class="profile-link"
           href="mailto:ericebuluochol@gmail.com?subject=Hello%20Ekumamait">
            <span class="sr-only">Email</span>
            <svg width="511.626" height="511.627" viewBox="0 0 511.626 511.627"><path d="M498.208 68.235c-8.945-8.947-19.701-13.418-32.261-13.418H45.682c-12.562 0-23.318 4.471-32.264 13.418C4.471 77.18 0 87.935 0 100.499v310.633c0 12.566 4.471 23.312 13.418 32.257 8.945 8.953 19.701 13.422 32.264 13.422h420.266c12.56 0 23.315-4.469 32.261-13.422 8.949-8.945 13.418-19.697 13.418-32.257V100.499c-.001-12.564-4.469-23.319-13.419-32.264zm-23.13 342.89c0 2.475-.903 4.616-2.714 6.424-1.81 1.81-3.949 2.706-6.42 2.706H45.679c-2.474 0-4.616-.896-6.423-2.706-1.809-1.808-2.712-3.949-2.712-6.424V191.858a167.121 167.121 0 0 0 19.7 18.843c51.012 39.209 91.553 71.374 121.627 96.5 9.707 8.186 17.607 14.561 23.697 19.13 6.09 4.571 14.322 9.185 24.694 13.846 10.373 4.668 20.129 6.991 29.265 6.991h.571c9.134 0 18.894-2.323 29.263-6.991 10.376-4.661 18.613-9.274 24.701-13.846 6.089-4.569 13.99-10.944 23.698-19.13 30.074-25.126 70.61-57.291 121.624-96.5a166.295 166.295 0 0 0 19.694-18.843v219.267zm0-303.205v3.14c0 11.229-4.421 23.745-13.271 37.543-8.851 13.798-18.419 24.792-28.691 32.974a43121.052 43121.052 0 0 0-114.495 90.506c-1.14.951-4.474 3.757-9.996 8.418-5.514 4.668-9.894 8.241-13.131 10.712-3.241 2.478-7.471 5.475-12.703 8.993-5.236 3.518-10.041 6.14-14.418 7.851-4.377 1.707-8.47 2.562-12.275 2.562h-.571c-3.806 0-7.895-.855-12.275-2.562-4.377-1.711-9.185-4.333-14.417-7.851-5.231-3.519-9.467-6.516-12.703-8.993-3.234-2.471-7.614-6.044-13.132-10.712-5.52-4.661-8.854-7.467-9.995-8.418a42000.437 42000.437 0 0 0-114.487-90.506c-27.981-22.076-41.969-49.106-41.969-81.083 0-2.472.903-4.615 2.712-6.421 1.809-1.809 3.949-2.714 6.423-2.714H465.95c1.52.855 2.854 1.093 3.997.715 1.143-.385 1.998.331 2.566 2.138.571 1.809 1.095 2.664 1.57 2.57.477-.096.764 1.093.859 3.571.089 2.473.137 3.718.137 3.718v3.849h-.001z"/></svg>
        </a>
    </div>
</div>
    <footer id="footer" class="footer">
    Made in 2018 with <span class="text-red">♥</span> from Kampala, Uganda.
</footer>
</body>
</html>