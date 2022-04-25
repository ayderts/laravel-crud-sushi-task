<?php

namespace App\Http\Controllers;

use App\Services\GroupService;
use App\Services\LectureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
  public function __construct(GroupService $groupService)
  {
    $this->groupService = $groupService;
  }

  public function index(){
    return $this->groupService->index();
  }
    public function showCurriculum($group_id){
        $validator = Validator::make(['group_id' => $group_id], [
            'group_id' => 'required|integer',
        ],
            [
                'group_id.required' => 'Введите ID группы',
                'group_id.integer' => 'ID группы должен быть числовым',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->groupService->showCurriculum($group_id);
    }

  public function showStudents($group_id){
      $validator = Validator::make(['group_id' => $group_id], [
          'group_id' => 'required|integer',
      ],
      [
                'group_id.required' => 'Введите ID группы',
                'group_id.integer' => 'ID группы должен быть числовым',

      ]);
      if ($validator->fails()) {
          return response()->json([
              'success' => false,
              'message' => $validator->errors()->getMessages(),
          ], 422);
      }
    return $this->groupService->showStudents($group_id);
  }

  public function delete($group_id){
      $validator = Validator::make(['group_id' => $group_id], [
          'group_id' => 'required|integer|exists:student_groups,id',
      ],
          [
              'group_id.required' => 'Введите ID группы',
              'group_id.integer' => 'ID группы должен быть числовым',
              'group_id.exists' => 'Вы ввели несуществующий ID группы',

          ]);
      if ($validator->fails()) {
          return response()->json([
              'success' => false,
              'message' => $validator->errors()->getMessages(),
          ], 422);
      }
      return $this->groupService->delete($group_id);
  }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:student_groups,name',
            'curriculum_id'=>'required|integer|exists:curriculums,id'
        ],
            [
                'name.string' => 'Поле name должно быть буквенным',
                'name.required' => 'Введите поле name',
                'name.unique' => 'Поле name должно быть уникальным',
                'curriculum_id.integer' => 'Поле curriculum_id должно быть числовым',
                'curriculum_id.required' => 'Введите поле curriculum_id',
                'curriculum_id.exists' => 'Такой записи в таблице curriculums не существует',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        // return MaterialResource::make($this->materialService->store($request));
        return $this->groupService->store($request);
    }

    public function update(Request $request,$group_id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:student_groups,name',
            'curriculum_id' => 'prohibited',
        ],
            [
                'name.string' => 'Поле name должно быть буквенным',
                'name.required' => 'Введите поле name',
                'name.unique' => 'Поле name должно быть уникальным',
                'curriculum_id.prohibited' => 'Поле curriculum_id нельзя изменить',

            ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->getMessages(),
            ], 422);
        }
        return $this->groupService->update($request,$group_id);
    }
}
