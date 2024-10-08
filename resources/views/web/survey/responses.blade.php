@extends('web.layout.public')
@section('title', 'Survey Responses - '.config('app.name'))
@section('main')
<div class="container mt-5">
    <!-- Short App & Survey Info -->
    <div class="card p-3 shadow border-0 mb-3">
        <div class="card-header bg-white border-0 d-flex justify-content-between">
            <div><h5 class="d-inline"><i class="bi bi-motherboard-fill"></i> {{ $survey->app->name }}</h5>
            	&nbsp; | <span class="ms-2 small">{{ $survey->title }} | Total responses: {{ count($responses) }}</span>
            </div>
            <div>
                @if(now() > $survey->start_date && now() < $survey->end_date)
                    <span class="badge text-bg-success">Active</span>
                @else
                    <span class="badge text-bg-danger">Inactive</span>
                @endif
                <span>
                    <span class="dropdown">
                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Add New Survey</a></li>
                            <li><a class="dropdown-item" href="#">Delete Survey</a></li>
                        </ul>
                    </span>
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3 bg-light">
                Description: &nbsp;{{ $survey->description }}
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="mb-1">Start Date</label>
                    <input type="text" class="form-control" disabled value="{{ $survey->start_date }}" readonly>
                </div>
                <div class="col-md-4">
                	<label class="mb-1">End Date</label>
                    <input type="text" class="form-control" disabled value="{{ $survey->end_date }}" readonly>
                </div>
                <div class="col-md-4">
                	<label class="mb-1">Created Date</label>
                    <input type="text" class="form-control" disabled value="{{ $survey->created_at }}" readonly>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex mb-4 mt-5 justify-content-between">
    	<div>
	        <h3 class="fw-light mb-0">Survey's Responses</h3>
    	</div>
    </div>

    <!-- Responses list -->
    @if(count($responses) > 0)
        @foreach($responses as $res)
        <div class="card p-3 shadow border-0 mb-3">
            <div class="card-header bg-white border-0 d-flex justify-content-between">
                <div><h5 class="d-inline"><i class="bi bi-card-list"></i> #{{ $res->identifier ?? 'Anonymous' }}</h5></div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($survey->questions as $que)
                    <div class="col-md-4 col-sm-6 col-12 mb-3">
                        <label class="mb-1">{{ $que->question_text }}</label>
                        @switch($que->question_type)
                            @case('textbox')
                                <input type="text" class="form-control" disabled value="{{ $res->answers[$que->id] }}" readonly>
                                @break
                            @case('textarea')
                                <textarea class="form-control" disabled>{{ $res->answers[$que->id] }}</textarea>
                                @break
                            @case('radio')
                            @case('checkbox')
                                @php if(!is_array($que->question_options)){ $que->question_options = json_decode($que->question_options, true); } @endphp
                                    @foreach($que->question_options as $option)
                                    <div class="form-check">
                                        <input type="{{$que->question_type}}" class="form-check-input" {{ ($que->question_type === 'checkbox' && in_array($option, $res->answers[$que->id] ?? [])) ? 'checked' : ($option == $res->answers[$que->id] ? 'checked' : 'disabled') }}  > {{$option}}
                                    </div>
                                    @endforeach
                                @break
                        @endswitch
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="card p-3 shadow border-0 mb-3">
            <div class="card-header bg-white border-0 d-flex justify-content-between"> No responses to show</div>
        </div>
    @endif
</div>
@endsection