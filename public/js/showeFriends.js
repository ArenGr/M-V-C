jQuery(document).ready(function($) {
    $("#showe_friends").bind("click", function() {
        var user_id = $(this).data("id");
        $.ajax({
            url: "/profile/friends",
            type: "POST",
            data: ({ action: "sended"}),
            dataType: 'json',
            success: function(response) {
                var output = "";
                $.each(response, function(item) {
                    if (response[item]['id']!=user_id) {
                        output += `
                    <tr>
                    <td>
                    <img src='../public/images/${response[item]['avatar']}' width='80px'>
                        </td>
                        <td style='padding-left: 20px; padding-top:30px'>
                        <a href='/profile/user/${response[item]['id']}'>${response[item]['user_name']}</a>
                        </td>
                        </tr>
                        <br>
                        `;
                    }
                });
                $(".friends-list").html(output);
            }
        });
    });
});
