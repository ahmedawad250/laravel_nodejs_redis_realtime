<!-- resources/views/auth/register.blade.php -->
@extends('dashboard.index');
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form method="POST" action="{{asset('auth/register')}}">
    {!! csrf_field() !!}

    <div  class="form-group" >
        Name
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group" >
        Email
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group" >
        Password
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group" >
        Confirm Password
        <input type="password"  class="form-control" name="password_confirmation">
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