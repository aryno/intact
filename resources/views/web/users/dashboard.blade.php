@extends('web.layout.public')
@section('title', 'Dashboard - '.config('app.name'))
@section('main')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-9 mx-auto">
            <div class="mb-4">
                <h4>Welcome {{ auth()->user()->name }}</h4>
            </div>
            @if(auth()->user()->apps->isEmpty())
            <div class="p-3 bg-warning bg-opacity-10">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        You haven't registered any apps yet. Register an app to get started
                    </div>
                    <div>
                        <a href="{{ route('app.create') }}" class="btn btn-primary float-end">+ Create App</a>
                    </div>
                </div>
            </div>
            @else
            	<div class="p-3 bg-success bg-opacity-10">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        You have {{ auth()->user()->apps->count() }} associated active apps. You can view and manage them here.
                    </div>
                    <div>
                        <a href="{{ route('app.list') }}" class="btn btn-success float-end">Manage Apps</a>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
