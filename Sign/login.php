 <?php include("header.php");?>


<div style="text-align: center; padding-top: 20px; padding-bottom: 10px">
    <h1 class="font-weight-normal">
        <h1>Log In</h1>
	    <p style="font-size: 16px;">Login to access your dashboard and manage your account.</p>
    </h1>
</div>

<div class="container" style='color: #3D3D3D'>
    <div id="message"></div>
    <div class="row justify-content-md-center" style="text-align: center">
        <div class="col-lg-4">
            <div style="padding: 0px 20px 0px 20px">
                <form class="form-signin" id="login_form">
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email" name="email" required="" autofocus="">
            <br/>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
            <br/>
            <input type="hidden" name="login" value="yes">
            <div class="checkbox mb-3" style="text-align: left">
                <label>
                    <input type="checkbox" value="remember-me">&nbsp; <span style="font-size: 16px;">Remember me</span>
                </label>
            </div>
            <div>
               <button class="btn btn-primary btn-block" id="login" type="submit">Log In</button> 
            </div>
                </form>
            </div>
        <div style="padding-top: 30px; padding-bottom: 30px"> 
            <img src="https://cdn1.iconfinder.com/data/icons/hawcons/32/698845-icon-118-lock-rounded-128.png" height="15px" width="auto"/>
            <span style="font-size: 14px; color: grey">Forgot Password?<a href="resetpassword.php" style="color: #008DDD"> Click here</a></span>
        </div>
        
        <div style="padding-bottom: 20px; font-size: 14px; color: #ADADAD">Don't have an account?&nbsp; <a href="signup.php" style="color: #008DDD">Get Started</a></div>
        </div>
    </div>
    
</div>
<script type="text/javascript">
       $( document ).ready(function() {
    $("#login").click(function(e){
        e.preventDefault();

       
        var email = $("#email").val();
       
        var password = $("#password").val();
        
        
        if(email ==""){
            alert('please enter email');
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter email');
        }
       
        else if(password ==""){
            alert('Please enter password');
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter password');
        }

       
        else{
            
            
            $("#login").html('Logging in..');

             var data = $("#login_form").serialize();

            

             $.ajax('process.php',{
            type : 'post',
            data : data,
            success: function(data){

             if(data==true){
                $("#message").addClass('alert alert-success');
            $("#message").html("Login successful");

            $("#login").html('Redirecting..');

            window.location ="dashboard.php";
             }  
             else{
                alert(data);
                $("#message").addClass('alert alert-danger');
            
                $("#message").html(data);
                 $("#login").html('Failed');
             } 
            

            },
           error : function(jqXHR,textStatus,errorThrown){
                 if(textStatus ='error'){
                    alert('Request not completed');
                 }
                $("#login").html('Failed');
            },
            beforeSend :function(){

            $("#message").removeClass('alert alert-danger');
            $("#message").html('');

            $("#login").html('Logging in..');
            },
        });
    

        }
        
     });



    });
</script>
 <?php include("footer.php");?>
