@extends('backend.layouts.master')
@section('content')
    
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Issue Book</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Issue Book
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('issue.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Student</label>
                                            <select class="form-control multiple-select" name="student_id">
                                                <option value="">--Select Student--</option>
                                                @foreach ($students as $student)
                                                <option value="{{$student->id}}">{{$student->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('student_id')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Book</label>
                                            <select class="form-control multiple-select" name="book_id[]" multiple>
                                                @foreach ($books as $book)
                                                <option value="{{$book->id}}">{{$book->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('book_id')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Till Date</label>
                                            <input class="form-control" type="date" name="till_date">
                                            <span class="text-danger">@error('till_date')
                                                * {{$message}}
                                             @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
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