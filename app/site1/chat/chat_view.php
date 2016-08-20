<script>
    $(document).on('click', '.panel-heading span.icon_minim', function (e) {    
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('focus', '.panel-footer input.chat_input', function (e) {
        var $this = $(this);
        if ($('#minim_chat_window').hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideDown();
            $('#minim_chat_window').removeClass('panel-collapsed');
            $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('click', '#new_chat', function (e) {
        var size = $(".chat-window:last-child").css("margin-left");
        size_total = parseInt(size) + 400;
        alert(size_total);
        var clone = $("#chat_window_1").clone().appendTo(".container");
        clone.css("margin-left", size_total);
    });
    $(document).on('click', '.icon_close', function (e) {
        //$(this).parent().parent().parent().parent().remove();
        $("#chat_window_1").remove();
    });


</script>


<div class="container">
    <div class="chat-window col-xs-5 col-md-3" id="chat_window_1">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Miguel</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <form method="post">
                            <input type="submit" class="endchat" name="submit" value="END" data-id="chat_window_1">
                        </form>
                    </div>
                </div>
                <div class="panel-body msg_container_base" id="messages">

                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input  id="entercaht" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <input  id="sendbtn" class="btn btn-primary btn-sm" type="button" onclick="sendajax()" value="send">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>