<?php
 function get_time(){
     //instantiate date-time object
     $datetime = new DateTime();
     //set the timezone to Africa/Lagos 
     $datetime->setTimSezone(new DateTimeZone('Africa/lagos'));
     //format the time
     return $datetime->format('H:i: A');
 }
?>
