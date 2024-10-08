<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Question;
use App\Models\Response;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function create($id)
    {
        $app = App::findOrFail($id);
        return view('web.survey.form', compact('app'));
    }

    public function save(Request $request)
    {
        $survey = Survey::create([
            'app_id' => $request->app_id,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate
        ]);

        $questionData = [];
        if(is_array($request->questions)) {
            foreach ($request->questions as $question) {
                $questionData[] = [
                    'survey_id' => $survey->id,
                    'question_text' => $question['text'],
                    'question_type' => $question['type'],
                    'question_options' => !empty($question['options']) ? json_encode($question['options']) : null
                ];
            }
            Question::insert($questionData);
        }
        return redirect()->route('survey.list', $request->app_id)->with('success', 'Survey created successfully!');
    }

    public function list($id)
    {
        $app = $app = App::with(['surveys' => function($query) {
            $query->orderBy('id', 'desc');
        }])->findOrFail($id);
        return view('web.survey.list', compact('app'));
    }

    public function showResponses($id)
    {
        // $responses = Response::with(['survey.questions'])->where('survey_id', $id)->get();
        $responses = Response::where('survey_id', $id)->get();
        $survey = Survey::with(['questions','app'])->findOrFail($id);
        return view('web.survey.responses', compact('responses', 'survey'));
    }

    public function saveResponse(Request $request)
    {
        Response::create([
            'identifier' => $request->identifier ?? null,
            'survey_id' => $request->survey_id,
            'answers' => json_encode($request->answers)
        ]);

        return back()->with('success', 'Response Saved Successfully!');
    }
}
