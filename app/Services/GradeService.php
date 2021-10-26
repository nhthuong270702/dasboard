<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;

class GradeService
{
    //tao
    public function saveGrade(StoreGradeRequest $request){
        return Grade::create($request->validated());
    }
    //sua
    public function updateGrade(UpdateGradeRequest $request, $id){
        $grade = Grade::find($id);
        return $grade->update($request->validated());
    }
    //show/id
    public function getById($id) {
        return Grade::find($id);
    }
    //showall
    public function getAll() {
        return Grade::all();
    }
    //delete
    public function deleteById($id)
    {
        return Grade::find($id)->delete();
    }
    //count
    public function countStudentInGrade(Grade $grade) {
        return $grade->students->count();
    }
    //getAll
    public function getAllStudentInGrade(Grade $grade) {
        $result = Grade::all();
        foreach ($result as $grade) {
               $hi[] = "Grade: ".$grade->name;
            foreach($grade->students as $student) {
               $hi[]= "Id: ".$student->id;
               $hi[]= "Name Student: ".$student->name;
            }
        }
        return $hi;
    }
    //showStudentIGrade
    public function showStudentInGrade($id) {
        $grade = Grade::find($id);
        return $grade->students->all();
    }
    //deletall
    public function deleteall(Request $request) {
        $ids = $request->ids;
        Grade::whereIn('id',explode(",",$ids))->delete();
    }
    //khoi phuc cac tep da xoa
    public function restore(Request $request)
    {
        Grade::onlyTrashed()->restore();
    }
}
