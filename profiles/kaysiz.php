<?php
  $secret_word_query = $conn->prepare("SELECT * FROM secret_word LIMIT 1");
  $secret_word_query->execute();
  $secret_word_result = $secret_word_query->fetch();
  $secret_word = $secret_word_result['secret_word'];

  $profile_query= "SELECT * FROM interns_data where username = 'kaysiz'";
  $q = $conn->query($profile_query);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $profile_result = $q->fetch();

  $name = $profile_result['name'];
  $profile_pic = $profile_result['image_filename'];

?>
<style>
    html, body {
    background: url(http://res.cloudinary.com/kaysiz/image/upload/v1523657757/miroslav-skopek-526075-unsplash_xvr8db.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;   
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    margin: 0px;
    padding: 0px;
    }

    .wrapper {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        background-color: azure;
        max-width: 50%;
        display: flex;
        flex-direction: row;
        height: 50%;
    }

    .left, .right {
    
    margin: 5px;
    max-width: 50%;
    flex: 1;
    display: flex;
    flex-direction: column;
    }

    .left {
    align-items: center;
    }

    .left .profile-picture {
    border-radius: 50%;
    }
    .left .social-links {
    list-style: none;
    padding-left: 0px;
    font-size: 18px;
    }

    .left .social-links li {
    display: inline-block;
    margin-right: 8px;
    }

    .left .social-links a {
    text-decoration: none;
    padding: 4px;
    }

    .left .social-links a:hover {
    background-color: rgba(0, 0, 0, 0.1);
    }

</style>
<div class="wrapper">
    
    <div class="left">
      <img class="profile-picture" src="<?= $profile_pic;?>" width="200"/>
      <h2 class="name"><?= $name;?></h2>
      <h4 class="subtitle">Full-Stack Web Developer</h4>
    </div>
    
    <div class="right">
      <p class="bio">
        Full-Stack Web developer, proficient in PHP, Python, Javasvript(Vue, Angular). Passionate about learning and teaching. 
      </p>
      <ul class="social-links">
        <li><a href="https://github.com/kaysiz" target="_blank">Github</a></li>
        <li><a href="https://www.linkedin.com/in/kudakwashe-siziva-42a06949/" target="_blank">LinkedIn</a></li>
      </ul>
    </div>
    
</div>