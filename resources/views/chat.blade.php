<!DOCTYPE html>
<html lang="en">


@include('includes.header')
{!! Html::style('css/chatCustom.css') !!}
<body>


<div class="wraper container-fluid">
    <section class="">
        

<div class="container">
    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Bot</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base">
                    <!-- <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_sent">
                                <p>that mongodb thing looks good, huh?
                                tiny master db, and huge document store</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                    </div>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p>that mongodb thing looks good, huh?
                                tiny master db, and huge document store</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                    </div> -->
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-xs-10 col-md-10">
                            <div class="messages msg_receive">
                                <p>that mongodb thing looks good, huh?
                                tiny master db, and huge document store</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                    </div>
                    <div class="row msg_container base_sent">
                        <div class="col-xs-10 col-md-10">
                            <div class="messages msg_sent">
                                <p>that mongodb thing looks good, huh?
                                tiny master db, and huge document store</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="//www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                    </div>

                    <!-- <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-xs-10 col-md-10">
                            <div class="messages msg_receive">
                                <p>that mongodb thing looks good, huh?
                                tiny master db, and huge document store</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                    </div>

                    <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10 ">
                            <div class="messages msg_sent">
                                <p>that mongodb thing looks good, huh?
                                tiny master db, and huge document store</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                    </div> -->

                </div>
                <div class="panel-footer">
                    {!! Form::open(array('route' => 'sendData', 'method' => 'post', 'class' => 'form-horizontal sendData')) !!}
                    <div class="input-group">
                        {!! Form::text('message', '', array('class' => 'form-control input-sm chat_input', 'placeholder' => 'Write your message here...','id' => 'btn-input', 'type'=>'text','autofocus') ) !!}
                        
                        <span class="input-group-btn">
                        {!! Form::submit('Send', array('class' => 'btn btn-primary btn-sm', 'type'=>'submit', 'id' => 'btn-send')) !!}
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
    <div class="btn-group dropup">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-cog"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
        </ul>
    </div>
</div>

</section>




</div>
<!-- <footer class="footer">
    <center>
    Copyright&copy; 2016 CSE, Bangladesh. All rights reserved.</center>
</footer>
 -->
{!! Html::script('/js/jquery.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/pace.min.js')!!}
    {!! Html::script('/js/wow.min.js') !!}
    {!! Html::script('/js/jquery.nicescroll.js') !!}
    {!! Html::script('/js/jquery.app.js') !!}


<script type="text/javascript">
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
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});

            var message;
            // var deleteId;
            var url;
            var dataString;
          
            var deleteAttemptr = '';
            $(document).on("click", "#btn-send", function(e) {
                e.preventDefault();

                    // deleteAttemptr = $(this).parent().parent();
                    
                    
                    message = $("input#btn-input").val();
                    $(".msg_container_base").append('<div class="row msg_container base_receive">\
                            <div class="col-md-2 col-xs-2 avatar">\
                                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">\
                            </div>\
                            <div class="col-xs-10 col-md-10">\
                                <div class="messages msg_receive">\
                                    <p>'+ message +'</p>\
                                    <time datetime="2009-11-13T20:00">Timothy • 51 min</time>\
                                </div>\
                            </div>\
                        </div>');

                    
                    url = "{{ route('sendData') }}";
                    
                     console.log(message);
                     console.log(url);
                    //var token =  $("input[name=_token]").val();
                    // dataString = { password : password,
                    //                 id : deleteId
                    //             }

                    
                    e.preventDefault();
                    $('form.deleteForm').serialize();
                       $.ajax({
                            type: "POST",
                            url: url,
                            data: $('form.sendData').serialize(),
                            success: function(response){

                                if(response.status_code == '201'){
                                 var message = 'Successfull';
                                    
                                $("input#btn-input").val('');
                                 $(".msg_container_base").append('<div class="row msg_container\ base_sent">\
                                        <div class="col-md-10 col-xs-10">\
                                            <div class="messages msg_sent">\
                                                <p>'+response.data+'</p>\
                                                <time datetime="2009-11-13T20:00">ChatBot • 51 min</time>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-2 col-xs-2 avatar">\
                                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">\
                                        </div>\
                                    </div>');
                                 
        
                                $('.msg_container_base').scrollTop($('.msg_container_base')[0].scrollHeight);

                                    
                                    console.log(response);
                                    // $("#deleteConfirm").modal('toggle');
                                    // deleteAttemptr.hide();               
                                }
                                
                                // console.log(response);

                            },
                            error: function(response){
                                // var message = 'Something Went Wrong';
                                //var message = "";
                                // var response = $response.responseJSON;
                                console.log(response);
                                // var obj = response.error;
                                // for (var key in obj) {
                                //     message += obj[key]+"<br>";
                                // }
                                // generatePopUpMessage(obj, 'danger');
                                //$("#error").html(response);
                            }
                        }); //end of ajax 
            });// end of delete 



</script>




</body>
</html>