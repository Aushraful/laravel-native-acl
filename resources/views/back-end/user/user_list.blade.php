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


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User List</h3>
            <a href="/users/create" class="btn btn-info pull-right">
                <i class="fa fa-plus-square"></i>&nbsp; Add user
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="user-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->avatar}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <span class="label label-{{$user->status == 'approved' ? 'success':''}}{{$user->status == 'disapproved' ? 'danger':''}}{{$user->status == 'pending' ? 'warning':''}}">{{$user->status}}</span></td>
                            <td width="165px" class="text-center">
                                <table>
                                    <tr>
                                        <td style="padding-right: 5px">
                                            <form action="/users/statuscontroll/{{ $user->id }}" method="POST">
                                                @method('POST')
                                                @csrf
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-success {{$user->status == 'approved' ? 'hidden':''}}" name="action" value="approved" style="margin-right: 5px;"><i class="fa fa-check"></i></button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-default {{$user->status == 'pending' ? 'hidden':''}}" name="action" value="pending" style="margin-right: 5px;"><i class="fa fa-warning"></i></button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-warning {{$user->status == 'disapproved' ? 'hidden':''}}" name="action" value="disapproved"><i class="fa fa-ban"></i></button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </td>
                                        <td style="padding-right: 5px">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td style="padding-right: 5px">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{--<tfoot>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
                </tfoot>--}}
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


@endsection