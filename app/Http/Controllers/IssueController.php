<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Student;
use App\Book;
use App\IssueList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $i = 1;
        $issues = Issue::all();
        foreach ($issues as $issue) {
            $date = $issue->till_date;
            $till_date = Carbon::createFromFormat('Y-m-d', $date);
            $today_date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
            $result = $till_date->lte($today_date);
            $issue ->isExpired = $result;
        }
        return view('backend.pages.issue.index', compact('issues','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::whereStatus(1)->get();
        $books = Book::whereStatus(1)->get();
        return view('backend.pages.issue.create', compact('students','books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputFields = $request->validate([
            'student_id' => 'required',
            'till_date' => 'required',
            'book_id' => 'required'
        ],
        [
            'student_id.required' => 'The student field is required',
            'book_id.required' => 'The book field is required'
        ]);
        $issue = new Issue();
        $issue->student_id = $inputFields['student_id'];
        $issue->till_date = $inputFields['till_date'];
        $issue->save();

        $issue_id = $issue->id;
        $bookList = $inputFields['book_id'];
        for ($i=0; $i < count($bookList); $i++) {
            $issueList = new IssueList();
            $issueList->issue_id = $issue_id;
            $issueList->book_id = $bookList[$i];

            $issueList->save();
        }
        return redirect('issue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }

    public function completeStatus(Request $request, $id) {
        $status = Issue::find($id);
        $status->status = 'Completed';
        $status->save();
        return redirect('issue');
    }

    public function filter(Request $request) {
        $from = $request->from;
        $to = $request->to;
        $i = 1;
        $issues = Issue::whereDate('created_at','>=',$from)
                            ->whereDate('created_at','<=',$to)
                            ->get();

        return view('backend.pages.issue.index', compact('issues', 'i'));
    }
}
