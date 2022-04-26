<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(){
        return $this->studentService->index();
    }

    public function show(int $student_id){
        $validator = Validator::make(['student_id' => $student_id], [
            'student_id' => 'required|integer|exists:students,id',
        ],
            [
                'student_id.required' => 'Введите ID студента',
                'student_id.integer' => 'ID студента должен быть числовым',
                'student_id.exists' => 'Такого студента не существует',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->studentService->show($student_id);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email'=>'required|email:rfc,dns|unique:students,email',
            'group_id'=>'required|integer|exists:student_groups,id'
        ],
            [
                'name.string' => 'Поле name должно быть буквенным',
                'name.required' => 'Введите поле name',
                'email.unique' => 'Поле email должно быть уникальным',
                'email.required' => 'Введите поле email',
                'email.email' => 'Введите email в правильном формате',
                'group_id.integer' => 'Поле group_id должно быть числовым',
                'group_id.required' => 'Введите поле group_id',
                'group_id.exists' => 'Такой записи в таблице curriculums не group_id',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        // return MaterialResource::make($this->materialService->store($request));
        return $this->studentService->store($request);
    }

    public function update(Request $request, int $student_id){
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'email'=>'email:rfc,dns|unique:students,email',
            'group_id'=>'integer|exists:student_groups,id'
        ],
            [
                'name.string' => 'Поле name должно быть буквенным',
                'email.unique' => 'Поле email должно быть уникальным',
                'email.email' => 'Введите email в правильном формате',
                'group_id.integer' => 'Поле group_id должно быть числовым',
                'group_id.exists' => 'Такой записи в таблице curriculums не group_id',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->studentService->update($request,$student_id);
    }
    public function delete(int $student_id){
        $validator = Validator::make(['student_id' => $student_id], [
            'student_id' => 'required|integer|exists:students,id',
        ],
            [
                'student_id.required' => 'Введите ID группы',
                'student_id.integer' => 'ID группы должен быть числовым',
                'student_id.exists' => 'Вы ввели несуществующий ID группы',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->studentService->delete($student_id);
    }
}
