@if( Session::has('success') )
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>
            <i class="fa fa-check mr-1"></i> {!! Session::get('success') !!}
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if( Session::has('error') )
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>
            <i class="fa fa-exclamation mr-1"></i> {!! Session::get('error') !!}
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

