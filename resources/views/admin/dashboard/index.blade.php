@extends('layouts.main')
@section('content')
<div class="main-wrapper">
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="font-weight-bold" id="date"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Tab!</h4>
                    <p>PERMOHONAN PENERBITAN IZIN BELAJAR</p>
                    {{-- <hr> --}}
                    {{-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> --}}
                  </div>
                {{-- <div class="alert alert-primary">PERMOHONAN PENERBITAN IZIN BELAJAR</div> --}}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Tab!</h4>
                    <p>PERMOHONAN ALIH TUGAS ATAU MUTASI</p>
                    {{-- <hr> --}}
                    {{-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> --}}
                  </div>
                {{-- <div class="alert alert-info">PERMOHONAN ALIH TUGAS ATAU MUTASI</div> --}}
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-user fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan_izin_belajar?index=dalam antrian" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan perlu diproses') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $izin_belajar }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fa fa-user-clock fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan_izin_belajar?index=diproses" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan sedang diproses') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $izin_diproses }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="mb-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-user fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/mutasi?index=dalam antrian" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan perlu diproses') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $mutasi }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fa fa-user-clock fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/mutasi?index=diproses" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan sedang diproses') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $mutasi_diproses }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fa fa-user-check fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan_izin_belajar?index=diterima" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan diterima') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $izin_diterima }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-user-slash fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan_izin_belajar?index=ditolak" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan ditolak') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $izin_ditolak }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fa fa-user-check fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/mutasi?index=diterima" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan diterima') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $mutasi_diterima }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-user-slash fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/mutasi?index=ditolak" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan ditolak') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $mutasi_ditolak }}</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Permohonan Penerbitan Izin Belajar Perlu Diproses</h4>
                </div>
                <div class="card-body table-responsive" id="dataTableIzin">
                  <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Mohon tunggu sebentar...
                  </button>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                    <h4>Permohonan Alih Tugas atau Mutasi Perlu Diproses</h4>
                </div>
                <div class="card-body table-responsive" id="dataTableMutasi">
                  <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Mohon tunggu sebentar...
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    var page = 1;
    $(document).ready(function() {
        loadTableIzin();
        loadTableMutasi();
    });

    async function loadTableIzin() {
        var param = {
          url: '/admin/permohonan_izin_belajar?index=dalam antrian',
          method: 'GET',
          data: {
            load: 'table',
            page: page,
          },
        }

        await transAjax(param).then((ress) => {
          $('#dataTableIzin').html(ress);
        }).cath((err) => {
          $('#dataTableIzin').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`);
        });
    }



    async function loadTableMutasi() {
      var param = {
          url: '/admin/mutasi?index=dalam antrian',
          method: 'GET',
          data: {
            load: 'table',
            page: page,
          },
        }

        await transAjax(param).then((ress) => {
          $('#dataTableMutasi').html(ress);
        }).catch((err) => {
          $('#dataTableMutasi').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
        });
    }

    function updateDateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        };
        document.getElementById('date').textContent = now.toLocaleDateString('id-ID', options);
    }
    setInterval(updateDateTime, 1000); // Perbarui setiap detik
    window.onload = updateDateTime;   // Jalankan saat halaman dimuat
</script>
@endpush