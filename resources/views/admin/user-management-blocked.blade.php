@extends('layouts.app-admin')

@section('head')
  <link rel="stylesheet" href="{{URL::asset('admins/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>User Blocked</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">User Management</a></li>
                    <li><a href="#">User Blocked</a></li>
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
                      <strong class="card-title">Daftar User Terblokir</strong>
                  </div>
                  <div class="card-body">
                    <table id="user-management" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Roles</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($deletedUsers as $data1)
                        <tr>
                          <td>{{$data1->name}}</td>
                          <td>{{$data1->username}}</td>
                          <td>{{$data1->email}}</td>
                          <td>{{$data1->role->role_name}}</td>
                          <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#unblock{{$data1->id}}"><i class="ti-unlock"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{$data1->id}}"><i class="ti-trash"></i></button>
                          </td>

                          <div class="modal fade" id="unblock{{$data1->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-sm" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <p>
                                              Apakah anda yakin akan membuka blokir dari {{$data1->username}} ?
                                          </p>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <form class="" action="/root/user-management/restore/{{$data1->id}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-success" value="Buka Blokir"></input>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="modal fade" id="destroy{{$data1->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-sm" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <p>
                                              Semua data dari {{$data1->username}} akan benar-benar terhapus dan hilang dari database.
                                              Apakah anda tetap ingin melanjutkan?
                                          </p>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <form class="" action="/root/user-management/destroy/{{$data1->id}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger" value="Destroy"></input>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>

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
