@extends('layouts.app-admin')

@section('head')
  <link rel="stylesheet" href="{{URL::asset('admins/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Theme - Photo</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Theme</a></li>
                    <li><a href="#">Theme - Photo</a></li>
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
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                  <form action="/root/theme/photo/store" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="largeModalLabel">Add New Photo</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="text" name="name" placeholder="nama tema disini" class="form-control"><br>
                                      <input type="file" name="photo" class="form-control"><br>
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-md-6">
                                            @php $count = $theme->count(); $batas = $count/2; @endphp
                                            @foreach($theme as $value)
                                              @if($count > $batas)
                                              <input type="checkbox" name="theme[]" value="{{ $value->id }}"> {{ $value->name }}<br>
                                              @endif
                                              @php $count--; @endphp
                                            @endforeach
                                          </div>
                                          <div class="col-md-6">
                                            @php $count = $theme->count(); $batas = $count/2; @endphp
                                            @foreach($theme as $value)
                                              @if($count < $batas)
                                              <input type="checkbox" name="theme[]" value="{{ $value->id }}"> {{ $value->name }}<br>
                                              @endif
                                              @php $count--; @endphp
                                            @endforeach
                                          </div>
                                        </div>
                                      </div>
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

                    @foreach($themePhoto as $data)
                    <div class="col-md-3">
                          <div class="card">

                            <style media="screen">
                            .frame-square {width: 100%;padding-top: 100%;overflow: hidden;position: relative;}
                            .frame-square img {width: 100%;height: auto;margin: auto;position: absolute;top: -100%;right: -100%;bottom: -100%;left: -100%;}
                            </style>

                            <div class="frame-square">
                              <img class="card-img-top" alt="" src="{{ asset('storage/theme/'.$data->path) }}">
                            </div>

                            <div class="corner-ribon black-ribon">
                                <i class="fa fa-photo"></i>
                            </div>

                            <footer class="twt-footer" style="color: black;">
                                <span>
                                    @php $theme = \App\Models\ThemePhoto::with('theme')->where('photo_id',$data->id)->get(); @endphp
                                    @foreach($theme as $key)
                                    <p>
                                      <a style="color:black" href="/root/theme/photo-theme/destroy/{{ $key->id }}" class="btn-sm btn-warning" onclick="return confirm('Are you sure want to delete this category?')"><i class="fa fa-close"></i> {{ $key->theme->name }} </a>
                                    </p>
                                    @endforeach
                                    <p>Nama: &nbsp;{{ $data->name }}</p>
                                </span>
                                <span>
                                  <a class="btn btn-danger" href="/root/theme/photo/destroy/{{ $data->id }}" onclick="return confirm('Are you sure want to delete this photo?')"><small>Delete</small></a><br>
                                </span>
                            </footer>
                          </div>
                    </div>
                    @endforeach

                  </div>
                  <div style="font-size: 20px; padding-left: 40%; font-weight: bolder;">
                    {{ $themePhoto->links() }}
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
