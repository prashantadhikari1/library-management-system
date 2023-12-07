<?php

namespace App\Http\Controllers;

use App\Issue;
use App\IssueList;
use App\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $i = 1;
        $issuelists = IssueList::all();
        $students = Student::whereStatus(1)->get();
        return view('backend.pages.report.index', compact('issuelists','students','i'));
    }

    public function studFilter(Request $request) {
        $input = $request->validate(['student_id'=>'required']);
        $student_id = $input['student_id'];
        $issue_id = Issue::where('student_id', $student_id)->pluck('id');
        $issuelists = IssueList::whereIn('issue_id', $issue_id)->get();
        $i = 1;
        $students = Student::whereStatus(1)->get();
        return view('backend.pages.report.index', compact('issuelists','students','i','student_id'));
    }
}
