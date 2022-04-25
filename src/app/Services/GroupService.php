<?php

namespace App\Services;


use App\Models\Group;
use App\Models\Lecture;

class GroupService
{
  public function index(){
    return response()->json(Group::all());
  }
  public function showStudents($group_id){
    return response()->json(Group::with('students')->find($group_id));
  }

    public function showCurriculum($group_id){
        return response()->json(Group::with('curriculum')->find($group_id));
    }

    public function delete($group_id){
        $lecture=Group::where('id',$group_id);
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

    public function store($request)
    {
        return response()->json(Group::query()->create($request->all()));
    }

    public function update($request,$group_id)
    {
        $lecture = Group::where('id', $group_id)->firstOrFail();
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
}
