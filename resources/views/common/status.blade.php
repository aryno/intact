{{-- Alert Success --}}
@if (session($name ?? 'status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session($name ?? 'status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Alert Info --}}
@if (session('status_info'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('status_info') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Alert Warning --}}
@if (session('status_warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('status_warning') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Alert Warning --}}
@if (session('status_danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('status_danger') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
