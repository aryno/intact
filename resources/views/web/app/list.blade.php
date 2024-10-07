@extends('web.layout.public')
@section('title', 'All your apps - '.config('app.name'))
@section('main')
<div class="container mt-5">
    @include('common.status')
    <div class="d-flex mb-4 justify-content-between">
    	<div>
	        <h3 class="fw-light mb-0">All your apps</h3>
	        <p>You can browse or manage your apps here</p>
    	</div>
    	<div class="">
    		<a href="{{ route('app.create') }}" class="btn btn-primary float-end">+ Create App</a>
    	</div>
    </div>
    @foreach($apps as $key => $app)
    <div class="card p-3 shadow border-0 mb-3">
        <div class="card-header bg-white border-0 d-flex justify-content-between">
            <h5><i class="bi bi-motherboard-fill"></i> {{ $app->name }}</h5>
            <div>
                <span class="badge {{ $app->is_active == 1 ? 'text-bg-success' : 'text-bg-danger' }}">Active</span>
                <span>
                    <span class="dropdown">
                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </span>
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                {{ $app->description }}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="mb-1" for="client_id">Client ID</label>
                    <input type="text" class="form-control" name="client_id" value="{{ $app->client_id }}" readonly>
                </div>
                <div class="col-md-6">
                	<label class="mb-1" for="client_secret">Client Secret</label>
                    <input type="text" class="form-control" name="client_secret" value="{{ $app->client_secret }}" readonly>
                </div>
            </div>
            <table class="table d-none">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">URL</th>
                        <th>Status</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $app->name }}</td>
                        <td>{{ $app->url }}</td>
                        <td>
                            <span class="badge {{ $app->is_active == 1 ? 'text-bg-success' : 'text-bg-danger' }}">Active</span>
                        </td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>
@endsection
