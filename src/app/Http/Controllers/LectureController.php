<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Services\LectureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function response;


class LectureController extends Controller
{
    public function __construct(LectureService $lectureService)
    {
        $this->lectureService = $lectureService;
    }

    public function index(){
        return $this->lectureService->index();
    }
    public function show($lecture_id){
        $validator = Validator::make(['lecture_id' => $lecture_id], [
            'lecture_id' => 'required|integer|exists:lectures,id',
        ],
            [
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
      return $this->lectureService->show($lecture_id);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string|unique:lectures,topic',
            'description' => 'required|string',
        ],
        [
            'topic.string' => 'Поле topic должно быть буквенным',
            'topic.required' => 'Введите поле topic',
            'description.string' => 'Поле description должно быть буквенным',
            'description.required' => 'Введите поле description',
            'topic.unique' => 'Поле topic должно быть уникальным'

        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
       // return MaterialResource::make($this->materialService->store($request));
        return $this->lectureService->store($request);
    }

    public function update(Request $request,$lecture_id){
        $validator = Validator::make($request->all(), [
            'topic' => 'string|unique:lectures,topic',
            'description' => 'required|string',
        ],
            [
                'topic.string' => 'Поле topic должно быть буквенным',
                'description.string' => 'Поле description должно быть буквенным',
                'description.required' => 'Введите поле description',
                'topic.unique' => 'Поле topic должно быть уникальным'

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->lectureService->update($request,$lecture_id);
    }
    public function delete($lecture_id){
        $validator = Validator::make(['lecture_id' => $lecture_id], [
            'lecture_id' => 'required|integer|exists:lectures,id',
        ],
            [
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
        return $this->lectureService->delete($lecture_id);
    }
}
