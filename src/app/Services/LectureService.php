<?php

namespace App\Services;

use App\Models\Lecture;
use Mockery\Exception;

class LectureService
{

    public function show($lecture_id){
      return response()->json(Lecture::with('curriculums.groups.students')->find($lecture_id));
    }
    public function store($request)
    {
        return response()->json(Lecture::query()->create($request->all()));
    }
    public function update($request,$lecture_id)
    {
        $lecture = Lecture::where('id', $lecture_id)->firstOrFail();
        if ($lecture->update($request->all())) {
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

    public function index(){

        return response()->json(Lecture::all());
    }

    public function delete($lecture_id){
        $lecture=Lecture::where('id',$lecture_id);
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
