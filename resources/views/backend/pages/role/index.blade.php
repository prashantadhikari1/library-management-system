@extends('backend.layouts.master')
@section('content')

<div id="page-wrapper">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1 class="page-heading">Role Management</h1>
        <div>
            <a href="{{route('role.create')}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Create</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($roles as $role)
                               <tr>
                                <td>{{$i++}}</td>
                                <td>{{$role['name']}}</td>
                                <td>
                                    @if ($role['status']=="1")
                                        <a href="{{route('role.inactive',$role->id)}}"><button class="btn btn-success btn-sm">Active</button></a>
                                        @else
                                        <a href="{{route('role.active',$role->id)}}"><button class="btn btn-danger btn-sm">Inactive</button></a>
                                    @endif
                                </td>
                                <td class="center-act">
                                    <a href="{{route('role.edit',$role->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                    <form action="{{route('role.delete',$role->id)}}" method="POST">
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