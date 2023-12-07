<?php

namespace App\Http\Controllers;

use App\IssueList;
use Illuminate\Http\Request;

class IssueListController extends Controller
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
    
    public function index($id)
    {
        $issueLists = IssueList::where('issue_id', $id)->get();
        // return $issueLists;
        return view('backend.pages.issue.view', compact('issueLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IssueList  $issueList
     * @return \Illuminate\Http\Response
     */
    public function show(IssueList $issueList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IssueList  $issueList
     * @return \Illuminate\Http\Response
     */
    public function edit(IssueList $issueList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IssueList  $issueList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IssueList $issueList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IssueList  $issueList
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssueList $issueList)
    {
        //
    }

    // public function view($id)
    // {
    //     $issueLists = IssueList::where('issue_id', $id)->get();
    //     with('book')->
    //     return response()->json(['data'=>$issueLists]);
    // }
    public function view($id)
    {
        $issueLists = IssueList::where('issue_id', $id)->get();
        
        $data = $issueLists->map(function ($issueList) {
            return [
                // 'book_id' => $issueList->book->id,
                'book_name' => $issueList->book->name
            ];
        });

        return response()->json(['data' => $data]);
    }

}
