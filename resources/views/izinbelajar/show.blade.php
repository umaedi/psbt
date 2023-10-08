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
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>Lampiran Permohonan Penerbitan Izin Belajar</h4>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <tbody>
                  <tr>
                    <th>1</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->lampiran1) }}" target="_blank"> Surat Pengantar Dari OPD</a></td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->lampiran2) }}" target="_blank"> SK Pangkat atau Jabatan Terakhir</a></td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->lampiran3) }}" target="_blank"> SKP 1 Tahun Terakhir</a></td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->lampiran4) }}" target="_blank"> Daftar Hadir 3 Bulan Terakhir</a></td>
                  </tr>
                </tbody>
            </table>
            </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>Status Permohonan Penerbitan Izin Belajar</h4>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <tbody>
                  <tr>
                    <td><button class="btn btn-success">Permohonan Dalam antrian</button></td>
                    <td><button class="btn btn-info">Unduh Surat Izin</button></td>
                  </tr>
                </tbody>
            </table>
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
@endpush