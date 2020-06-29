$(document).ready(function() {
    var friendId = $('#chat-with').attr('data-id');
    setInterval(function(){
        $.ajax({
            url:"/chat/update_chat",
            type: "POST",
            data: ({'friendId': friendId}),
            dataType: "json",
            success:function(response)
            {
                $.each(response, function(item) {
                $("#user_block").append(`
                <li style="border-bottom:1px dotted #ccci" align="right">
                  <p style="color:red" >
                    <img src='/public/images/${response[item]['avatar']}' width='50px'><br>
                    ${response[item]['body']}
                    <div align="right" id="bl">
                      <small><em>${response[item]['date']}</em></small>
                    </div>
                  </p>
                </li>
                `)
                });
            }
        });
    }, 5000);

    $("#send_msg").on("click", function() {
        var message = $("#user-message").val();
        var to_id = $(this).data("id");
        $.ajax({
            url: "/chat/InsertMessage",
            type: "POST",
            data: ({ "to_id": to_id, "message": message, "act":"sended"}),
            dataType: "json",
            success: function(response) {
                $("#user_block").append(`
                <li style="border-bottom:1px dotted #ccci">
                  <p style="color:green" >
                    ${response[0]}
                    <div align="left" id="bl">
                      <small><em>${response[1]}</em></small>
                    </div>
                  </p>
                </li>
                `)
            },
            error: function(xhr){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert('Error - ' + errorMessage);
            }
        });
    });
});

