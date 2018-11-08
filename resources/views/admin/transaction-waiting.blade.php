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
                    <li><a href="#">Waiting Order</a></li>
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
                    <table id="user-management" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Product</th>
                          <th>Owner</th>
                          <th>Theme</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($order as $value)
                        <tr>
                          <td>{{ $value->updated_at }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->user->name }}</td>
                          <td>{{ $value->theme }}</td>
                          <td>Rp {{number_format($value->price,0,',','.')}} ,-</td>
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
