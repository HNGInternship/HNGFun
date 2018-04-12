
<?php
include_once("header.php");

require 'db.php';

?>

<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Register</h1>
                    <span class="subheading">Fill in your details below</span>
                </div>
            </div>
        </div>
    </div>
</header>

    <div class="container">
<form>
    

    <label for="defaultFormRegisterNameEx" class="grey-text">Name</label>
    <input type="text" id="defaultFormRegisterNameEx" class="form-control">
    
    <br>

    <label for="defaultFormRegisterEmailEx" class="grey-text">Slack Username</label>
    <input type="email" id="defaultFormRegisterEmailEx" class="form-control">
    
    <br>

    <label for="file">Profile Picture <small>(max-size: 500kb):</small></label>
    <input type="file" name="file" class="form-control-file" id="file" >

    <div class="text-center mt-4">
       <input type="submit" name="submit" class="btn btn-primary">
    </div>
</form>
</div>

<?php
include_once("footer.php");
?>