<?php
  $date_time = new DateTime('now', new DateTimezone('Africa/Lagos'));

  try {
    $sql = 'SELECT * FROM secret_word';
    $secret_word_query = $conn->query($sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $secret_word_result = $secret_word_query->fetch();

    $sql = 'SELECT * FROM interns_data WHERE username = "the_ozmic"';
    $intern_data_query = $conn->query($sql);
    $intern_data_query->setFetchMode(PDO::FETCH_ASSOC);
    $intern_data_result = $intern_data_query->fetch();
  } catch (PDOException $e) {
      throw $e;
  }

  $secret_word = $secret_word_result['secret_word'];
  $name = $intern_data_result['name'];
  $img_url = $intern_data_result['image_filename'];
?>

<div class="time-container">
  <div>Hello, my name is <?php echo $name; ?> and I'm interning at Hotels.ng</div>
  <div class="time"><?php echo $date_time->format('g:i:s a'); ?></div>
</div>
<div class="img-container">
  <img src="<?php echo $img_url; ?>"/>
</div>
<style>
  .img-container {
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #fff;
    padding: 5px;
    top: 430px;
    left: 175px;
  }

  .img-container > img {
    height: 190px;
    width: 190px;
    border-radius: 50%;
  }

  .time {
    padding: 10px;
    text-transform: uppercase;
    font-size: 60px;
    width: 100%;
  }

  .time-container {
    display: flex;
    height: 100%;
    text-align: center;
    justify-content: center;
    align-items: center;
  }

  .container {
    height: 100%;
  }

  body, html {
    height: 100%!important;
  }
</style>
<script>
  var options = { hour12: true };
  var time = "";
  function updateTime() {
    var date = new Date();
    time = date.toLocaleString('en-NG', options).split(",")[1].trim();
    document.querySelector(".time").innerHTML = time;
  }
  setInterval(updateTime, 60);
</script>