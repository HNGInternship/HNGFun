<?php
  $date_time = new DateTime('now', new DateTimezone('Africa/Lagos'));
?>

<div class="time-container">
  <div>Hello, my name is Michael and I'm interning at Hotels.ng</div>
  <div class="time"><?php echo $date_time->format('g:i:s a'); ?></div>
</div>
<div class="background day"></div>
<style>
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
    console.log(time)
    document.querySelector(".time").innerHTML = time;
  }
  setInterval(updateTime, 60);
</script>