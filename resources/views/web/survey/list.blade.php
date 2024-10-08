@extends('web.layout.public')
@section('title', 'Survey List - '.config('app.name'))
@section('main')
<div class="container mt-5">
    <div class="d-flex mb-4 justify-content-between">
    	<div>
	        <h3 class="fw-light mb-0">All your Surveys</h3>
	        <p>You can browse or manage your surveys here</p>
    	</div>
    </div>
    <div class="card p-3 shadow border-0 mb-3">
        <div class="card-body">
            <div class="card-header bg-white border-0 d-flex justify-content-between">
                <div><h5 class="d-inline"><i class="bi bi-app-indicator"></i> {{ $app->name}} Survey's list</h5>
                </div>
                <div>
                    <a href="{{ route('survey.create', $app->id) }}" class="btn btn-primary float-end">+ Add Survey</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col" width="100">StartDate</th>
                    <th scope="col" width="100">EndDate</th>
                    <th scope="col" width="180">Created Date</th>
                    <th scope="col" width="50">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if($app->surveys->isEmpty())
                <tr>
                    <th colspan="7" class="text-center">No survey available</th>
                </tr>
                @else
                    @foreach($app->surveys as $key => $survey)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td><a href="{{ route('survey.showResponses', $survey->id) }}"> {{ ucfirst($survey->title) }}</a></td>
                        <td>{{ ucfirst($survey->description) }}</td>
                        <td>
                            @if(now() > $survey->start_date && now() < $survey->end_date)
                                <span class="badge text-bg-success">Active</span>
                            @else
                                <span class="badge text-bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $survey->start_date }}</td>
                        <td>{{ $survey->end_date }}</td>
                        <td>{{ $survey->created_at }}</td>
                        <td>
                            @if(now() > $survey->start_date && now() < $survey->end_date)
                                <i class="bi bi-trash text-danger"></i>
                            @else
                                <i class="bi bi-pen text-success"></i>&nbsp;&nbsp;<i class="bi bi-trash text-danger"></i>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection