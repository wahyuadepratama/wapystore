@extends('layouts.app-admin')

@section('head')
  <link rel="stylesheet" href="{{URL::asset('admins/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>All User</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">User Management</a></li>
                    <li><a href="#">All User</a></li>
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
                      <strong class="card-title">Daftar Semua User</strong>
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
                        @foreach($users as $data1)
                        <tr>
                          <td>{{$data1->name}}</td>
                          <td>{{$data1->username}}</td>
                          <td>{{$data1->email}}</td>
                          <td>{{$data1->role->role_name}}</td>
                          <td>
                            @if($data1->role->id != 1)
                            <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#delete{{$data1->id}}"><i class="ti-lock"></i></button>
                            @endif
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#show{{$data1->id}}"><i class="ti-fullscreen"></i></button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update{{$data1->id}}"><i class="ti-pencil-alt"></i></button>
                          </td>

                          <div class="modal fade" id="delete{{$data1->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
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
                                              Apakah anda yakin akan memblokir {{$data1->username}} ?
                                          </p>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <form action="/root/user-management/delete/{{$data1->id}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-warning" value="Blokir"></input>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="modal fade" id="show{{$data1->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="largeModalLabel">Informasi Detail</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <p>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                              <center><img src="{{asset('storage/avatar/default.png')}}" width="150" height="150"></center>
                                            </div>
                                            <div class="col-md-4"></div><br><br>
                                            <div class="col-md-6" style="text-align:right">
                                              Akun dibuat :<br>
                                              Akun diupdate :
                                            </div>
                                            <div class="col-md-6" style="text-align:left">
                                              {{$data1->created_at}}<br>
                                              {{$data1->updated_at}}
                                            </div>
                                          </p>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="modal fade" id="update{{$data1->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-md" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="largeModalLabel">Ubah Data</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">

                                        <div class="col-sm-12">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <li>Harap hati-hati dalam mengubah role user!</li>
                                                <li>Password hanya ditampilkan 1x setelah direset!</li>
                                            </div>
                                        </div>

                                        <form action="/root/user-management/update/{{$data1->id}}" method="post">
                                          {{ csrf_field() }}
                                        <p>
                                          <div class="col-md-6" style="text-align:right">
                                            Nama Pengguna :<br><br><br>
                                            Roles User :
                                          </div>
                                          <div class="col-md-6" style="text-align:left">
                                            <input type="text" name="name" value="{{$data1->name}}" class="form-control"> <br>
                                            <select name="role_id" id="select" class="form-control">
                                              @foreach($roles as $data2)
                                              <option value="{{$data2->id}}">{{$data2->role_name}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </p>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-success" value="Ubah Data"></input>
                                          </form>
                                          <form action="/root/user-management/reset-password/{{$data1->id}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger" value="Reset Password"></input>
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
