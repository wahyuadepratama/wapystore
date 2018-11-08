@extends('layouts.app-admin')

@section('head')
  <link rel="stylesheet" href="{{URL::asset('admins/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>All Discount</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Discount Management</a></li>
                    <li><a href="#">All Discount</a></li>
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
                                  <form action="/root/discount-management/store" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="largeModalLabel">Add New Discount</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="text" name="name" placeholder="keterangan diskon" class="form-control"><br>
                                      <input type="number" name="discount" placeholder="besar diskon (%)" class="form-control"><br>
                                      @foreach(config('product') as $key => $value)
                                      <div class="col-md-12">
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="product[]" value="{{ $value }}"> {{ $value }}</label>
                                        </div>
                                      </div>
                                      @endforeach
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
                          <th>Discount(%)</th>
                          <th>Product</th>
                          <th>Send To One</th>
                          <th>Broadcast</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($discount as $data1)
                        <tr>
                          <td>{{$data1->name}}</td>
                          <td>{{$data1->discount}}</td>
                          <td>
                            @php
                             $dataArray = unserialize($data1->product);
                            @endphp
                            @foreach($dataArray as $value)
                              {{ $value.", " }}
                            @endforeach
                          </td>
                          <td>
                            <button type="button" name="button" data-toggle="modal" data-target="#sendToOne{{$data1->id}}" class="btn btn-info">Select User</button>
                          </td>
                          <td>
                            <a href="/root/discount-management/broadcast" class="btn btn-info">Broadcast to All User</a>
                          </td>
                          <td>
                            <a href="/root/discount-management/destroy/{{ $data1->id }}" onclick="return confirm('Are you sure you want to delete this discount ?');" class="btn btn-danger">Destroy</a>
                          </td>

                          <div class="modal fade" id="sendToOne{{$data1->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-sm" role="document">
                                  <div class="modal-content">
                                    <form action="/root/discount-management/send" method="post">
                                      <div class="modal-header">
                                          <h6 class="modal-title" id="largeModalLabel">Select a person who want to give this discount</h6>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                        <select name="user" class="form-control">
                                          @foreach($customer as $data2)
                                          <option value="{{ $data2->id }}">{{ $data2->name }}</option>
                                          @endforeach
                                        </select>
                                        <input type="hidden" name="discount_id" value="{{ $data1->id }}">
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            {{ csrf_field() }}
                                          <input type="submit" class="btn btn-warning" value="Send Discount"></input>
                                      </div>
                                    </form>
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
