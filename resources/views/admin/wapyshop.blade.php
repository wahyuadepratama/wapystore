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
                  <div class="card-header">
                      <strong class="card-title">
                        <a class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New</a>
                        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                  <form action="/root/wapyshop/stock/store" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="largeModalLabel">Add New Stock</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="text" name="name" placeholder="nama" class="form-control"><br>
                                      <input type="text" name="brand" placeholder="brand" class="form-control"><br>
                                      <input type="number" name="price" placeholder="harga" class="form-control"><br>
                                      <input type="text" name="size" placeholder="rentang ukuran" class="form-control"><br>
                                      <input type="text" name="weight" placeholder="berat" class="form-control"><br>
                                      <input type="text" name="material" placeholder="bahan" class="form-control"><br>
                                      <input type="text" name="color" placeholder="warna" class="form-control"><br>
                                      <input type="text" name="description" placeholder="deskripsi" class="form-control"><br>
                                      <select class="form-control" name="category">
                                        @foreach($category as $data2)
                                        <option value="{{ $data2->id }}">{{ $data2->name }}</option>
                                        @endforeach
                                      </select><br>
                                      <input type="file" name="file" class="form-control"><br>
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

                    @foreach($stock as $data)
                    <div class="col-md-3">
                          <div class="card">

                            <style media="screen">
                            .frame-square {width: 100%;padding-top: 100%;overflow: hidden;position: relative;}
                            .frame-square img {width: 100%;height: auto;margin: auto;position: absolute;top: -100%;right: -100%;bottom: -100%;left: -100%;}
                            </style>

                            <div class="frame-square">
                              <img class="card-img-top" alt="" src="{{ asset('storage/stock/'.$data->file) }}">
                            </div>

                            <div class="corner-ribon black-ribon">
                                <i class="fa fa-photo"></i>
                            </div>
                          </div>
                    </div>
                    @endforeach

                  </div>
                  <div style="font-size: 20px; padding-left: 40%; font-weight: bolder;">
                    {{ $stock->links() }}
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
