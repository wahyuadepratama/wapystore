@extends('layouts.app-admin')

@section('head')
  <link rel="stylesheet" href="{{URL::asset('admins/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Transaction</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Transaction</a></li>
                    <li><a href="#">On Progress Order</a></li>
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
                  <div class="card-body">
                    <small>
                    <table id="user-management" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Payment</th>
                          <th>File Upload</th>
                          <th>Status</th>
                          <th>No Order</th>
                          <th>Price</th>
                          <th>Dikerjakan</th>
                          <th>Owner</th>
                          <th>Designer</th>
                          <th>Product</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($transaction as $value)
                        <tr>
                          <td>
                            @if($value->payment_status == 'waiting')
                            <small><a href="/root/transaction/{{ $value->id }}/{{ $value->order->id }}" onclick="return confirm('Are you sure you want to confirm this transaction ? email confirmation will be send to your client');" class="btn-sm btn-danger">Confirm</a></small>
                            @else
                            <small><a href="#" class="btn-sm btn-success">Complete</a></small>
                            @endif
                          </td>
                          <td>
                            <div class="container">
                              <div class="row" style="padding-bottom: 5%">
                                @if($value->status == 'belum diupload')
                                <a href="/root/transaction/change/sudah/{{ $value->id }}" class="btn-sm btn-danger">Belum</a>
                                @else
                                <a href="/root/transaction/change/belum/{{ $value->id }}" class="btn-sm btn-success">Sudah</a>
                                @endif
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="container">
                              <div class="row" style="padding-bottom: 5%">
                                @if($value->order->status == 'revision')
                                <a href="/root/transaction/change/status/done/{{ $value->order->id }}" onclick="return confirm('Are you sure you want to confirm this transaction to be done? email confirmation will be send to your client');" class="btn-sm btn-warning">Revisi</a>
                                @elseif($value->order->status == 'on_progress')
                                <a href="/root/transaction/change/status/done/{{ $value->order->id }}" class="btn-sm btn-danger">Progress</a>
                                @else
                                <a class="btn-sm btn-success">Done</a>
                                @endif
                              </div>
                            </div>
                          </td>
                          <td>#{{ $value->order->id }}</td>
                          <td>Rp {{number_format($value->order->price,0,',','.')}} ,-</td>
                          <td>{{ $value->updated_at }}</td>
                          <td>{{ $value->order->user->name }}</td>
                          <td>{{ $value->user->name }}</td>
                          <td>{{ $value->order->name }}</td>
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
