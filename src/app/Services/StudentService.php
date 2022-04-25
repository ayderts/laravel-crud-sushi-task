<?php

namespace App\Services;

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
}

