$(document).ready(function() {
    $("#send_msg").bind("click", function() {
    // var id1 = $(this).data("id"); 
    //     alert(id1);
        $.ajax({
            url: "/chat/chatOnline",
            type: "POST",
            data: ({ act: "sended" }),
            dataType: "html",
            success: function(data) {
                $("#chat-board").html(data);
            },
            error: function(xhr){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert('Error - ' + errorMessage);
            }
        });
    });
});
