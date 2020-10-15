<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('questions',
    'App\Http\Controllers\Api\QuestionController@index'
);

Route::post('questions',
    'App\Http\Controllers\Api\QuestionController@store'
);

Route::put('questions/{id}',
    'App\Http\Controllers\Api\QuestionController@update'
);

Route::delete('questions/{id}',
    'App\Http\Controllers\Api\QuestionController@destroy'
);

Route::get('questions/{secret}',
    'App\Http\Controllers\Api\QuestionController@show'
);

Route::post('questions/{secret}',
    'App\Http\Controllers\Api\AnswerController@store'
);

Route::get('answers',
    'App\Http\Controllers\Api\AnswerController@index'
);

Route::get('answers/statistics/pie-chart',
    'App\Http\Controllers\Api\QuestionController@showPieChart'
);

Route::get('answers/statistics/bar-chart',
    'App\Http\Controllers\Api\QuestionController@showBarChart'
);