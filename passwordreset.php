 <?php session_start(); include("header.php");?>
<?php
//check email reset token
    if(isset($_GET['token'])){

      $token = $_GET['token'];

        require_once('db.php');
        require_once('Member.php');
//instantiate the member class
      $member_class = new Member();
      //check token
     $password_response=$member_class->check_token($token,$conn);
     if($password_response==false){

       echo "<div class ='alert alert-danger'style='color:red; font-weight:bold; text-align:center'>Your token is invalid or has already been used </div>";
      die();

     }

        }
        else{
           echo "<div class ='alert alert-danger'style='color:red; font-weight:bold; text-align:center'>You have no token for password reset </div>";
      die();
        }





?>
<div style="font-family: 'Roboto', sans-serif; margin-top: 100px;">
<div style="text-align: center; padding-bottom: 10px">
    <h1 class="font-weight-bold">
        Set a New Password
    </h1>
    <p style="margin-top: -15px;">Set a new password for your account.</p>
</div>
<div class="container" style='color: #3D3D3D; padding-bottom: 100px'>
        <div id="message"></div>
    <form id="reset_form">
        <div class="form-row justify-content-center">

                <div class="form-group col-md-6" style="padding-right:100px; padding-left: 100px">
                    <input type="password" name="password" id="password" class="form-control" placeholder="New Password" value="">

                    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" >
                    <input type="hidden" name="">
                    <input type="hidden" name="reset_password" value="yes">
                </div>

    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-6" style="padding-right:100px; padding-left: 100px">
            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm New Password" value="">
        </div>
    </div>
        <br />
    <div class="row justify-content-center">
        <a href="#"><button type="submit" id="reset"  class="btn btn-primary btn-sm" style="width: 360px; border-radius: 5px; padding: 9px; margin-top: -50px; background-color: #2196F3;" >Create New Password</button></a>
     </div>
    </form>

</div>
</div>
<div style='color: #3D3D3D; padding-bottom: 100px'>

</div>
<script type="text/javascript">
       $( document ).ready(function() {
    $("#reset").click(function(e){
        e.preventDefault();

        var password = $("#password").val();
        var confirm_password = $("#password_confirm").val();

        if(password ==""){
            alert('please enter password');
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter Password');
        }

        else if(password != confirm_password){
            alert('Passwords dont match');
            $("#message").addClass('alert alert-danger');
            $("#message").html('Passwords dont match');
        }


        else{


            $("#reset").html('Resetting..');

             var data = $("#reset_form").serialize();



             $.ajax('process.php',{
            type : 'post',
            data : data,
            success: function(data){

             if(data==true){
                $("#message").addClass('alert alert-success');
            $("#message").html("Password successfully reset");

            $("#reset").html('Done');

             }
             else{
                alert(data);
                $("#message").addClass('alert alert-danger');

                $("#message").html(data);
                 $("#reset").html('Failed');
             }


            },
           error : function(jqXHR,textStatus,errorThrown){
                 if(textStatus ='error'){
                    alert('Request not completed');
                 }
                $("#reset").html('Failed');
            },
            beforeSend :function(){

            $("#message").removeClass('alert alert-danger');
            $("#message").html('');

            $("#reset").html('Sending..');
            },
        });


        }

     });



    });
</script>
 <?php include("footer.php");?>










