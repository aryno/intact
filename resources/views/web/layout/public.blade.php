@extends('web.layout.master')
@section('content')
    <div class="shadow-sm position-fixed w-100" style="z-index: 3;top:0;">
        @include('web.layout.navbar')
        @stack('header')
    </div>
    <div class="mt-5" style="min-height: 500px;">
        @yield('main')
    </div>
    @include('web.layout.footer')
@endsection
