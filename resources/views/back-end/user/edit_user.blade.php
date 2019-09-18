@extends('layouts.back-end')

@section('user-nav')
    active
@endsection

@section('content-header')

        <h1>
            Dashboard
            <small>Blank example to the fixed layout</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Fixed</li>
        </ol>

@endsection

@section('content')


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name" value="{{$user->full_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username" value="{{$user->username}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Avatar</label>
                    <input type="file" name="avatar">

                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$user->email}}" disabled>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <div class="pull-right">
                    <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                </div>

            </div>
        </form>
    </div>
    <!-- /.box -->


@endsection