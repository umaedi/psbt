@props([
    'idBtn'
    ])
<button id="{{ $idBtn }}" class="btn btn-primary d-none" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
</button>