@extends('web.layout.master')
@section('content')
    <div class="shadow-sm position-fixed w-100" style="z-index: 3;top:0;">
        @include('web.layout.navbar')
        @stack('header')
    </div>
    <div class="" style="min-height: 500px;padding-top: 60px;">
        @yield('main')
    </div>
    @include('web.layout.footer')
@endsection
