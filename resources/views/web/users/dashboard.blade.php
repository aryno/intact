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
            <p class="fw-bold mb-4 text-success border-bottom border-2 d-inline-block p-2 pb-1">Your active apps</p>
            @foreach(auth()->user()->apps as $app)
            <div class="p-3 mb-2 border bg-opacity-10">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <i class="bi bi-check-circle text-success"></i> <strong class="">{{ $app->name }}</strong> : <small>{{ $app->url }}</small>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <a href="{{ route('list',$app->id) }}" class="btn btn-light border"> Feature Reviews</a> 
                            <a href="{{ route('survey.list', $app->id) }}" class="btn btn-light border">Surveys</a>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-light border" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('app.list') }}">Manage App</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
