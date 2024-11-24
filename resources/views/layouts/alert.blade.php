@if ($message = Session::get('success'))
    <div class="alert alert-light-success color-success alert-dismissible fade show">
        <i class="bi bi-check-circle"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif($message = Session::get('danger'))
<div class="alert alert-light-danger color-danger alert-dismissible fade show">
    <i class="bi bi-check-circle"></i>
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@else    
@endif
