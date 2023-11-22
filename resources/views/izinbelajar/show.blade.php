@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permohonan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="/user/permohonan_izin_belajar">Permohonan</a></div>
          <div class="breadcrumb-item">Show</div>
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
            <form method="POST" onsubmit="return confirm('Yakin hapus data ini?')" action="/user/permohonan_izin_belajar/destroy/{{ $izin_belajar->id }}">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger">HAPUS PERMOHONAN</button>
            </form>
            </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>Status Permohonan Penerbitan Izin Belajar</h4>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Tgl Pengajuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Surat izin</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ \Carbon\Carbon::parse($izin_belajar->created_at)->isoFormat('D MMMM Y') }}</td>
                    <td><span class="badge badge-primary">{{ $izin_belajar->status }}</span></td>
                    @if ($izin_belajar->status == 'dalam antrian')
                    <td><button onclick="return confirm('Permohonan masih dalam antrian')" class="btn btn-info btn-sm">Download</button></td>
                    @elseif($izin_belajar->status == 'diproses')
                    <td><button onclick="return confirm('Permohonan sedang diproses')" class="btn btn-info btn-sm">Download</button></td>
                    @elseif($izin_belajar->status == 'diterima')
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->suratizin) }}" class="btn btn-info btn-sm">Download</a></td>
                    @else
                    <td><button onclick="return confirm('Permohonan ditolak!')" class="btn btn-info btn-sm">Download</button></td>
                    @endif
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
            @if ($izin_belajar->status == 'ditolak')
            <div class="card mt-3">
              <div class="card-header">
                <h4>Alasan Penolakan</h4>
            </div>
            <div class="card-body">
              <textarea class="form-control">{{ $izin_belajar->pesan }}</textarea>
            </div>
            </div>
            @endif
          </div>
          </div>
      </div>
      </div>
    </section>
  </div>
@endsection