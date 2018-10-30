@if($message = Session::get('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
      <span class="badge badge-pill badge-success">Success</span>&nbsp; {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if($message = Session::get('danger'))
<div class="col-sm-12">
    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
      <span class="badge badge-pill badge-danger">Danger</span>&nbsp; {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if($message = Session::get('warning'))
<div class="col-sm-12">
    <div class="alert  alert-warning alert-dismissible fade show" role="alert">
      <span class="badge badge-pill badge-warning">Warning</span>&nbsp; {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
