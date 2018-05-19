
"use strict"; // start of use strict


if ($(".contact-form").length) {
  /**/
  /* contact form */
  /**/

  /* validate the contact form fields */
  $(".contact-form").each(function(){

  $(this).validate(  /*feedback-form*/{
    onkeyup: false,
    onfocusout: false,
    errorElement: 'p',
    errorLabelContainer: $(this).parent().children(".alert.alert-danger").children(".message"),
    rules:
      {
        name: { required: true },
        email:{ required: true, email: true },
        phone: { required: true },
        message: { required: true }
      },
      messages:
      {
        name: { required: 'Please enter your name', },
        email:{ required: 'Please enter your email address',
        email: 'Please enter a VALID email address' },
        phone: { required: 'Please enter your phone number'  },
        message: { required: 'Please enter your message'  }
      },
      invalidHandler: function()
      {
        $(this).parent().children(".alert.alert-danger").slideDown('fast');
        $("#feedback-form-success").slideUp('fast');
      },
      submitHandler: function(form)
      {
        $(form).parent().children(".alert.alert-danger").slideUp('fast');
        var $form = $(form).ajaxSubmit();
        submit_handler($form, $(form).parent().children(".email_server_responce") );
      }
    });
  })

  /* Ajax, Server response */
  var submit_handler =  function (form, wrapper){

    var $wrapper = $(wrapper); //this class should be set in HTML code

    $wrapper.css("display","block");
    var data = {
      action: "email_server_responce",
      values: $(form).serialize()
    };
    //send data to server
    $.post("contacts-process.php", data, function(s_response) {
      s_response = $.parseJSON(s_response);
      if(s_response.info == 'success'){
        $wrapper.addClass("message message-success").append('<div role="alert" class="alert alert-success alt alert-dismissible fade in"><button type="button" data-dismiss="alert" aria-label="Close" class="close"></button><i class="alert-icon flaticon-suntour-check"></i><strong>Success!</strong><br>Your message was successfully delivered.</div>');
        $wrapper.delay(5000).slideUp(300, function(){
          $(this).removeClass("message message-success").text("").fadeOut(500);
          $wrapper.css("display","none");
        });
        $(form)[0].reset();
      } else {
        $wrapper.addClass("message message-error").append('<div role="alert" class="alert alert-warning alt alert-dismissible fade in"><button type="button" data-dismiss="alert" aria-label="Close" class="close"></button><i class="alert-icon flaticon-warning"></i><strong>Error!</strong><br>Server fail! Please try again later!</div>');
        $wrapper.delay(5000).hide(500, function(){
          $(this).removeClass("message message-success").text("").fadeIn(500);
          $wrapper.css("display","none");
        });
      }
    });
    return false;
  }

  $('form.form.contact-form').on("click", function() {
  $(this).find('p.error').remove();
  })
}
