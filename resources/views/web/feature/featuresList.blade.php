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
                        <span><i class="bi bi-hand-thumbs-up" id='voteForm' data-feature></i></span>
                    </div>
                </div>
                @endforeach
@endif
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#voteForm').on('click', function(e) {
        e.preventDefault(); // Prevent default form submission
        const formData = {
            feature_id: 2,
            comment: 'Testing Voting',
            vote_status:1,
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
