
    $('.hide-chat-box').click(function(){
        $('.chat-content').slideToggle();
    });

    $('.show-chat-box').click(function(){
        $('.chat-content').slideToggle();
    });

    //method to trigger when user hits enter key
    $("#chat-message").keypress(function(evt) {
        if(evt.which == 13) {
            var imessage = $('#receive-msg').val();
            post_data = {'message':imessage};

            //send data to "shout.php" using jQuery $.post()
            $.post('answers.php', post_data, function(data) {

                //append data into messagebox with jQuery fade effect!
                $(data).hide().appendTo('.message-box').fadeIn();

                //keep scrolled to bottom of chat!
                var scrolltoh = $('.chat-content')[0].scrollHeight;
                $('.chat-content').scrollTop(scrolltoh);

                //reset value of message box
                $('#chat-message').val('');

            }).fail(function(err) {

                //alert HTTP server error
                alert(err.statusText);
            });
        }
    });