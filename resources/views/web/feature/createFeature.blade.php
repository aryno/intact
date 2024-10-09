@extends('web.layout.public')
@section('title', 'Create Feature - '.config('app.name'))
@section('main')
    <div class="row mt-5">
    @include('common.status')
        <div class="col-sm-10 col-xl-8 m-auto">
            <!-- Title -->
            <div class="mb-0 fs-1 text-center">
                <h1  class="fs-2 mt-4">{{ isset($feature) ? 'Edit Feature' : 'Create New Feature' }}</h1>
	        </div>
        <form action="{{ isset($feature) ? route('feature.updateFeature', $feature->id) : route('feature.createFeature') }}" method="POST" enctype="multipart/form-data">
            @csrf
                @if(isset($feature))
            @method('PUT')  <!-- This sets the method to PUT when editing -->
        @endif
        @if(isset($app_id))
            <input type="hidden" value="{{$app_id}}" name ='app_id'>
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
                <label for="vote_type" class="form-label">Vote Type</label>
                <select name="vote_type" id="vote_type" class="form-select" required>
                    <option value="">Select Vote Type</option>
                    <option value="Like & Dislike">Like & Dislike</option>
                    <option value="Rate 1 to 10">Rate 1 to 10</option>
                    
                </select>
            </div>
            <div class="mb-4">
                <label for="image">Image URL</label>
                <input type="file" name="image" id="image" class="form-control">
                @if(isset($feature) && $feature->image)
                    <img src="{{ asset('storage/app/public/images' . $feature->image) }}" alt="Current Image" class="img-fluid mt-2" style="max-width: 200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($feature) ? 'Update Feature' : 'Create New Feature' }}</button>
            <!-- <button type="button" class="btn btn-primary w-100" id='voteForm'>Vote</button> -->
        </form>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#voteForm').on('click', function(e) {
        e.preventDefault(); // Prevent default form submission
        const formData = {
            feature_id: 19,
            comment: 'really Amzain',
            vote_status:0,
            user_id:'',
            _token: '{{ csrf_token() }}' // CSRF token
        };

        $.ajax({
            type: 'POST',
            url: '{{ route("votes.store") }}',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert('Vote saved successfully!');
                }
            },
            error: function(xhr) {
                // Handle errors
                console.error(xhr);
                alert('An error occurred while saving the vote.');
            }
        });
    });
});
</script>
@endsection