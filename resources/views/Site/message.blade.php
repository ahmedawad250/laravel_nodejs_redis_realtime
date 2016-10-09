@extends('Site/master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Real Time Message Using Laravel Nodejs</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Real Time Message Using Laravel Nodejs
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2">
                            </div>
                        <div class="col-lg-4">
                                <div  class="row" id="message-content" >
                                    <div  class="form-group" >
                                        First Message
                                    </div>
                                </div>
                                <div  class="form-group" >
                                    Send Message
                                    <input type="text" class="form-control" id="message" name="message" value="">
                                </div>


                                <div>
                                    <button type="button" class="btn btn-success" onclick="send_message();">Send message</button>
                                </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <script type="text/javascript">
        function send_message() {
            var message = $("#message").val();
            $.post("store", {message:message,"_token": "{{ csrf_token() }}"}, function (data) {
            });
        }
            var socket = io.connect('http://127.0.0.1:3000/');
            socket.on("messages", function (data) {
                var data = JSON.parse(data);
                console.log(data);
                $("#message-content").append('<div class="form-group" >'+data.message+'</div>');
                    var args = arguments;
                    $rootScope.$apply(function () {
                        callback.apply(socket, args);
                });
            });
    </script>
@stop