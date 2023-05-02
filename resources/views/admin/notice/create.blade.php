@extends('admin.notice.layout')
@section('content')
    @include('admin.include.header')
    <div id="layoutSidenav">
        @include('admin.include.side-nav')
        <div id="layoutSidenav_content">
            @include('admin.include.footer')
        </div>
    </div>
@endsection
