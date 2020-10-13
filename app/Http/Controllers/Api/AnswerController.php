<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

/**
 * Class AnswerController
 * @package App\Http\Controllers\Api
 */
class AnswerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::get()->toJson(JSON_PRETTY_PRINT);
        return response($answers, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $id)
    {
        $answer = new Answer;
        $question = Question::where('secret', $id)->get()->first();
        $answer->question_id = $question->question_id;
        $answer->answer_text = is_null($request->answer_text) ? 'empty' : $request->answer_text;

        $answer->save();

        return response()->json([
            "message" => "Answer record created"
        ], 201);
    }
}
