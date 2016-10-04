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
                            <form method="POST" action="{{URL::Route('message') }}">
                                {!! csrf_field() !!}
                                <div  class="row" >
                                    <div  class="form-group" >
                                        Send Message
                                    </div>
                                    <div  class="form-group" >
                                        Send Message
                                    </div>
                                </div>
                                <div  class="form-group" >
                                    Send Message
                                    <input type="text" class="form-control" name="message" value="">
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
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
@stop