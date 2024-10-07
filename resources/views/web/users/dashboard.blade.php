@extends('web.layout.public')
@section('title', 'Dashboard - '.config('app.name'))
@section('main')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-9 mx-auto">
            <div class="mb-4">
                <h4>Welcome {{ auth()->user()->name }}</h4>
            </div>
            <div class="p-4 bg-warning bg-opacity-10">
                <div class="d-flex justify-content-between">
                    <div>
                        You haven't registered any apps yet. Register an app to get started
                    </div>
                    <div>
                        <a href="{{ route('app.create') }}" class="btn btn-primary float-end">+ Create App</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
