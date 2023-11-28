{{-- Alert Success --}}
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class=" ti ti-alert-circle"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <i class=" ti ti-x hover:text-red-600"></i>
    </button>
</div>
@endif

{{-- Alert Error --}}
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class=" ti ti-alert-circle"></i>{{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <i class=" ti ti-x hover:text-red-600"></i>
    </button>
</div>
@endif