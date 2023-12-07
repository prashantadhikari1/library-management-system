@extends('backend.layouts.master')
@section('content')
    
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Student</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create Student
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="{{$student->name}}">
                                            <span class="text-danger">@error('name')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Faculty</label>
                                            <select class="form-control" name="faculty_id">
                                                <option value="">Select Faculty</option>
                                                @foreach ($faculties as $faculty)
                                                <option value="{{$faculty->id}}"{{$faculty->id == $student->faculty_id ? 'selected' : ''}}>{{$faculty->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('faculty_id')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Roll No</label>
                                            <input class="form-control" type="text" name="roll_no" value="{{$student->roll_no}}">
                                            <span class="text-danger">@error('roll_no')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" name="address" value="{{$student->address}}">
                                            <span class="text-danger">@error('address')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email" value="{{$student->email}}">
                                            <span class="text-danger">@error('email')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" name="phone" value="{{$student->phone}}">
                                            <span class="text-danger">@error('phone')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input class="form-control" type="file" name="image" onchange="loadFile(event)">
                                            <img src="{{asset('public/images/student/'.$student->image)}}" id="output" width="70px" height="70px" alt="Img">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">Update</button>
                            </form>
                        </div>
                        
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

@endsection