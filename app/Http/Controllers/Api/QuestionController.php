<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Str;

/**
 * Class QuestionController
 * @package App\Http\Controllers\Api
 */
class QuestionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::get()->toJson(JSON_PRETTY_PRINT);
        return response($questions, 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Question::where('secret', $id)->exists()) {
            $question = Question::where('secret', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($question, 200);
        } else {
            return response()->json([
                "message" => "Question not found"
            ], 404);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $question = new Question;
        $question->name = is_null($request->name) ? 'empty' : $request->name;
        do {
            $secret = Str::random(1);
        } while (Question::where("secret", "=", $secret)->first());
        $question->secret = $secret;

        $question->save();

        return response()->json([
            "message" => "Question record created"
        ], 201);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        if (Question::where('id', $id)->exists()) {
            $question = Question::find($id);

            $question->name = is_null($request->name) ? $question->name : $request->name;
            $question->save();

            return response()->json([
                "message" => "Records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Question not found"
            ], 404);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if(Question::where('id', $id)->exists()) {
            $question = Question::find($id);
            $question->delete();

            return response()->json([
                "message" => "Records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Question not found"
            ], 404);
        }
    }
}
