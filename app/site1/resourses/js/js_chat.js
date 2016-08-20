
setInterval(function () {
    chatupdate()
}, 1000)
function chatupdate() {
    $.ajax({
        url: 'index.php?page=chat/process.php',
        type: 'POST',
        data: 'chatupdat=chat',
        success: function (response) {
            $("#messages").html(response);
        }
    });
}
function sendajax() {
    var chattext = $("#entercaht").val();
    var submit = $("#submit").val();
    var username = $("#username").val();
    $("#entercaht").val("");
    $.ajax({
        url: 'index.php?page=chat/process.php',
        type: 'POST',
        data: {chat: chattext, submit: submit, username: username},
        success: function (response) {
            $("#messages").html(response);
        }
    });
}


function get_page() {
    var admin = $("#admin1").val();
    var admin2 = $("#admin2").val();
    var user = $("#name").val();

    $.ajax({
        url: '?page=chat/chat_view.php',
        type: 'POST',
        data: {admin: admin, user: user, admin2: admin2},
        success: function (response) {
            $("#section").html(response);
        }
    });
}


$(document).ready(function () {
    $("#btn_get_div").click(function () {
        $("#section").show();
        $("#section").animate({top: "260px"});
        $(this).animate({top: "200px"});
        $("#mins").animate({top: "220px"});
        $(".chat-window").animate({top: "285px"});
    });
    $("#mins").click(function () {
        $("#section").hide();
        $("#section").animate({top: "670px"});
        $(".chat-window").animate({top: "670px"});
        $(this).animate({top: "620px"});
        $("#btn_get_div").animate({top: "607px"});
    });

    $("#new").click(function () {

        $("#section").show();
        $("#section").animate({top: "260px"});
        $("#btn_get_div").animate({top: "200px"});
        $("#mins").animate({top: "220px"});
        $(".chat-window").animate({top: "260px"});
    });


});


