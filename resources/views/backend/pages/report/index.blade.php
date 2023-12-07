@extends('backend.layouts.master')
@section('content')

<div id="page-wrapper">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1 class="page-heading">Issue Book</h1>
    </div>
    <form action="{{route('report.filter')}}" method="post">
        @csrf
        <div class="row" style="padding-bottom: 10px">
            <div class="col-md-4">
                <select name="student_id" class="form-control multiple-select">
                    <option value="">All Students</option>
                    @foreach ($students as $student)
                        <option value="{{$student->id}}"{{@$student_id == $student->id ? 'selected' : ''}}>{{$student->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Issue Books
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover myTable" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Student</th>
                                <th>Book</th>
                                <th>From</th>
                                <th>Till Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($issuelists as $issuelist)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$issuelist->issue->student->name}}</td>
                                    <td>{{$issuelist->book->name}}</td>
                                    <td>{{$issuelist->created_at->format('d M Y') }}</td>
                                    <td>{{date("d M Y", strtotime($issuelist->issue->till_date)) }}</td>
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