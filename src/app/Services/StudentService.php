<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Student;

class StudentService
{
    public function index(){
        return response()->json(Student::all());
    }

    public function show($student_id){
        return response()->json(Student::with('group.curriculum.lectures:id,topic')->with('group.curriculum:id,name')
            ->with('group:id,name,curriculum_id')
            ->find($student_id)->only('name','group'));
    }

    public function store($request)
    {
        return response()->json(Student::query()->create($request->all()));
    }

    public function update($request,$student_id)
    {
        $student = Student::where('id', $student_id)->firstOrFail();
        if ($student->update($request->all())) {
            return response()->json([
                'success' => true,
                'message' => 'Данные успешно сохранены'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Что-то пошло не так'
        ]);
    }
    public function delete($student_id){
        $lecture=Student::where('id',$student_id);
        if ($lecture->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Данные успешно удалены'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Что-то пошло не так'
        ]);
    }
}

