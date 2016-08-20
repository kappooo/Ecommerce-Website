
<script src="resources/js/jquery-1.11.3.min.js" ></script>
<script src="resources/js/chat_ajax.js" ></script>
<!-- ///////////////////////////start chat room html here //////////////////////////////////   -->

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
                <div class="panel-collapse collapse" id="collapseOne">
                    <div class="panel-body">
                        <ul class="chat" id="messages">

                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="entercaht" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                            <span class="input-group-btn">
                                <input id="sendbtn" type="button" onclick="sendajax()" value="send"class="btn btn-warning">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ///////////////////////////end chat room html here //////////////////////////////////   -->


<!-- ///////////////////////////start chat room css style here //////////////////////////////////   -->
<style>

    .chat
    {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .chat li
    {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dotted #B3A9A9;
    }

    .chat li.left .chat-body
    {
        margin-left: 60px;
    }

    .chat li.right .chat-body
    {
        margin-right: 60px;
    }


    .chat li .chat-body p
    {
        margin: 0;
        color: #777777;
    }

    .panel .slidedown .glyphicon, .chat .glyphicon
    {
        margin-right: 5px;
    }

    .panel-body
    {
        overflow-y: scroll;
        height: 250px;
    }

    ::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }

    #sendbtn{
        width: 55px;
        height: 31px;
        padding: 2px;
    }

</style>


<!-- ///////////////////////////end chat room css style here //////////////////////////////////   -->
