@extends('web.layout.public')
@section('title', 'Feature List - '.config('app.name'))
@section('main')
<div class="container mt-5">
@if($features->isEmpty())
            @else
                @foreach($features as $feature)
                <div class="card p-3 shadow border-0 mb-3">
                    <div class="card-header bg-white border-0 d-flex justify-content-between">
                        <div><h5 class="d-inline"><i class="bi bi-motherboard-fill"></i> {{ $feature->title }}</h5>
                        </div>
                        <div>
                            <span class="badge {{ $feature->status == 'active' ? 'text-bg-success' : 'text-bg-danger' }}">Active</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 bg-light">
                            Description:
                            <pre>{{ $feature->description }}</pre>
                        </div>

                    </div>
                </div>
                @endforeach
@endif
</div>
@endsection