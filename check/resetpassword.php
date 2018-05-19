<?php
include_once("header.php");
?>



<!--form for getting email for password reset-->
<div id="get-email-reset" class="container" >
    <div class="row justify-content-md-center">
        <p id="message"></p>
        <form id="form-reset" style='text-align: center; padding: 100px'>
            <h1>Reset Password</h1>
            <p style="width: 480px; margin-left: 150px;">
                Enter your email address and we'll send you an email with instructions to reset your password.
            </p>
            <div style="padding: 20px 200px 0px 200px;  width: 800px;">
                <input type="text" name="email" class="form-control form-control-lg rounded-right" placeholder="johndoe@example.com" aria-label="Username" aria-describedby="basic-addon1">
                <br />
                <input type="hidden" name="pword-reset" value="yes">
                <button id="btn-reset" name="pword-reset" class="btn btn-primary btn-block" type="submit" style="border-radius: 8px;">Reset Password</button>
                <p style='color: #ADADAD '>
                     Already have account? <a href="login.php" style="text-decoration: none; "><span style="color: #1E99E0">Log In</span></a> 
                </p>
            </div>
        </form>
    </div> 
</div>

<!--form for changing password-->
<div id="password-change" class="container" >
    <div class="row justify-content-md-center">
        <form id="form-change" style='text-align: center; padding: 100px'>
            <h1>Change Password</h1>
            <p style="width: 480px; margin-left: 150px;">
                Create a new password and confirm it.
            </p>
            <div style="padding: 20px 200px 0px 200px;  width: 800px;">
                <input type="password" name="pass" class="form-control form-control-lg rounded-right" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                <br />

                <input type="password" name="pass-confirm" class="form-control form-control-lg rounded-right" placeholder="Confrim Password" aria-label="Username" aria-describedby="basic-addon1">
                <br />
                <input type="hidden" name="token" value="<?php $token = $_GET['token']; echo $token;   ?>">
                <button id="btn-change" name="pword-change" class="btn btn-primary btn-block" type="submit" style="border-radius: 8px;">Change Password</button>
                <p style='color: #ADADAD '>
                     Already have account? <a href="login.php" style="text-decoration: none; "><span style="color: #1E99E0">Log In</span></a> 
                </p>
            </div>
        </form>
    </div> 
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
     var token = "<?php echo $_GET['token'];   ?>";
        if(token){
            $('#get-email-reset').hide();
        }

        else{
             $('#password-change').hide();
        }
    $(document).ready(function(){
        //ajax for password reset
        $("#btn-reset").click(function(e){
            e.preventDefault();
            var data = $("#form-reset").serialize();
            $.ajax('process.php',{
                type: 'post',
                data: data,
                success: function(response){
                	if(response == 'sent'){
                    $("#message").addClass('alert alert-success');
                    $("#message").html("Email has been sent to you!");
                    }
                    else{
                    $("#message").addClass('alert alert-success');
                    $("#message").html('Password reset failed, please try again.');
                    }

                }
            });
        });



        //ajax for password change
        $("#btn-change").click(function(e){
            e.preventDefault();
            var data = $("#form-change").serialize();
            $.ajax('process.php',{
                type: 'post',
                data: data,
                success: function(response){

                    if(response == 1){
                    $("#message").addClass('alert alert-success');
                    $("#message").html("Password Change Successful");
                    window.location = "login.php";
                }

                else if(response == 2){
                    $("#message").addClass('alert alert-success');
                    $("#message").html("Password change wasn't successful, try again");
                }
                
                else if(response == 3){
                 $("#message").addClass('alert alert-success');
                    $("#message").html("Password don't match");
                
                }
                else{

                }
                    $("#message").addClass('alert alert-success');
                    $("#message").html("Password change wasn't successful, input correct token");
                }
            });
        });


    })
</script>
<?php
include_once("footer.php");
?>
