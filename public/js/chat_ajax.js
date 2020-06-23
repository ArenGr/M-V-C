jQuery(document).ready(function($) {
    $("#send_msg").on("click", function() {
    var id = $(this).attr("data-id"); 
        $.ajax({
            url: "chat/converation/"+id,
            type: "POST",
            data: ({ act: "sended" }),
            dataType: "html",
            success: function(data) {
                $("#a").html(data);
            },
            error: function(xhr){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert('Error - ' + errorMessage);
            }
        });
    });
});
