@extends('layouts.app-admin')

@section('head')
  <link rel="stylesheet" href="{{URL::asset('admins/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Promote</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Promote via Email</a></li>
                    <li><a href="#">Promote</a></li>
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
                        Mailist (Custome Message)
                      </strong>
                  </div>
                  <div class="card-body">

                    <form action="/root/promote-email/mailist/store" method="post">
                      {{ csrf_field() }}
                      <input type="text" name="subject" class="form-control" placeholder="Subject.." required><br>
                      <textarea name="body" rows="8" cols="80" class="form-control" placeholder="Body.." required></textarea><br>
                      <table id="user-management" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Last Promote</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($mailist as $data)
                          <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->last_promote }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td>
                              <input type="hidden" name="id" value="{{ $data->id }}">
                              <input type="submit" value="Send Email" class="btn-sm btn-success">
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </form>

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
