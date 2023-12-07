@extends('backend.layouts.master')
@section('content')

<div id="page-wrapper">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h1 class="page-heading">Issue Book</h1>
        <div>
            <a href="{{route('issue.create')}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Create</button></a>
        </div>
    </div>
    <form action="{{route('issue.filter')}}" method="post">
        @csrf
        <div class="row" style="padding-bottom: 10px">
            <div class="col-md-4">
                <input type="date" name="from" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="date" name="to" class="form-control">
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
                                <th>Books</th>
                                <th>Till Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($issues as $issue)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$issue->student->name}}</td>
                                {{-- <a href="{{route('issue.view',$issue->id)}}"></a><button onclick="showBooks()" class="btn btn-info btn-sm">view</button> --}}
                                <td>
                                    <a 
                                    href="javascript:void(0)" 
                                    id="show-book" 
                                    data-url="{{ route('issue.view', $issue->id) }}" 
                                    class="btn btn-info"
                                    onclick="loadIssueLists(this.dataset.url)"
                                    >Show</a>
                                </td>
                                <td>{{$issue->till_date}}</td>
                                <td><span class="badge badge-success">{{$issue->status}}</span></td>
                                <td>
                                    @if ($issue->status==null)
                                    <a href="{{route('issue.return',$issue->id)}}"><button class="btn btn-danger btn-sm">Return</button></a>
                                    @endif
                                    @if ($issue->isExpired && $issue->status==null)
                                        <div class="badge badge-danger">Expired</div>
                                    @endif
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

<!-- Modal -->
<div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Books</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <ul id="issue-list"></ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
        
  </body>
    
 

{{-- <script>
    function showBooks() {
        var req  = new XMLHttpRequest();

        req.open("GET","/view",true);
        req.send();

        req.onreadystatechange = function() {
            if(req.readyState == 4 && req.Status == 200){
                console.log(req.responseText);
            }
        }
    }
</script> --}}
@endsection
