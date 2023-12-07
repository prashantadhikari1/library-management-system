<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class StudentController extends Controller
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
        $students = Student::all();
        return view('backend.pages.student.index', compact('i','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::whereStatus(1)->get();
        return view('backend.pages.student.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputField = $request->validate([
            'name' => 'required',
            'faculty_id' => 'required',
            'roll_no' => 'required|unique:students,roll_no',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10|max:15',
            'status' =>  'required'
        ],
        [
            'faculty_id.required' => 'The faculty field is required'
        ]);
        $student = new Student();
        $student->name = $request->input('name');
        $student->faculty_id = $request->input('faculty_id');
        $student->roll_no = $request->input('roll_no');
        $student->address = $request->input('address');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->status = $request->input('status');

        if($request->hasFile('image'))
        {
            $image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/student',$image);
            $student->image = $image;
        }
        else {
            $student->image = '';
        }
        $student->save();
        return redirect('student')->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $faculties = Faculty::all();
        return view('backend.pages.student.edit', compact('student','faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $inputField = $request->validate([
            'name' => 'required',
            'faculty_id' => 'required',
            'roll_no' => 'required|unique:students,roll_no,'.$student->id,
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10|max:15'
        ],
        [
            'faculty_id.required' => 'The faculty field is required'
        ]);
   
        $student->name = $request->input('name');
        $student->faculty_id = $request->input('faculty_id');
        $student->roll_no = $request->input('roll_no');
        $student->address = $request->input('address');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');

        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($student->image!="") {
                if(file_exists('public/images/student/'.$student->image)) {
                    unlink('public/images/student/'.$student->image);   
                }
            }
            $request->image->move('public/images/student',$imageName);
            $student->image = $imageName;
        }

        $student->update();
        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $id)
    {
        $id->delete();
        return redirect('student');
    }

    public function inactive($id) {
        $status = Student::find($id);
        $status->status = '0';
        $status->save();
        return redirect('student');
    }
    public function active($id) {
        $status = Student::find($id);
        $status->status = '1';
        $status->save();
        return redirect('student');
    }
}
