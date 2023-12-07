<?php

namespace App\Http\Controllers\Api;

use App\Faculty;
use App\Http\Controllers\Controller;
use App\Student;
use Dotenv\Result\Success;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function allStudent() {
        $student = Student::get(['id','name','faculty_id','roll_no','email','phone','image']);
        foreach ($student as $key => $stud) {
            $stud->faculty_name = Faculty::find($stud->faculty_id)->name;
            $stud->image = $stud->image ?? '-';
        }
        return response([
            'Success' => true,
            'data' => $student,
        ]); 
    }
}
