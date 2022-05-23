<?php

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\OrderController;
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
/*
        ПРИМЕЧАНИЕ: при тестировании АПИ использовать
        Content-Type: application/json
        Accept: application/json
*/
//Создать заказ
Route::post('order', [OrderController::class, 'store'])->name('order.store');
//Просмотреть заказ
Route::get('order/{order_id}', [OrderController::class, 'show'])->name('order.show');
//Обновить заказ
Route::patch('order/{order_id}', [OrderController::class, 'update'])->name('order.update');
//Удалить заказ
Route::delete('order/{order_id}', [OrderController::class, 'delete'])->name('order.delete');
//Просмотр всех заказов
Route::get('orders', [OrderController::class, 'index'])->name('order.index');


