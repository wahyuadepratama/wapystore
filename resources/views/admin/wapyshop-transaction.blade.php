@extends('layouts.app-admin')

@section('head')
  <link rel="stylesheet" href="{{URL::asset('admins/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

<div class="content mt-3">
    <div class="animated">
        <div class="row">

          @include('admin.includes.notify')

          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                    <small>
                    <table id="user-management" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>City</th>
                          <th>Waktu</th>
                          <th>Product</th>
                          <th>Status</th>
                          <th>More</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($transaction as $value)
                        <tr>
                          <td>#{{ $value->id }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->city }}</td>
                          <td>{{ $value->updated_at }}</td>
                          <td> <a href="/shop/{{ $value->stock->id }}" style="color:black">{{ $value->stock->name }}</a> </td>
                          <td>
                            @if($value->status == "waiting")
                             <a href="/root/wapyshop/{{ $value->id }}/sent" class="btn-sm btn-danger">{{ $value->status }}</a>
                            @else
                             <a href="/root/wapyshop/{{ $value->id }}/waiting" class="btn-sm btn-success">{{ $value->status }}</a>
                            @endif
                          </td>
                          <td>
                            <small><a data-toggle="modal" data-target="#show{{$value->id}}" href="#" class="btn-sm btn-primary">View</a></small>
                          </td>
                          <div class="modal fade" id="show{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
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
                                            <div class="col-md-4"></div>
                                            <div class="col-md-6" style="text-align:right">
                                              Pesanan dibuat :<br>
                                              Product :<br>
                                              Harga :<br>
                                              Email :<br>
                                              Nama Pemesan :<br>
                                              Ukuran :<br>
                                              Kota :<br>
                                              Alamat :<br>
                                              Telephone :<br>
                                              Kode Pos :<br>
                                              Catatan :<br>
                                            </div>
                                            <div class="col-md-6" style="text-align:left">
                                              {{ $value->created_at }}<br>
                                              {{ $value->stock->name }}<br>
                                              {{ $value->stock->price }}<br>
                                              {{ $value->email }}<br>
                                              {{ $value->name }}<br>
                                              {{ $value->size }}<br>
                                              {{ $value->city }}<br>
                                              {{ $value->address }}<br>
                                              {{ $value->phone }}<br>
                                              {{ $value->postal }}<br>
                                              {{ $value->note }}<br>
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
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </small>
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
