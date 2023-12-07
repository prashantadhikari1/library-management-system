@extends('backend.layouts.master')
@section('content')

<div id="page-wrapper">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1 class="page-heading">Student</h1>
        <div>
            <a href="{{route('student.create')}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Create</button></a>
        </div>
    </div>
    @if (session('success'))
        <h4 class="alert alert-success">{{session('success')}}</h4>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Students
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Img</th>
                                <th>Name</th>
                                <th>Faculty</th>
                                <th>Roll No</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr class="odd gradeX">
                                <td>{{$i++}}</td>
                                <td><img src="{{asset('public/images/student/'.$student->image)}}" width="50px" height="40px" alt="Img"></td>
                                <td>{{$student['name']}}</td>
                                <td>{{$student->faculty->name}}</td>
                                <td>{{$student['roll_no']}}</td>
                                <td>{{$student['address']}}</td>
                                <td>{{$student['email']}}</td>
                                <td>{{$student['phone']}}</td>
                                <td class="center">
                                    @if ($student['status']=='1')
                                        <a href="{{route('student.inactive',$student->id)}}"><button class="btn btn-success btn-sm">Active</button></a>
                                        @else
                                        <a href="{{route('student.active',$student->id)}}"><button class="btn btn-danger btn-sm">Inactive</button></a>
                                    @endif
                                </td>
                                <td class="center-act">
                                    <a href="{{route('student.edit',$student->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                    <form action="{{route('student.delete',$student->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->

@endsection