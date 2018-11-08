@extends('layouts.app-admin')

@section('head')
  <link rel="stylesheet" href="{{URL::asset('admins/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>All Theme</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Theme</a></li>
                    <li><a href="#">All Theme</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated">
        <div class="row">

          @include('admin.includes.notify')

          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <strong class="card-title">
                        <a class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New</a>
                        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                  <form action="/root/theme/store" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="largeModalLabel">Add New Theme</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="text" name="name" placeholder="nama tema disini" class="form-control"><br>
                                      <textarea name="description" placeholder="deskripsi tema" class="form-control"></textarea><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <input type="submit" class="btn btn-warning" value="Add"></input>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                      </strong>
                  </div>
                  <div class="card-body">
                    <table id="user-management" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Created_at</th>
                          <th>Updated_at</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($theme as $data)
                        <tr>
                          <td>{{ $data->name }}</td>
                          <td>{{ $data->description }}</td>
                          <td>{{ $data->created_at }}</td>
                          <td>{{ $data->updated_at }}</td>
                          <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure want to destroy this?')" href="/root/theme/destroy/{{ $data->id }}">Destroy</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>

        </div>
    </div>
</div>


</div>

@endsection

@section('script')

<script src="{{URL::asset('admins/assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('admins/assets/js/lib/data-table/datatables-init.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#user-management').DataTable();
    } );
</script>

@endsection
