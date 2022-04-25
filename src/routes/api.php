<?php

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('lecture', [LectureController::class, 'store'])->name('lecture.store');
Route::patch('lecture/{lecture_id}', [LectureController::class, 'update'])->name('lecture.update');
Route::get('lectures', [LectureController::class, 'index'])->name('lecture.index');
Route::delete('lecture/{lecture_id}', [LectureController::class, 'delete'])->name('lecture.delete');
Route::get('lecture/{lecture_id}', [LectureController::class, 'show'])->name('lecture.show');
Route::get('groups', [GroupController::class, 'index'])->name('group.index');
Route::get('group-students/{group_id}', [GroupController::class, 'showStudents']);
Route::get('group-curriculum/{group_id}', [GroupController::class, 'showCurriculum']);
Route::post('group', [GroupController::class, 'store'])->name('group.store');
Route::patch('group/{group_id}', [GroupController::class, 'update'])->name('group.update');
Route::delete('group/{group_id}', [GroupController::class, 'delete'])->name('group.delete');
Route::post('curriculum', [CurriculumController::class, 'store'])->name('curriculum.store');
Route::patch('curriculum/{curriculum_id}/{lecture_id}', [CurriculumController::class, 'update'])->name('curriculum.update');
Route::delete('curriculum/{curriculum_id}/{lecture_id}', [CurriculumController::class, 'delete'])->name('curriculum.delete');
Route::get('students', [StudentController::class, 'index'])->name('student.index');
Route::get('student/{student_id}', [StudentController::class, 'show'])->name('student.show');
