@if (session('success-message'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {!! session('success-message') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('error-message'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {!! session('error-message') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
