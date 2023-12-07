<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use PhpParser\Node\Expr\FuncCall;

class FacultyController extends Controller
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
        $faculties = Faculty::all();
        return view('backend.pages.faculty.index', compact('i','faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.faculty.create');
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
            'name' => 'required',
            'year' => 'required',
            'status' => 'required'
        ]);
        Faculty::create($inputFields);
        // $inputFields->save();
        return redirect('/faculty');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty=Faculty::find($id);
        return view('backend.pages.faculty.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Faculty $id)
    {
        $inputFields = $request->validate([
            'name' => 'required',
            'year' => 'required'
        ]);
        // $faculty = Faculty::find($id);
        $id->update($inputFields);
        return redirect('faculty');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $id)
    {
        $id->delete();
        return redirect('faculty');
    }

    public function inactive(Request $request, $id) {
        $status = Faculty::find($id);
        $status->status = '0';
        $status->save();
        return redirect('faculty');
    }
    public function active(Request $request, $id) {
        $status = Faculty::find($id);
        $status->status = '1';
        $status->save();
        return redirect('faculty');
    }
}
