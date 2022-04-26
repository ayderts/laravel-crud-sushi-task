<?php

namespace App\Http\Controllers;

use App\Services\CurriculumService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurriculumController extends Controller
{
    public function __construct(CurriculumService $curriculumService)
    {
        $this->curriculumService = $curriculumService;
    }


    public function delete(int $curriculum_id,int $lecture_id){
        $validator = Validator::make(['curriculum_id' => $curriculum_id, 'lecture_id'=>$lecture_id], [
            'curriculum_id' => 'required|integer|exists:curriculum_lectures,curriculum_id',
            'lecture_id' => 'required|integer|exists:curriculum_lectures,lecture_id',
        ],
            [
                'curriculum_id.required' => 'Введите ID плана',
                'curriculum_id.integer' => 'ID плана должен быть числовым',
                'curriculum_id.exists' => 'Вы ввели несуществующий ID плана',
                'lecture_id.required' => 'Введите ID лекции',
                'lecture_id.integer' => 'ID лекции должен быть числовым',
                'lecture_id.exists' => 'Вы ввели несуществующий ID лекции',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->curriculumService->delete($curriculum_id,$lecture_id);
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'curriculum_id'=>'required|integer|exists:curriculums,id',
            'lecture_id'=>'required|integer|exists:lectures,id',
            'queue'=>'required|integer'
        ],
            [
                'curriculum_id.integer' => 'Поле curriculum_id должно быть числовым',
                'curriculum_id.required' => 'Введите поле curriculum_id',
                'curriculum_id.exists' => 'Такой записи в таблице curriculums не существует',
                'lecture_id.integer' => 'Поле lecture_id должно быть числовым',
                'lecture_id.required' => 'Введите поле lecture_id',
                'lecture_id.exists' => 'Такой записи в таблице lecture_id не существует',
                'queue.integer' => 'Поле queue должно быть числовым',
                'queue.required' => 'Введите поле queue',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        // return MaterialResource::make($this->materialService->store($request));
        return $this->curriculumService->store($request);
    }

    public function update(Request $request,int $curriculum_id,int $lecture_id){
        $validator = Validator::make($request->all(), [
            'curriculum_id'=>'integer|exists:curriculums,id',
            'lecture_id'=>'integer|exists:lectures,id',
            'queue'=>'integer'
        ],
            [
                'curriculum_id.integer' => 'Поле curriculum_id должно быть числовым',
                'curriculum_id.exists' => 'Такой записи в таблице curriculums не существует',
                'lecture_id.integer' => 'Поле lecture_id должно быть числовым',
                'lecture_id.exists' => 'Такой записи в таблице lecture_id не существует',
                'queue.integer' => 'Поле queue должно быть числовым',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->curriculumService->update($request,$curriculum_id,$lecture_id);
    }
    public function storeCurriculum(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:curriculums,name',
        ],
            [
                'name.string' => 'Поле name должно быть буквенным',
                'name.required' => 'Введите поле name',
                'name.unique' => 'Такой план уже имеется',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->curriculumService->storeCurriculum($request);
    }

    public function updateCurriculum(Request $request,int $curriculum_id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:curriculums,name',
        ],
            [
                'name.string' => 'Поле name должно быть буквенным',
                'name.required' => 'Введите поле name',
                'name.unique' => 'Такой план уже имеется',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->curriculumService->updateCurriculum($request,$curriculum_id);
    }
    public function deleteCurriculum(int $curriculum_id){
        $validator = Validator::make(['curriculum_id'=>$curriculum_id ],[
            'curriculum_id' => 'required|integer|exists:curriculums,id'
        ],
            [
                'curriculum_id.required' => 'Введите ID плана',
                'curriculum_id.integer' => 'ID плана должен быть числовым',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->curriculumService->deleteCurriculum($curriculum_id);
    }
}
