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

    public function show($student_id){
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
}
