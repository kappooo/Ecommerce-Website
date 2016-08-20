setInterval(function () {
        chatupdate()
    }, 1000)
    function chatupdate() {
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: 'chatupdat=chat',
            success: function (response) {
                $("#messages").html(response);
            }
        });
    }
    function sendajax() {
        var chattext = $("#entercaht").val();
        $("#entercaht").val("");
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: {chat: chattext},
            success: function (response) {
                $("#messages").html(response);
            }
        });
    }
    
    
    function get_pages() {       
        $.ajax({
            url: 'process_2.php',
            type: 'POST',
            success: function (response) {
                $("#section").html(response);
            }
        });
    }