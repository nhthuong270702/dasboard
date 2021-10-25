<?php

namespace App\Http\Controllers\API;

use App\Services\GradeService;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use Illuminate\Support\Facades\View;

class GradeController extends Controller
{
    /**
     * @var GradeService
     */
    protected $grade;

    /**
     * gradeController Constructor
     *
     * @param GradeService $gradeService
     *
     */
    public function __construct(GradeService $grade)
    {
        $this->grade = $grade;

    }
    //index
    public function index()
    {
        $grades = $this->grade->getAll();
        return View::make('pages.grade.list', compact('grades'));
    }

    //lay theo id
    public function show($id)
    {
        $grade = $this->grade->getById($id);
        return View::make('grade.edit', compact('grade'));
    }
    //hiao dien chinh sua
    public function create()
    {
        return view('pages.grade.add');
    }
    //luu lop
        public function store(StoreGradeRequest $request)
        {
            $this->grade->saveGrade($request);
            return redirect()->route('grade.list');
        }
    public function edit($id)
    {
        $grade = $this->grade->getById($id);
        return View::make('pages.grade.update', compact('grade', 'id'));
    }
    //cap nhat lop
    public function update(UpdateGradeRequest $request, $id)
    {
        $this->grade->updateGrade($request, $id);
        return redirect()->route('grade.list');
    }
    //xoa lop
    public function destroy($id)
    {
        $this->grade->deleteById($id);
        return redirect()->route('grade.list');
    }
    //xoa tat ca
    public function deleteall(Request $request)
    {
        $this->grade->deleteall($request);
        return redirect('/grade/create');
    }

    //khoi phuc cac tep da xoa
    public function restore(Request $request)
    {
        $this->grade->restore($request);
         return redirect()->route('grade.list');
    }


    //dem so hoc sinh trong lop
    public function countStudentInGrade(Grade $grade)
    {
        $grade = $this->grade->getById($grade);
        return View::make('grade.edit', compact('grade'));
    }

    //lay tat ca hoc sinh trong lop
    public function allClassStudent(Grade $grade)
    {
        $all = $this->grade->getAllStudentInGrade($grade);
        return View::make('pages.grade.all', compact('all'));

    }
    //show hoc sinh trong lop
    public function showStudentInGrade($id)
    {
        $students = $this->grade->showStudentInGrade($id);
        return View::make('pages.grade.student', compact('students'));
    }
}
