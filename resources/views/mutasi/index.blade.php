@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permohonan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Permohonan</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            @if (session('msg_mutasi'))
            <div class="alert alert-success">{{ session('msg_mutasi') }}</div>
            @endif
            <div class="card">
              <div class="card-header">
                <h4>Permohonan Alih Tugas atau Mutasi</h4>
            </div>
            <div class="card-body table-responsive" id="dataTable">
                <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Mohon tunggu sebentar...
                </button>
            </div>
            </div>
          </div>
          </div>
      </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
<script type="text/javascript">
    $(document).ready(function() {
        loadData();
    });

    async function loadData() {
        var param = {
            method: 'GET',
            url: '{{ url()->current() }}',
            data: {
                load: 'table',
            }
        }
        await transAjax(param).then((result) => {
            $('#dataTable').html(result)

        }).catch((err) => {
            $('#dataTable').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
    });
  }
</script>
@endpush