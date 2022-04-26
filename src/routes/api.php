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
//создать лекцию
Route::post('lecture', [LectureController::class, 'store'])->name('lecture.store');
//обновить лекцию (тема, описание)
Route::patch('lecture/{lecture_id}', [LectureController::class, 'update'])->name('lecture.update');
//Получить список всех лекций
Route::get('lectures', [LectureController::class, 'index'])->name('lecture.index');
//Удалить лекцию
Route::delete('lecture/{lecture_id}', [LectureController::class, 'delete'])->name('lecture.delete');
//получить информацию о конкретной лекции (тема, описание + какие классы прослушали лекцию + какие студенты прослушали лекцию)
Route::get('lecture/{lecture_id}', [LectureController::class, 'show'])->name('lecture.show');
//получить список всех классов
Route::get('groups', [GroupController::class, 'index'])->name('group.index');
//получить информацию о конкретном классе (название + студенты класса)
Route::get('group-students/{group_id}', [GroupController::class, 'showStudents']);
//получить учебный план (список лекций) для конкретного класса
Route::get('group-curriculum/{group_id}', [GroupController::class, 'showCurriculum']);
//Создать класс
Route::post('group', [GroupController::class, 'store'])->name('group.store');
//Обновить класс( можно менять план, название класса)
Route::patch('group/{group_id}', [GroupController::class, 'update'])->name('group.update');
//Удалить класс
Route::delete('group/{group_id}', [GroupController::class, 'delete'])->name('group.delete');
//создать cвязку учебного плана и лекция(связка таблиц curriculums и lectures, отношение многие ко многим)
Route::post('curriculum', [CurriculumController::class, 'store'])->name('curriculum.store');
//Обновить cвязку учебного плана и лекция(связка таблиц curriculums и lectures, отношение многие ко многим)
Route::patch('curriculum/{curriculum_id}/{lecture_id}', [CurriculumController::class, 'update'])->name('curriculum.update');
//Удалить cвязку учебного плана и лекция(связка таблиц curriculums и lectures, отношение многие ко многим)
Route::delete('curriculum/{curriculum_id}/{lecture_id}', [CurriculumController::class, 'delete'])->name('curriculum.delete');
//создать учеьный план
Route::post('curriculum/create', [CurriculumController::class, 'storeCurriculum'])->name('curriculum.storeCurriculum');
//удалить учебный план
Route::post('curriculum/delete/{curriculum_id}', [CurriculumController::class, 'deleteCurriculum'])->name('curriculum.storeCurriculum');
//Обновить учебный план
Route::post('curriculum/update/{curriculum_id}', [CurriculumController::class, 'updateCurriculum'])->name('curriculum.updateCurriculum');
//получить список всех студентов
Route::get('students', [StudentController::class, 'index'])->name('student.index');
//получить информацию о конкретном студенте (имя, email + класс + прослушанные лекции)
Route::get('student/{student_id}', [StudentController::class, 'show'])->name('student.show');
//создать студента
Route::post('student', [StudentController::class, 'store'])->name('student.store');
//обновить студента (имя, принадлежность к классу)
Route::patch('student/{student_id}', [StudentController::class, 'update'])->name('student.update');
//удалить студента
Route::delete('student/{student_id}', [StudentController::class, 'delete'])->name('student.delete');
