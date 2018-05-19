<?php  
try {
  $sql = "SELECT * FROM secret_word LIMIT 1";
  $query = $conn->query($sql);
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $data = $query->fetch();
  $secret_word = $data['secret_word'];

  $sql = "SELECT * FROM interns_data WHERE username = 'Fayoung'";
  $query = $conn->query($sql);
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $data = $query->fetch();

  $name = $data['name'];
  $username = $data['username'];
  $link = $data['image_filename'];
} catch (PDOException $e) {
  throw $e;
}
?>

<style type="text/css">
  
  body{
    background-color: #000000;
    color: #ffffff 
  }
  h1{
    color: #ffffff;
  }
  h3{
    color: #ffffff;

  }
  #name{
    color: #ffffff;
    font-size: 100px;
    font-family:'Alfa Slab One';
    text-align: center;
    padding-left: 120px; 
  }
  #main{
    justify-content: center;
    font-family: arial;
    text-align: center;
  }
</style>    
<hr>
<hr><br>

<!--Avatar-->
<img src="https://res.cloudinary.com/fayoung/image/upload/v1523738849/me.jpg" width="300px" style="border-radius: 50%" alt="Fayoung" width="300" height="290" radius="10px" border="7px"><span id="name"> Fayoung </span>

<!--content-->
<span id="main">
  
  <h3><hr><hr><br>  
  Hello, my name is <strong> Faith Uhie. </strong>
  Mechanical Engineering student and Full Stack Developer.<br><br>
  I read and write HTML/CSS,
  Javascript and Python.<br>
  I love to learn and I’m very open to new ideas.
  <br>
  <br>
  A big thank you to HNG and all the sponsors for this wonderful program. Cheers!!
  <br><br><hr>
  </h3>
</span>

<!-- my footer -->
<footer>

<ul class="social-icons animated">
  <li>
    <a href="https://web.facebook.com/faith.uhie" target="_blank" class="social-icon">
      <span class="fa" data-hover="&#xf0e1;">&#xf0e1;</span>
    </a>
  </li>
  <li>
    <a href="https://twitter.com/_Fayoung" target="_blank" class="social-icon">
      <span class="fa" data-hover="&#xf099;">&#xf099;</span>
    </a>
  </li>
  <li>
    <a href="https://www.github.com/Fayoung01" target="_blank" class="social-icon">
      <span class="fa" data-hover="&#xf09b;">&#xf09b;</span>
    </a>
  </li>
</ul>

  <p style="font-size: 28px">Contact</p>
    
</footer>
<script type="text/javascript">document.getElementById('secret').style.display = 'block';</script>
