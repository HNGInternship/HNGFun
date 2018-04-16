<?php
try {
  $db_conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);

  $secret_word = $db_conn->query('SELECT secret_word FROM secret_word')->fetch(PDO::FETCH_OBJ)->secret_word;

  $user = $db_conn->query('SELECT * FROM interns_data WHERE username="tobalase"')->fetch(PDO::FETCH_OBJ);

  $db_conn = null;
}
// Prints out errors raised by PDO
catch (PDOException $e) {
  die('Error: ' . $e->getMessage());
}
?>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat');
@import url('https://s3.amazonaws.com/icomoon.io/114779/Socicon/style.css?9ukd8d');
@import url('https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css');

div.content {
  margin-top: 60px;
}

img {
  filter: gray;
  -webkit-filter: grayscale(1);
  filter: grayscale(1);
}

img:hover {
  -webkit-filter: grayscale(0);
  filter: none;
}

.social a span, .skills i {
  font-size: 30px;
  padding: 10px ;
}

.social a {
  text-decoration: none;
}

.socicon-github, .socicon-mastodon {
  color: #000;
  text-decoration: none;
}

.socicon-github:hover {
  background-color: #221e1b;
  color: #fff;
}

.socicon-mastodon:hover {
  background-color: #2986d6;
  color: #fff;
}

.my-profile-picture {
  # border-radius: 50%;
  border: 4px solid black;
  width: 180px;
}

p {
  font-family: 'Montserrat', sans-serif;
  margin-bottom: 10px;
  text-align: center;
}

.name {
  font-size: 24px;
  font-weight: bold;
}

.my-profile {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
  border: 4px solid black;
  width: auto;
  padding: 20px;
}

.skills, .social {
  margin: 10px 0 10px 0;
}

.devicon-html5-plain.sq:hover {
  background-color: #e54d26;
  color: #fff;
}
.devicon-css3-plain.sq:hover {
  background-color: #3d8fc6;
  color: #fff;
}
.devicon-php-plain.sq:hover {
  background-color: #6181b6;
  color: #fff;
}
.devicon-nodejs-plain.sq:hover {
  background-color: #83CD29;
  color: #fff;
}
.devicon-ruby-plain.sq:hover {
  background-color: #d91404;
  color: #fff;
}
.devicon-javascript-plain.sq:hover {
  color: #f0db4f;
  font-size: 30px;
  padding: 10px;
  margin: 0;
  width:50px;
  height:50px;
  background: linear-gradient(to bottom, #fff 0%, #f0db4f 100%);
  margin:0 auto;
  margin-top:50px;
  background: #fff;
  box-shadow: inset 0 0 0 13px #f0db4f;
}

.skills i {
  vertical-align: middle;
}

</style>

<div class="content">
  <div class="my-profile">
    <p>
    <span class="name"><?php echo $user->name; ?></span>
    <br>
    <span class="username">(@<?php echo $user->username; ?>)</span>
    </p>
    <img class="my-profile-picture" src="<?php echo $user->image_filename; ?>" alt="<?php echo $user->name; ?>">
    <br>

    <p>Skills</p>
    <div class="skills">
      <i class="devicon-html5-plain sq" title="HTML5"></i>
      <i class="devicon-css3-plain sq" title="CSS3"></i>
      <i class="devicon-javascript-plain sq gradient" title="JavaScript"></i>
      <i class="devicon-php-plain sq" title="PHP"></i>
      <i class="devicon-nodejs-plain sq" title="NodeJS"></i>
      <i class="devicon-ruby-plain sq" title="Ruby"></i>
    </div>

    <p>Contact</p>
    <div class="social">
      <a href="https://mastodon.host/@amarillo"><span class="socicon-mastodon" title="Mastodon"></span></a>
      <a href="https://github.com/funspectre"><span class="socicon-github" title="Github"></span></a>
    </div>
  </div>
</div>
