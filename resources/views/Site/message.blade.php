@extends('Site/master')

@section('content')
    <section class="app-content view ng-scope" id="app-content" ui-view="">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Real Time Message Using Laravel Nodejs</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="msg-outer ng-scope" ng-controller="inboxController">
            <div class="msg-content">
                <div class="msg-inbox msg-vbox">
                    <ul class="msg-config">
                        <li>
                            <div class="msg-title">
                                <h3>Inbox</h3>
                            </div>
                        </li>

                    </ul>
                    <div class="search-friends">
                        <input type="search" ng-model="username" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="Search for converstion...">
                    </div>
                    <!-- ngIf: !loadInbox --><ul class="inbox-list ng-scope" ng-if="!loadInbox">
                        <!-- ngRepeat: i in inbox | filter:username | orderBy:'created_at':true track by i.conv_id --><li ng-repeat="i in inbox | filter:username | orderBy:'created_at':true track by i.conv_id " ng-class="{'_unviewed': !i.is_seen}" class="ng-scope">
                            <a ui-sref="#" ui-sref-active="selected" href="#" class="">
                                <div class="list-message-thumb">
                                    <img ng-src="{{ asset('img/user1.jpg') }}" alt="" uid="934831346560666" width="45" class="ng-isolate-scope" src="{{ asset('img/user1.jpg') }}">
                                </div>
                                <div class="list-message-content">
                                    <h5 class="title ng-binding">User1</h5>
                                    <p class="caption ng-binding">test message</p>
                                    <span class="conv_date" am-time-ago="i.created_at">3 hours ago</span>
                                </div>
                                <div class="list-config"></div>
                            </a>
                        </li><!-- end ngRepeat: i in inbox | filter:username | orderBy:'created_at':true track by i.conv_id --><li ng-repeat="i in inbox | filter:username | orderBy:'created_at':true track by i.conv_id " ng-class="{'_unviewed': !i.is_seen}" class="ng-scope">
                            <a ui-sref="#" ui-sref-active="selected" href="#" class="selected">
                                <div class="list-message-thumb">
                                    <img ng-src="{{ asset('img/user2.jpg') }}" alt="" uid="789918211123930" width="45" class="ng-isolate-scope" src="{{ asset('img/user2.jpg') }}">
                                </div>
                                <div class="list-message-content">
                                    <h5 class="title ng-binding">User2</h5>
                                    <p class="caption ng-binding">thanks ahmed</p>
                                    <span class="conv_date" am-time-ago="i.created_at">2 days ago</span>
                                </div>
                                <div class="list-config"></div>
                            </a>
                        </li><!-- end ngRepeat: i in inbox | filter:username | orderBy:'created_at':true track by i.conv_id -->
                    </ul><!-- end ngIf: !loadInbox -->

                    <div class="txt-center mt-lg">
                        <!-- ngIf: loadInbox -->
                    </div>
                </div>
                <div class="msg-container msg-vbox ng-scope" ng-controller="messagesController">
                    <div class="msg-position">
                        <div class="msg-body ng-isolate-scope" id="message-content" schroll-bottom="messages" >
                            <!-- ngIf: !loadedMsg --><div ng-if="!loadedMsg" class="ng-scope">
                                <!-- ngRepeat: m in messages track by m.id -->
                                <div class="message ng-scope right" ng-repeat="m in messages track by m.id">
                                    <div class="message-container">
                                        <div class="message-text ng-binding">test 1</div>
                                        <div class="message-setting">
                                            <span class="date ng-binding" am-time-ago="m.created_at">2 months ago</span>
                                        </div>
                                        <img   class="_uavatar ng-isolate-scope" width="32" src="{{ asset('img/user2.jpg') }}">
                                    </div>
                                </div><!-- end ngRepeat: m in messages track by m.id -->
                                <div class="message ng-scope left" ng-repeat="m in messages track by m.id" >
                                    <div class="message-container">
                                        <div class="message-text ng-binding">test 2</div>
                                        <div class="message-setting">
                                            <span class="date ng-binding" am-time-ago="m.created_at">2 months ago</span>
                                        </div>
                                        <img   class="_uavatar ng-isolate-scope" width="32" src="{{ asset('img/user2.jpg') }}">
                                    </div>
                                </div><!-- end ngRepeat: m in messages track by m.id -->
                            </div><!-- end ngIf: !loadedMsg -->

                            <!-- ngIf: loadedMsg -->
                        </div>


                        <div class="msg-sender">
                            <div class="typing-area">
                                <div class="text-holder">
                                    <textarea  class="form-control ng-pristine ng-untouched ng-valid ng-empty"  placeholder="type your message here..." id="message" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $("textarea").keyup(function(e) {
            var code = e.keyCode ? e.keyCode : e.which;
            if (code == 13) {  // Enter keycode
                send_message();
            }
        });
        function send_message() {
            var message = $("#message").val();
            $.post("store", {message:message,"_token": "{{ csrf_token() }}"}, function (data) {
            });
        }
            var socket = io.connect('http://127.0.0.1:3000/');
            socket.on("messages", function (data) {
                var data = JSON.parse(data);
                console.log(data);
                $("#message-content").append('<div class="message ng-scope left" ng-repeat="m in messages track by m.id" ><div class="message-container"><div class="message-text ng-binding">'+data.message+'</div><div class="message-setting"><span class="date ng-binding" am-time-ago="m.created_at">1 minute ago</span></div><img class="_uavatar ng-isolate-scope" width="32" src="{{ asset('img/user2.jpg') }}"></div></div>');
                    var args = arguments;
                    $rootScope.$apply(function () {
                        callback.apply(socket, args);
                });
            });
    </script>
@stop