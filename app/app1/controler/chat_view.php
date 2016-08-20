<h1>chat</h1>
<script>
setInterval(function () {
        chatupdate()
    }, 1000)
    function chatupdate() {
        $.ajax({
            url: '?page=chat_process.php',
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
            url: '?page=chat_process.php',
            type: 'POST',
            data: {chat: chattext},
            success: function (response) {
                $("#messages").html(response);
            }
        });
    }

</script>

<style>

    #section{
        width: 700px;
        height: 500px;
        background-color: azure;
        margin: 0 auto;
        margin-top: -130px;
    }
    #messages{
        width: 500px;
        height: 300px;
        margin: 0 auto;
        border: 1px solid #ccc;
        margin-top: 150px;
        overflow-y: scroll;
    }
    #entercaht{
        margin-top: 10px;
        width: 455px;
        height: 40px;
        margin-left: 99px;}
    #sendbtn{
        height: 40px;
        color: wheat;
        background-color: black;
    }


</style>


<div id="section">
    <div id="messages"></div>
    <input id="entercaht" type="text">
    <input id="sendbtn" type="button" onclick="sendajax()" value="send">
</div>