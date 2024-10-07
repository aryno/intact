@extends('web.layout.public')
@section('title', 'Create Feature - '.config('app.name'))
@section('main')
    <div class="row mt-5">
        <div class="col-sm-10 col-xl-8 m-auto">
            <!-- Title -->
            <div class="mb-0 fs-1 text-center">
                <h1  class="fs-2 mt-4">{{ isset($feature) ? 'Edit Feature' : 'Create New Feature' }}</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
	        </div>
        <form action="{{ isset($feature) ? route('auth.updateFeature', $feature->id) : route('auth.createFeature') }}" method="POST" enctype="multipart/form-data">
            @csrf
                @if(isset($feature))
            @method('PUT')  <!-- This sets the method to PUT when editing -->
        @endif

            <div class="mb-4">
                    <label for="fortitle" class="form-label">Title *</label>
                    <div class="input-group input-group-lg border">
                        <input name="title" type="text" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Title" id="fortitle" value="{{ old('title', $feature->title ?? '') }}">
                    </div>
                </div>
            <div class="mb-4">
                <label for="forDescription" class="form-label">Description *</label>
                <div class="input-group input-group-lg border">
                    <input name="description" type="text" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Description" id="forDescription" value="{{ old('description', $feature->description ?? '') }}">
                </div>
            </div>
            <div class="mb-4">
                <label for="image">Image URL</label>
                <input type="file" name="image" id="image" class="form-control">
                @if(isset($feature) && $feature->image)
                    <img src="{{ asset('storage/app/public/images' . $feature->image) }}" alt="Current Image" class="img-fluid mt-2" style="max-width: 200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Create Feature</button>
        </form>

    </div>
    </div>

@endsection