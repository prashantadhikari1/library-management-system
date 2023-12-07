@extends('backend.layouts.master')
@section('content')

<div id="page-wrapper">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1 class="page-heading">Book</h1>
        <div>
            <a href="{{route('book.create')}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Create</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Books
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Faculty</th>
                                <th>Status</th>
                                <th>PDF</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$book['name']}}</td>
                                <td>{{$book->faculty->name}}</td>
                                <td>
                                    @if ($book['status']=='1')
                                        <a href="{{route('book.inactive',$book->id)}}"><button class="btn btn-success btn-sm">Active</button></a>
                                        @else
                                        <a href="{{route('book.active',$book->id)}}"><button class="btn btn-danger btn-sm">Inactive</button></a>
                                    @endif
                                </td>
                                <td>
                                    @if ($book['pdf'])
                                    <a href="{{asset('public/book/'.$book->pdf)}}"><button class="btn btn-info btn-sm">view</button></a>
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td class="center-act">
                                    <a href="{{route ('book.edit',$book->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                    <form action="{{route('book.delete',$book->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
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