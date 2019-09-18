@extends('layouts.back-end')

@section('authorization-nav')
    active
@endsection

@section('assign-permission')
    active
@endsection

@section('assign-role-permission')
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


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Assign permission to role</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="padding: 25px; ">

            <div class="row" style="padding: 10px; border: 1px solid #ccc;">
                <div class="col-md-2 text-center"><strong>Role</strong></div>
                <div class="col-md-8 text-center" style="border-left: 1px solid #ccc;"><strong>Permissions</strong></div>
                <div class="col-md-2 text-center" style="border-left: 1px solid #ccc;"><strong>Action</strong></div>
            </div>
            @foreach($roles as $role)
                <form action="/assign-role-permission" method="post">
                    @csrf
                    <div class="row" style="padding: 10px; border: 1px solid #ccc;">
                        <div class="col-md-2">
                            {{$role->name}}<input type="hidden" name="role_id" value="{{$role->id}}">
                        </div>
                        <div class="col-md-8" style="border-left: 1px solid #ccc; border-right: 1px solid #ccc;">
                            @foreach($permissions as $permission)
                                <label class="btn btn-default" style="margin-top: 5px; margin-bottom: 5px;">
                                    <input type="checkbox" class="flat-red" name="permission_id[]" value="{{$permission->id}}"
                                    @foreach($role->permissions as $all_permissions)
                                        {{$all_permissions->id == $permission->id ? 'checked':''}}
                                            @endforeach
                                    >
                                    {{$permission->name}}
                                </label>
                            @endforeach
                        </div>
                        <div class="col-md-2 text-center">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Update</button>
                        </div>
                    </div>
                </form>
            @endforeach

            {{--<table id="permission-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <form action="/authorization-list" method="post">
                            @csrf
                            <tr>

                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$role->name}}<input type="hidden" name="role_id" value="{{$role->name}}"></td>
                                    <td>
                                        @foreach($permissions as $permission)
                                            <label class="btn btn-default">
                                                <input type="checkbox" class="flat-red" name="permission_id[]" value="{{$permission->name}}"
                                                @foreach($role->permissions as $all_permissions)
                                                    {{$all_permissions->id == $permission->id ? 'checked':''}}
                                                @endforeach
                                                >
                                                {{$permission->name}}{{$permission->id}}
                                            </label>
                                        @endforeach
                                    </td>
                                    <td width="100px" class="text-center">

                                        <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Update</button>

                                    </td>

                            </tr>
                        </form>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
                </tfoot>
            </table>--}}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


@endsection