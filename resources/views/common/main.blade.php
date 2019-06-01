@extends('layouts.app')
@section('content')
<div class="d-flex mt-4" id="wrapper">
    <!-- Sidebar -->
    @include('common.sidebar')
    <!-- /#sidebar-wrapper -->
    <div class="container page-content-wrapper ">
        <div class="row justify-content-center mt-3 contenedor">
            @yield('main')
        </div>
    </div>
</div>
@endsection
