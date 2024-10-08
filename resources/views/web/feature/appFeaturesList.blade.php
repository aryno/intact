@extends('web.layout.public')
@section('title', 'App Feature List - '.config('app.name'))
@section('main')
<div class="container mt-5">
@if($features->isEmpty())
            @else
                @foreach($features as $feature)
                <div class="card p-3 shadow border-0 mb-3">
                    <div class="card-header bg-white border-0 d-flex justify-content-between">
                        <div><h5 class="d-inline"><i class="bi bi-motherboard-fill"></i> {{ $feature->title }}</h5>
                        &nbsp; | <span class="ms-2 small">{{  $feature->description }} 
                        @if($feature->vote_type !='Rate 1 to 10')
                        | Likes: {{ $feature->likes_count }} | Dislikes: {{ $feature->dislikes_count }}
                        @endif
                            
                        </span>
                        </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Identifier</th>
                            <th scope="col">comment</th>
                            <th scope="col">Vote Type</th>
                            <th scope="col">Vote Status</th>
                            </tr>
                        </thead>
                        @if($feature->votes->isEmpty())
                        <tr>
                            <td colspan="5">No features available</td>
                        </tr>
                        @else
                            @foreach($feature->votes as $vote)
                            <tr>
                                <th scope="row">{{ $vote->id }}</th>
                                <td>{{ $vote->user_id  ==''? '--': $vote->user_id }}</td>
                                <td>{{ $vote->comment }}</td>
                                <td>{{ $feature->vote_type }}</td>
                                @if($feature->vote_type !='Rate 1 to 10')
                                    <td>{{ $vote->vote_status == '1' ? 'Like' : 'Dislike' }}</td>
                                @else
                                    <td>{{ $vote->vote_status}}</td>
                                @endif
                            </tr>
                            @endforeach
                        @endif 
                        <tbody>
                        </table>
                    </div>
                </div>
                @endforeach
@endif
</div>
@endsection
