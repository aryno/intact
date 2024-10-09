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
    		<a href="{{ route('app.create') }}" class="btn btn-primary float-end">+ Add an App</a>
    	</div>
    </div>
    @foreach($apps as $key => $app)
    <div class="card p-3 shadow border-0 mb-3">
        <div class="card-header bg-white border-0 d-flex justify-content-between">
            <div><h5 class="d-inline"><i class="bi bi-motherboard-fill"></i> {{ $app->name }}</h5>
            	&nbsp; | <span class="ms-2 small">{{  $app->url }} | Hits: {{ $app->hits_count }}</span>
            </div>
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
            <div class="mb-3 bg-light">
                Description:
                <pre>{{ $app->description }}</pre>
            </div>

            <div class="mb-3">

                <label for="script" class="mb-1">Copy this code:</label>
            	<textarea class="form-control bg-primary bg-opacity-10" readonly>{{
                    '<div id="app_intact" data-identifier=""></div> <script id="script_intact" src="'.route('app.script', $app->client_id).'"></script>'
                }}</textarea>

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

        </div>
    <div class="card-body">
        <div class="card-header bg-white border-0 d-flex justify-content-between">
            <div><h5 class="d-inline"><i class="bi bi-app-indicator"></i> App Features</h5>
            </div>
            <div>
                <a href="{{ route('feature',$app->id) }}" class="btn btn-primary float-end">+ Add Feature</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope='col'>Image</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
                </tr>
            </thead> 
            <tbody>
            @if($app->features->isEmpty())
            <tr>
                <td colspan="5">No features available</td>
            </tr>
            @else
                @foreach($app->features as $feature)
                <tr>
                    <th scope="row">{{ $feature->id }}</th>
                    <td><a href="{{ route('getFeatures',$feature->id) }}"> {{ $feature->title }}</a></td>
                    <td>{{ $feature->description }}</td>
                    @if($feature->image) 
                    <td>
                        <img src="{{ url('storage/' . $feature->image) }}" alt="{{ $feature->title }}" class="img-fluid" style="width: 100Px;height: 50px">
                    </td>
                    @else
                    <td>--</td>
                    @endif
                    <td><span class="badge {{ $feature->status == 'active' ? 'text-bg-success' : 'text-bg-danger' }}">Active</span></td>
                    <td><a href="{{ route('deleteFeature',$feature->id) }}"><i class="bi bi-trash text-danger"></i></a></td>
                    
                </tr>
                @endforeach
            @endif
            </tbody>
            </table>
    </div>
    </div>
    @endforeach
</div>
@endsection
