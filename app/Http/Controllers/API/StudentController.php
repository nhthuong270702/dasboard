<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
   /**
     * @var StudentService
     */
    protected $student;

    /**
     * StudentController Constructor
     *
     * @param StudentService $StudentService
     *
     */
    public function __construct(StudentService $student)
    {
        $this->student = $student;
    }
    //index
    public function index()
    {
        $students = $this->student->getAll();
        return View::make('pages.student.list', compact('students'));
    }

    //lay theo id
    public function show($id)
    {
        $student = $this->student->getById($id);
        return View::make('pages.student.edit', compact('student'));
    }
    //tao student
    public function create()
    {
        return view('pages.student.add');
    }
    //luu lop
    public function store(StoreStudentRequest $request)
    {
        $this->student->saveStudent($request);
        return redirect()->route('student.list');
    }
    public function edit($id)
    {
        $student = $this->student->getById($id);
        return View::make('pages.student.update', compact('student', 'id'));
    }
    //cap nhat lop
    public function update(UpdateStudentRequest $request, $id)
    {
        $this->student->updateStudent($request, $id);
        return redirect()->route('student.list');
    }
    //xoa lop
    public function destroy($id)
    {
        $this->student->deleteById($id);
        return redirect()->route('student.list');
    }
    //xoa nhieu
    public function deleteall(Request $request)
    {
        $this->student->deleteall($request);
        return response()->json(['success'=>'thanh cong']);
    }
    //dem so hoc sinh trong lop
    public function countStudent(Student $student)
    {
        $hi = $this->student->countStudent($student);
        return View::make('student.index', compact('hi'));
    }
    //khoi phuc cac tep da xoa
    public function restore(Request $request)
    {
        $this->student->restore($request);
        return redirect()->route('student.list');
    }
}
