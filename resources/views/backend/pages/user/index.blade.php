@extends('backend.layouts.master')
@section('content')

<div id="page-wrapper">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1 class="page-heading">User Management</h1>
        <div>
            <a href="{{route('user.create')}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Create</button></a>
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
                                <th>Img</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                              <tr>
                                <td>{{$i++}}</td>
                                <td><img src="{{asset('public/images/user/'.$user->image)}}" alt="pic" width="50px"></td>
                                <td>{{$user['name']}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>
                                    @if ($user['status']=='1')
                                        <a href="{{route('user.inactive',$user->id)}}"><button class="btn btn-success btn-sm">Active</button></a>
                                        @else
                                        <a href="{{route('user.active',$user->id)}}"><button class="btn btn-danger btn-sm">Inactive</button></a>
                                    @endif
                                </td>
                                <td class="center-act">
                                    <a href="{{route('user.edit',$user->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                    <form action="{{route('user.delete',$user->id)}}" method="post">
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