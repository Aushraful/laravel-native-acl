@extends('layouts.back-end')

@section('dashboard-nav')
    active
@endsection

@section('content-header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Blank example to the fixed layout</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Fixed</li>
        </ol>
    </section>

@endsection

@section('content')

    <!-- /.box -->

    @if(Auth::user())
        @can('view-user')
            <span class="text-black">can('view-user')</span>
        @endcan
        <br>
        @can('create-user')
            <span class="text-blue">can('create-user')</span>
        @endcan
        <br>
        @can('update-user')
            <span class="text-green">can('update-user')</span>
        @endcan
        <br>
        @can('delete-user')
            <span class="text-red">can('delete-user')</span>
        @endcan
        <br>
        @can('see-product-sales')
            <span class="text-red">can('see-product-sales')</span>
        @endcan
        <br>
        @can('create-invoice')
            <span class="text-red">can('create-invoice')</span>
        @endcan
    @else
        Section for non authenticated users
    @endif


@endsection
