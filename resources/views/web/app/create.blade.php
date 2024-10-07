@extends('web.layout.public')
@section('title', 'Create your app')
@section('main')
<div class="container mt-5">
    <div class="card p-4 shadow border-0">
    	@include('common.status')

        <div class="card-body">
            <div class="text-center mb-4">
                <h3 class="fw-light">Register your app to get started</h3>
                <p>These details will help us keep track your your app</p>
            </div>
            <div class="mb-3 w-50 mx-auto">
                <form method="post" action="{{ route('app.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="app_name" class="mb-1">App Name</label>
                        <input type="text" name="app_name" id="app_name" class="form-control" placeholder="My Todo App">
                        @include('common.form-feedback', ['name' => 'app_name'])
                    </div>
                    <div class="mb-3">
                        <label for="app_url" class="mb-1">App URL</label>
                        <input type="text" name="app_url" id="app_url" class="form-control" placeholder="http://example.com">
                        @include('common.form-feedback', ['name' => 'app_url'])
                    </div>
                    <div class="mb-3">
                        <label for="app_info" class="mb-1">Describe your app</label>
                        <textarea name="app_info" id="app_info" class="form-control" placeholder="My lovely todo app" rows="4"></textarea>
                        @include('common.form-feedback', ['name' => 'app_info'])
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Register my app</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
