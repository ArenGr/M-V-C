jQuery(document).ready(function($) {
   $("#showe_friends").bind("click", function() {
       $.ajax({
        url: "profile/friends",
        type: "POST",
        data: ({ action: "sended"}),
        dataType: "html",
        success: function(response) {
            $(".friends_names").html(response);
        }
       });
   }); 
});
