<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentService
{
      //tao
      public function saveStudent(StoreStudentRequest $request){
        return Student::create($request->validated());
    }
    //sua
    public function updateStudent(UpdateStudentRequest $request,$id){
        $student = Student::find($id);
        return $student->update($request->validated());
    }
    //show/id
    public function getById($id) {
        return Student::find($id);
    }
    //showall
    public function getAll() {
        return Student::all();
    }
    //delete
    public function deleteById($id)
    {
        return Student::find($id)->delete();
    }
    //deleteall
    public function deleteall(Request $request)
    {
        $ids = $request->ids;
        Student::whereIn('id', $ids)->delete();
    }
    //count
    public function countStudent(Student $student) {
        return $student->count();
    }
    //khoi phuc cac tep da xoa
    public function restore(Request $request)
    {
        Student::onlyTrashed()->restore();
    }
}
