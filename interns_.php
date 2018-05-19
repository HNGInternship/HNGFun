<?php

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interns</title>
		<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
		<script type="text/javascript" src="js/intern_.js"></script>
		<link rel="stylesheet" type="text/css" href="css/intern_.css" />
		<style type="text/css">
	
		.results tr[visible='false'],
		.no-result{
		display:none;
		}

		.results tr[visible='true']{
		display:table-row;
		}

		.counter{
		padding:8px; 
		color:#ccc;
		}
</style>
	<link rel="stylesheet" type="text/css" href="table2.css" />
	<script type="text/javascript">
	$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});
	</script>
  </head>

<body>
    <main class="wrapper">
	  <section style="width:70%;margin-left:200px;margin-top:50px;">
	   <div style="margin-top:20px;">
	   <h2 style="text-align:center;color:#3D3D3D; font-family: 'Work Sans', sans-serif;font-weight:900;">We've Come A Long Way </h2>
	   <hr style="margin-bottom:30px;width:70px; height:10px;">
	   <p style="margin-bottom:50px;text-align:center;">HNG 4.0 has been a life-transforming journey for interns across Africa.<br>
Don’t take our word for it...take theirs.</p>
	   </div>
<div style="width:150px;">
    <input type="text" class="search form-control" placeholder="Search Interns..."style="Float:left;margin-left:300px;margin-bottom:-35px;">
	<select name="city" class=" form-control" placeholder="4.0" style="margin:-30px 0px 35px 500px;">
      <option value="4.0" >4.0</option>
      <option value="4.1">4.1</option>
	  </select>
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr style="background:#2196F3; color:#fff;">
      <th class="col-md-3 col-xs-3">Name</th>
      <th class="col-md-3 col-xs-5">Username</th>
      <th class="col-md-4 col-xs-4">Summary Information</th>
      <th class="col-md-4 col-xs-5">User Profile</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
 <tbody>
    <tr>
      <th scope="row">
	  <a href="https://slack.com"><img src="https://demos.subinsb.com/isl-profile-pic/image/person.png"  height="30px" width="30px;"/>Lois Thomas</a></th>
	  <td>@techHajiya</td>
      <td></td>
      <td>
	  <a href="https://facebook.com/Lois.idzi5"><img src="https://centroculturalbod.com/ccbod/wp-content/uploads/2017/03/facebook-logo.png" height="20px" width="25px"/>
	  <a href="https://github.com/cara06"><img src="https://hackster.imgix.net/uploads/attachments/447798/github-mark_n2wdxTwOQQ.png?auto=compress%2Cformat&w=900&h=675&fit=min" height="20px" width="25px"/></a>
	  <a href="https://twitter.com/techHajiya"><img src="https://www.shareicon.net/data/256x256/2015/08/13/84803_media_512x512.png" height="20px" width="25px"/></td></a>
    </tr>
    <tr>
      <th scope="row">
	  <a href="https://slack.com"><img src="https://cdn0.iconfinder.com/data/icons/iconshock_guys/512/andrew.png"  height="30px" width="30px;"/>Maria Carey</a></th>
	  <td>@melody</td>
      <td></td>
      <td>
	  <a href="https://facebook.com/Lois.idzi5"><img src="https://centroculturalbod.com/ccbod/wp-content/uploads/2017/03/facebook-logo.png" height="20px" width="25px"/>
	  <a href="https://github.com/cara06"><img src="https://hackster.imgix.net/uploads/attachments/447798/github-mark_n2wdxTwOQQ.png?auto=compress%2Cformat&w=900&h=675&fit=min" height="20px" width="25px"/></a>
	  <a href="https://twitter.com/techHajiya"><img src="https://www.shareicon.net/data/256x256/2015/08/13/84803_media_512x512.png" height="20px" width="25px"/></td></a>
    </tr>
     <tr>
      <th scope="row">
	  <a href="https://slack.com"><img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/supportmale-2-512.png"  height="30px" width="30px;"/>Ovunda James</a></th>
	  <td>@ovunda</td>
      <td></td>
      <td>
	  <a href="https://facebook.com/Lois.idzi5"><img src="https://centroculturalbod.com/ccbod/wp-content/uploads/2017/03/facebook-logo.png" height="20px" width="25px"/>
	  <a href="https://github.com/cara06"><img src="https://hackster.imgix.net/uploads/attachments/447798/github-mark_n2wdxTwOQQ.png?auto=compress%2Cformat&w=900&h=675&fit=min" height="20px" width="25px"/></a>
	  <a href="https://twitter.com/techHajiya"><img src="https://www.shareicon.net/data/256x256/2015/08/13/84803_media_512x512.png" height="20px" width="25px"/></td></a>
    </tr>
     <tr>
      <th scope="row">
	  <a href="https://slack.com"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABIFBMVEX///9zSj7/pk7/4bL/jFH/16NiPzP9yI65fmPksHv/pE7/5bV1Sz//26ZxRzz/6LdtQzn/1Jz/okRnOzP/iUv/+vP/9uz/3639xYa1fGT/36m1eF9tQTT/h0j/2aZnOjKujHDy06dSKyT/061YMyr/nzn/gjzbu5Xzy5pqOy2BWkr/lVD/mk/0yZnlxp3/kFC+gWHZkFr/r2HYpoDCoYHMiV6KYk+VcFtXLh6ffGTMrImwj3Ls5+SKalTgwJn/687/79v/4r7quof/sYz/xav/0bn/5tvCg2D/oXJmNCJSJRLflFj/k13/nWj0oFHIuraehHz/uHb/uJb/qoD/y7POpJDXvLHHkHD/7tXgsYja0MyynJKTfne4p6Pm4N15XlREMaQsAAAPgUlEQVR4nN2cC1vaSBfHqyHUNuRCI/IKysWiXFqwrggFvKDd1rrutt1tty52Xb//t3jnTC7kMrnRmQz6f7p9ukLC/HLOnP+cSfDJE6oq3N59GeRWFlau8+XH59tjuoOip8Ldfbu9pSiLAyIpW1vtq9yXz0tIWfhxtfVzcC7Mq8FdgTeSW3ftLUp4NmX7yxIF8vi+TZcPa+tqaRhv27Ty08f4gzcb1ucrNnyYceszbzy2gEjtL7wBb9kCojDm/uMKeMwaEJXVK66Zes+oyLh0dceJrnBcuGNhEwREDjX19sf9ytu3byn7fKDaKUfx+Ef7bSOLpP3EMjuZUp2Lx19+e5s1lBYfIN6mBvjZCB8OYYqEK+20lnD/WvFLN4TINDrpAN47ANMlXGmnUlDvG1luhCtXKSxu/nUBpldJDaWQp3fOFM1m01jOuNRmbRnHbsC0kxRpizHhfZY7IdulzX+/eQhTz1LWQXSXGS4xZDsTC55ZyIWQaTn97CPkkKVMPfGHN0m5EG4xXNh4K2n6jo/FME19ScplIq5csWsxloSQYTVdEsItdvunBEIepUbJMSPs+Am5lJorZrfdfEsaXhORmSP6/ZATIbMtKf+ahg8iu/7i9tET/kci5FBrGK7bvO0hpyAyNEQSIAdEhoT+pTcfQnZZ+u9yBJEhIckQORQbhrtRRENMP4gMmwuiIYLSDSK7NQ3ZENOPIsO7bAWiIYL0NG8ksustAiw/m210xqMUEa/YAZI6xGx256RbkkvD1BCVAUNCUoeYnZUqoijKIz0lQoZLGpIhNk5EWcRKDZHlhqnfEBujkmipNEkHkemdC68hOgERYl9PY2eKoR36DLExdAIixFMlhXrD9qETTwxFj+TWgH2mtlkCujvEnabsQ2SfqQy3S0GuDnFU8gICY7fjylSNdt4q90wJnR3iTssXQowo1xxh1Pq1nK7RDKvG9qFohyF6y0zREcb5bNRGJfl0MtDoUTJ+VsHxPE1j5g6hIFSsf1bksV1U9W6lIpdas1pH16hQMn5232mInhwVBMERRrFmTkDNmK0yphwoP4/J1A5dhnhS8hE6wiiWWiOjpdK71qVAlGJ3XIOU/QlOdnctsOYdYqPvj6GPEeKouOarjDBRNPujQU5fDJRl7wSyY9gYkwmdjHIL5aqCZqLoEXCKrdPxBIFqOKSaEvdbfWwN32GIjVPPuAWBwFgS+53qgOSbIhQkFE8gnfUno+Ggo+ggTTOBychMu0OQ3SH63FBwqmhDyvLpcOYLopdURj00elOrO5uN+5NabTRExJ3ciqJopixCpt0hyDbERiihs7BWAkJIkgy0eK5CeNHf6GctUNdyWKbdIcjuEIMIJUlVJfSXJDkjGY2GomiI/HLLImT+hOntnJA0DyXpFJXJTqcz7PdUSYgLKZe66DB03LA2E4mr3Tkh6+8kHP9mz0PPIACw3l/RjSKhaHqnL0ieSRnAV+njBQ8+TNNq3jOD5oSsv5JgPyWs5AhyNRKKlmuq9qwsVoI4S7OOyxY1jXRq2yyYf//ZBgywKxQ8Hf4Aq1IdSc7ig+ZnsQITzhVBoxXBx0Sv6Rh3hyDTEAMGoqDcPK2jdG3i9cyKNpwjSkJzMujkcp3RuIhIzZjKeKNVU2qzFqqaM9RrhTKm8LQ+NsRGY0cnpZHWaeIiChVV6EM8bERJmGj6fK7VzfyVAFBR+sWSjJhhDTAzOmjv6fUqvmTM7RAbYiNba/om0wDh6DXJkZVqHcaqTzCLOl5xzlFNGxs/7qMKog3qquAINWy8KgPHj7BQWqCWjHF3CLp7i9bcJa9rlfoA0/eMCgdI7yFqtVZVYI6iQFSNZrhagzf3qjjMrtkqqLDxqnlPJkBa6MztEBlih7R50UIoWs07JkHqKGjmqAgQir3eGddRiHrjDv6/Efr5AF6XvIepNThd3ftjSIsc+6/ofcgTAGU0pPlI0citWVZHLHoT56KijFXJDMYYVtUo5Kfwct08Dh1kXSK4MtrER45eKDL/hl6BaGkyZGPTHH+v02iM6vNoaKN6FYqg4CyrCGGlWh8p88jXR41Gp2eeowmXhECIxJpQIALOdJyMBuAOFNusFUQElxuiXMx5BppDP4PfZGOHMAtFeqdnXhl0BfRTIuI5W8Bpnkg4QZHqS+bYjGWrmWPqCVQYFK+ee7gS1Bh4aWhemInRtFjXCVUuYpqi1dEGU8IiCRC59vyKSzvGkmBgjRybhL8KqcZdY/vCDMzlrnkWNEMt+FSDWCCGUJQhp6zSZxJawRgb21E930B7eC2tjV2hz+6Yr9Z1UpE1gshyZUpOUrECpc8agIewiUFy/nCoeBVk1ScvoaAFE04ZEp4TAXEMQwlJCacOlQUJ/0mfEJZsdk0kZSlhMWDYemiW+hZups44EKKqoVnBMAlPjOGpUGmUat8fDqkPCzmLXT0xCeehV0YcCM8CKg3UdmuoQ1z2d8zY4HXbYEIc6cSxZpPG+Mo0zHTGKwXCZQExnYcBlUaGnTDFyi+w7p0Tc3RQMXMqORiqimzfqrLSyQ4sFKyKjC2UHEK2hkgmFEtQauxmYHJyMjb/DeWENAkFO1J2EVLHJydWrNW+Zi+S/IQsAQOLKW7zrOsP+4nmv6CSVglNgvkyrOmsauo4TKjjXoycpEynYaDliyJeZnqHJMFItaCCIZgLG63uOw4maC4AsMR4Kyqo1swgiEPBNSqpnlPIfZ6tOixNcx5E3DhXmxzcEIvYXKCZiJvWTk+dj0ttQhdYHQfEwoBpwgJcH88Pk4zNj6DJW2TcWoCKAVHEW0p6rQ57+rCr3xviTn4SnKP4MvSr8K5hTzKPq+PNReceXdqAqNqQEQVMpFUHk3GzOZ508K5gNQLQQlT0XA0d1uwPq8YmJPnNRbZVxtbGeZ4ACWNV8JawvbOr6eMoQEhmY/d4fhjKBFIEi8Xz9H7fZ2F6fu7dpEdj7Q2c27ladeSrkiRJwqjq2OrW9M4p4bqcnU1TwzPlbYZxPE5HinkTV1+BKRkDEA6rw2NFxmHasEk6LJX5F4MQ9jTh7vxo0j8V4vLhw6QeHFYLPExaFkIB337B90hj49nHqaoaeNgyEbIRD0Kv9bMl5DEPvYtwtoQpGaFLZ4+f0OP6ReLIKq1K6MgrLfJxHjHt64O0EYfw4hlSJbBAVuDliziEbDe6A+QhJMUKAyKGFnHYLevlGIQ8AOMU02e2fJAWHiiakEcpffLkn8g0LT5z6uKi2zLUvbhwvRI5FblMQ/+OBiFNn8VTZAj5JKnfEX2hkC6i6SC4kSs8Hl4BihHEOIjRhYbp3aZQRQZRkFqRgK3ICKbV2ZPkbfVJJSOckewjHvED9O/yEwfYCsrVi/D1jqkSF7e35Ns+JY5REipdL+VFK3Cp4xb7DdJw+TbeggaKHxkGL0T/VWKtRU1AjpPQkBAXcTGls0EarthRXAiQewRB3tUbRUROqzWfNiqxWsXkfCnuAEdpKuapIxaFKW8sl6buOP404rLxgdx3M34KsVg84+rywTpzBDLWciUgfJw9PlTTuT0uhlgsni9p+GwVzq2qswBiUThbnvIZoql1mzjhZCyeT3kPPbY2zIVOkvXn0laXIBldR+xM5d1BLKCN/z0VK3ERK/n8g5h/LiHCp0/zsTJVRG98qISYMRyxmMfveriEMPyQTBWty/CgCQMZK/mnFuBDJzQwHHsXxYqYd7zyOAgDZTjnIyY0lz+Pl9Bapz9Wwnmz9UgJHR3zoyR0bXs8RkL33tUDJJyGE3r3WPMPrHVCOg8j9D+Am3943VMiPugkeQ84qc4CQxjwjY38lPeQkymozgR9IQX0oGoNscyQHn93abmLTaEwD8Hx3+VuPu9ii4IDtcp/HxPPtwTaePnLi93d1acQhOPvN+Xy2g351z2FSb5ZK5dvvgPkxtPV3d0Xv7xckqAivN0Xq6AXuy+/o1GuIZUPkyLKh8aB5bXvL+3zLQHkHM8Y0/XmmqHyRTJE+aJsHrl57TwhX0gPHtaRjdhNgih3bcAjzxm5QZLwQGtrCyDOAdfWCOfkABmEh/Rp0x5rbEQH4OYn8mlThQzBAx3YiOVZPER5Ngc8CD5xWpDTP8PwQEdzxMOAXxLo4jOrKHES+iD/nDLmK0TyIV3OEW/Ivy/alaFv5oCXkedGjEyXAtPVaD6kN/ZURGEUwxhlcR7Atc03cU7+YnXKEHA3zhAAcV5uymuzQEZZnJWTAiLtMkOMDehMVGA8bBHmoyy3DtfmfHFS1NILVgVn/3nsMTjKjTEfZ1345cEVAMW/hVXsHt6UnW+JKjJOPd9nA/huOxN/EKvXLkRYb94czi66oNns8Gat7OJDa7UE585s/8UC8MNeJrOfYBif3rgZMaYp7wubbwKMnqj9TGaPRZ5+Xc9kMq8SDMTh/REK83m/XqFxrL+jD1jYzoBeJxnLp8s4jJtHSQK4+hqPY5s+4XuDMBliDMbNy0R8JmBm+wN1wnfrxqkzCQoqZjzaDIbcTBg/VEbNUTCoNR8twqSIq8+vLzcJlOhnl0kKqAsws/6ROuF+xlbSYSFdHwClU5cH10kvFdJ8EPQtcc9x8gUQkT5dXx8cHB0dHRxcf0qYm5Ycl3mPNuCGgzCZZ1DUK8cYqDvih+0Md0QnIP1i+t5FmNAz6Oi1awTb7ykT/uom5IDoBsxs/0qZ8K919wck9oyf1XPP56/TNsQ/vIQpI3oBM+t/UCb83fsJi3rGgtr3ff7vdAEL275PSBXRD5jZprsj5bJDS+l5xivCp1M2xA+EGKZXUF+TPpyyIb4nEqaESASkbYheO7SURkH1lVGTkK4hvvOZRWqIAYC0NzI+BhGyL6iEMmoQ0u0QgwDZIwYBIkSqhCSzMMXWM0g+YYpqh0i0Q0ssCyq5jJqENA3xQxjhIrsacRX2sXs0DTHADpkHMSyEdA0xyA5ZBzH0U6kaYqAdGmJliqEhpGuI/u7QJVblNKSQZih3iP7u0CVWnhjshVgUO0RSd+gSI8KIT6XYIYbaIYjNRAxakVqiaIjk7pA7IcUOMdwO+RHSM8QIO+RGSM8QI+yQFyFFQwzsDjkT0usQo5KUEyHFm/lRZsGLkFqHGGmH3AhpGWJ4d8iTkJYhRtoht3lIyxAj7ZAbIS1DjLRDXoTUDDHSDrkR0jLEiP6XIyGtHviPqE96+ISPPoZfl5aQVqV5/H5YWNo1DSVA/Az7MhJSfMY0cq+NEyHFpzHeR+QpF0Kqd2aefAtH5EG4940mIEQxzDLSJ1zfo/1s4pONr3vbgZApE65v731l8ZWSjW9fg24kpEu4//VbAr7/A9NqoUHvMkLUAAAAAElFTkSuQmCC"  height="30px" width="30px;"/>Olaseun Moses</a></th>
	  <td>@rogue</td>
      <td></td>
      <td>
	  <a href="https://facebook.com/Lois.idzi5"><img src="https://centroculturalbod.com/ccbod/wp-content/uploads/2017/03/facebook-logo.png" height="20px" width="25px"/>
	  <a href="https://github.com/cara06"><img src="https://hackster.imgix.net/uploads/attachments/447798/github-mark_n2wdxTwOQQ.png?auto=compress%2Cformat&w=900&h=675&fit=min" height="20px" width="25px"/></a>
	  <a href="https://twitter.com/techHajiya"><img src="https://www.shareicon.net/data/256x256/2015/08/13/84803_media_512x512.png" height="20px" width="25px"/></td></a>
    </tr>
  </tbody>
</table>
</section>
</main>
</body>
</html>