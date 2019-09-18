@extends('layouts.back-end')

@section('permission-nav')
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
            <h3 class="box-title">Permission List</h3>
            <a href="/permissions/create" class="btn btn-info pull-right">
                <i class="fa fa-plus-square"></i>&nbsp; Add permission
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="permission-list" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->slug}}</td>
                        <td width="165px" class="text-center">
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="/permissions/{{$permission->id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                            </form>
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