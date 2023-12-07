@extends('backend.layouts.master')
@section('content')

<div id="page-wrapper">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1 class="page-heading">Faculty</h1>
        <div>
            <a href="{{route('faculty.create')}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Create</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Faculties
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculties as $faculty)
                            <tr class="odd gradeX">
                                <td>{{$i++}}</td>
                                <td>{{$faculty['name']}}</td>
                                <td>{{$faculty['year']}}</td>
                                <td class="center">
                                    @if ($faculty['status']=='1')
                                        <a href="{{route('faculty.inactive',$faculty->id)}}"><button class="btn btn-success btn-sm">Active</button></a>
                                        @else
                                        <a href="{{route('faculty.active',$faculty->id)}}"><button class="btn btn-danger btn-sm">Inactive</button></a>
                                    @endif
                                </td>
                                <td class="center-act d-flex">
                                    <a href="{{route('faculty.edit',$faculty->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                    <form action="{{route('faculty.delete',$faculty->id)}}" method="post">
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