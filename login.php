 <?php include("header.php");?>


<div style="text-align: center; padding-top: 20px; padding-bottom: 10px">
    <h1 class="pt-5">Log In</h1>
    <p style="font-size: 0.7em !important; color: #3D3D3D !important;" class="pt-0 mt-0 pb-0 mb-0">Login to access your dashboard and manage your account.</p>
</div>

<div class="container" style='color: #3D3D3D'>
    <div id="message" style="color:black; font-weight:bold;"></div>
    <div class="row justify-content-md-center" style="text-align: center">
        <div class="col-lg-4">
            <div >
                <form class="form-signin" id="login_form">
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Username or Email address" name="email" required="" autofocus="">
                    </div>

                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    
                    <div class="custom-control custom-checkbox pl-0 ml-0 pb-2 text-justify">
                        <input type="checkbox" value="remember-me">
                        <label class="form-check-label" style="font-size:0.7em;">Remember Me</label>
                    </div>
                    
                    <button class="btn btn-primary btn-block" id="login" type="submit">Log In</button> 
                
                </form>
                <div class="pt-0 mt-0 text-justify pl-3"> 
                    <img src="https://cdn1.iconfinder.com/data/icons/hawcons/32/698845-icon-118-lock-rounded-128.png" height="15px" width="auto"/>
                    <span style="font-size: 0.7em; color: grey"><a href="resetpassword.php"> Forgot Password?</a></span>
                </div>

                <div style="font-size: 0.7em; color: #ADADAD" class="pt-3">Don't have an account?&nbsp; <a href="signup.php" style="color: #008DDD">Get Started</a></div>
            </div>
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
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter email');
            
        }
       
        else if(password ==""){
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
                $("#message").addClass('alert alert-danger');
            
                $("#message").html(data);
                 $("#message").html('Error Invalid Email or password');
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
