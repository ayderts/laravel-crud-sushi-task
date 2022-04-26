<?php

namespace App\Services;

use App\Models\Curriculum;
use App\Models\CurriculumLecture;

class CurriculumService
{
    public function store($request)
    {
        if(CurriculumLecture::where('curriculum_id',$request->curriculum_id)->where('queue',$request->queue)->exists()){
            return response()->json([
                'success' => false,
                'message' => 'Такая очередность в плане уже имеется'
            ]);
    }
        return response()->json(CurriculumLecture::query()->create($request->all()));
    }
    public function update($request,$curriculum_id,$lecture_id)
    {
        if(CurriculumLecture::where('curriculum_id',$curriculum_id)->where('queue',$request->queue)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Такая очередность в плане уже имеется'
            ]);
        }
        $curriculum = CurriculumLecture::where('lecture_id', $lecture_id)->where('curriculum_id',$curriculum_id)->firstOrFail();

        if ($curriculum->update($request->all())) {
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

    public function delete($curriculum_id,$lecture_id){
        $curriculum=CurriculumLecture::where('lecture_id', $lecture_id)->where('curriculum_id',$curriculum_id)->firstOrFail();
        if ($curriculum->delete()) {
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
    public function storeCurriculum($request)
    {
        return response()->json(Curriculum::query()->create($request->all()));
    }

    public function updateCurriculum($request,int $curriculum_id)
    {
        $curriculum = Curriculum::where('id', $curriculum_id)->firstOrFail();

        if ($curriculum->update($request->all())) {
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
    public function deleteCurriculum($curriculum_id){
        $curriculum=Curriculum::where('id', $curriculum_id)->firstOrFail();
        if ($curriculum->delete()) {
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
