$( document ).ready(function() {
    //bind all btn events
    function initAfterLoading()
    {
        $('.show-more').on('click', function(){
            var current_element = this;
            var comment_id = $(current_element).parent().attr('id').split('-')[1];
            sendAjax(comment_id, current_element);
        });

        $('.add-reply').on('click', function(){
            $(this).parent().children("input").show();
        });

        $(".reply-field").focusout(function() {
            $(this).fadeOut();
            $(this).next("input").fadeOut();
        });

        $('.send-reply-btn').on('click', function(){
            var current_element = this;
            var comment_id = $(this).parent().attr('id').split('-')[1];
            var message = $(this).prev("input").val();
            if(message) {
                addComment(comment_id, current_element, message);
            }
        });
    }

    function disablePreviousEvents()
    {
        $(".send-reply-btn").unbind();
        $(".show-more").unbind();
    }

    // display sub comments
    function sendAjax(comment_id, current_element)
    {
        $.ajax({
            type: "POST",
            url: "/Comments/AjaxShow",
            data: {"parent_id" : comment_id},
            success: function(data){
                if(data == -1) {
                    alert("no messages in reply");
                }
                else {
                    disablePreviousEvents();
                    $(current_element).parent().after(data);
                    initAfterLoading();
                    initAfterCreate();
                }
                $(current_element).hide();
            }
        });
    }

    // add comment
    function addComment(comment_id, current_element, message)
    {
        $.ajax({
            type: "POST",
            url: "/Comments/AjaxComment",
            data: {
                "parent_id" : comment_id,
                "message" : message
            },
            success: function(data){
                if(data == -1) {
                    alert("reply was not saved");
                }
                else {
                    disablePreviousEvents();
                    $(current_element).parent().after(data);
                    initAfterLoading();
                }
                $(current_element).fadeOut();
                $(current_element).prev("input").fadeOut();
            }
        });
    }

    // initial event bind
    initAfterLoading();
});