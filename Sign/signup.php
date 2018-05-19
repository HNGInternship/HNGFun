<?php
include_once("header.php");
?>

<style>
    body {
        font-size: inherit !important;
    }
    .btn-signup {
        background-color: #2196F3;
        border-color: #2196F3;
        padding: 0.4em 8em !important;
        color: white;
        border-radius: 4px;
    }
    p, label {
        font-size: 14px !important;
    }
    .link {
        font-size: 14px !important;
    }
    
</style>
<div class="container">
<div class="row h-100">
    <div class="col-md-6" >
        <div style="padding: 60px 110px 0px 110px; text-align: center; line-height: 35px;">
            <span style="font-size: 16px; color: grey">
                <strong>''</strong> The HNG Internship is a remote training program, it centres on picking out indiviuals with relevant software development skills. For a period of about 3 months these skills are developed. The internship holds annually. Its organised by Hotels.ng in partnership with top companies around the globe. Fill the form to join the biggest and best remote software internship in the world! <strong>''</strong>
            </span>
            <p style="font-size: 40px !important; text-align: center; color: #2196F3; font-family: 'Qwigley', cursive;">Mark Essien</p>
        </div>
        
    </div>
    <div class="col-md-6  mx-auto">
        <div style='text-align: left'>
        <h1 class="login-title" style="padding-top: 20px; color: #3D3D3D;">Sign Up</h1>
        <p style="font-size: 16px">Just a few clicks away from joining the biggest software development internship in Africa
        </p>
        <p><span style='color: grey'>Already have an account?</span> <a class='link' href="login.php" style="color: #2196F3; text-decoration: none">Login</a></p>
        </div>
                <div id="message">
            
               </div>
               
<<<<<<< HEAD
            <form action="" class="text-center" name="register_form" id="register_form">
=======
            <form action="" method="post" class="text-center" name="register_form" id="register_form">
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            <div class="form-row">
                <div class="form-group col-md-6" style="padding-right:50px">
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group col-md-6" style="padding-right:50px">
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                </div>
            </div>

            <input type="hidden" name="username" id="username" class="form-control" placeholder="User Name">

             
            <br />
            <div class="form-row">
                <div class="form-group col-md-6" style="padding-right:50px">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                </div>
                <div class="form-group col-md-6" style="padding-right:50px">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <br />
<<<<<<< HEAD
=======
            <!--
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            <div class="form-row">
                <div class="form-group col-md-6" style="padding-right:50px">
                     <input type="text" name="country" id="country" class="form-control" placeholder="Enter your country ">
                  </div>
                    <div class="form-group col-md-6" style="padding-right:50px">
                        <input type="text" name="state" id="state" class="form-control" placeholder="Enter your state ">
                    </div>
        </div>
<<<<<<< HEAD

=======
            -->
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            
            <br />
             <div class="form-row">
                        <div class="form-group col-md-6" style="padding-right:50px">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group col-md-6" style="padding-right:50px">
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm Password ">
                        </div>
                    </div>
                <input type="hidden" name="registration" value="yes">

            
            <br />
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms">
                    <label class="form-check-label" for="terms">
                    I agree to the <a class='link' href="terms-and-conditions.php" style="color: #2196F3; text-decoration: none">Terms and Conditions</a>
                    </label>
                </div>
            </div>
            <br>
           
            <button type="submit" name="register" class="btn btn-signup" id="register">Sign Up </button>
        </form>

    </div>
</div>
</div>
<<<<<<< HEAD

=======
<script src="https://cdnjs.cloudflare.com/ajax/libs/stellar-sdk/0.8.0/stellar-sdk.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
<script type="text/javascript">
       $( document ).ready(function() {
    $("#register").click(function(e){
        e.preventDefault();

        var firstname = $("#firstname").val();
         var lastname = $("#lastname").val();
        var email = $("#email").val();
        var phone = $("#phone").val(); 
        var password = $("#password").val();
        var password_confirm = $("#password_confirm").val();
<<<<<<< HEAD
        var state = $("#state").val();
=======
        // var state = $("#state").val();
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
        var country = $("#country").val();

        var terms = $('#terms').is(':checked'); 
        
        if(firstname ==""){
<<<<<<< HEAD
            alert('please enter your firstname');
=======
            //alert('please enter your firstname');
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter your firstname');
        }
        else if(lastname ==""){
<<<<<<< HEAD
            alert('please enter your lastname');
=======
            //alert('please enter your lastname');
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter your lastname');
        }
       else if(email ==""){
<<<<<<< HEAD
            alert('please enter email');
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter email');
        }
        else if(country ==""){
            alert('Please enter your country');
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter your country');
        }

        else if(state ==""){
            alert('Please enter state');
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter state');
        }

         else if(phone ==""){
            alert('Please enter Phone Number');
=======
            //alert('please enter email');
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter email');
        }
        // else if(country ==""){
        //    // alert('Please enter your country');
        //     $("#message").addClass('alert alert-danger');
        //     $("#message").html('Please enter your country');
        // }

        // else if(state ==""){
        //    // alert('Please enter state');
        //     $("#message").addClass('alert alert-danger');
        //     $("#message").html('Please enter state');
        // }

         else if(phone ==""){
            //alert('Please enter Phone Number');
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter Phone Number');
        }
        else if(password ==""){
<<<<<<< HEAD
            alert('Please enter password');
=======
           // alert('Please enter password');
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            $("#message").addClass('alert alert-danger');
            $("#message").html('Please enter password');
        }

        else if(password != password_confirm){
<<<<<<< HEAD
            alert('Passwords dont match');
=======
           // alert('Passwords dont match');
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            $("#message").addClass('alert alert-danger');
            $("#message").html('Passwords dont match');
        }
        else if(terms == false){
<<<<<<< HEAD
            alert('You must accept our terms and conditions to register');
=======
           // alert('You must accept our terms and conditions to register');
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
            $("#message").addClass('alert alert-danger');
            $("#message").html('Terms and conditions not accepted by you');
        }
        else{
            
            $("#username").val(firstname);
            
            $("#register").html('Registering..');

<<<<<<< HEAD
             var data = $("#register_form").serialize();

            

             $.ajax('process.php',{
            type : 'post',
            data : data,
            success: function(data){

             if(data==true){
                $("#message").addClass('alert alert-success');
            $("#message").html("Registration successful");

            $("#register").html('Registration successful');

            window.location ="dashboard.php";
             }  
             else{
                alert(data);
                $("#message").html(data);
                 $("#register").html('Failed');
             } 
            

            },
           error : function(jqXHR,textStatus,errorThrown){
                 if(textStatus ='error'){
                    alert('Request not completed');
                 }
                $("#register").html('Failed');
            },
            beforeSend :function(){

            $("#message").removeClass('alert alert-danger');
            $("#message").html('');

            $("#register").html('Registering..');
            },
=======
            var data = $("#register_form").serialize();
            
            const pair = StellarSdk.Keypair.random();
            const secret_key = pair.secret();
            const public_key = pair.publicKey();

            // use public key to create account
            axios
                .get('https://friendbot.stellar.org?addr='+public_key)
                .then(function(response){
                    data += "&private_key="+secret_key+"&public_key="+public_key;
                        
                    //alert('worked');
                    $.ajax('process.php',{
                    type : 'post',
                    data : data,
                    success: function(data){

                        if(data==true){
                            $("#message").addClass('alert alert-success');
                        $("#message").html("Registration successful");

                        $("#register").html('Registration successful');

                        window.location ="dashboard.php";
                        }  
                        else{
                        // alert(data);
                            $("#message").html(data);
                            $("#register").html('Failed!');
                        } 
                    },
                    error : function(jqXHR,textStatus,errorThrown){
                        if(textStatus ='error'){
                        //  alert('Request not completed');
                        }
                        $("#register").html('Failed!!');
                        },
                    beforeSend :function(){

                        $("#message").removeClass('alert alert-danger');
                        $("#message").html('');

                        $("#register").html('Registering..');
                    },
                }).catch(function(error){
                    console.error(error);
                });
>>>>>>> ca09930071e7c6a39ee8b1b0693ba9c769329570
        });
    

        }
        
     });



    });
</script>
<?php
    include_once("footer.php");
?>
