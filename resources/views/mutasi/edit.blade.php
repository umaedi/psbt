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
            <div class="alert alert-danger">
              <p>
              1. File yang diupload wajib PDF dengan ukuran file maksimal 2MB
              </p>
              <p>
              2. Silakan upload lampiran yang perlu diperbaharui saja
              </p>
            </div>
            @if (session('msg_mutasi'))
            <div class="alert alert-warning">{{ session('msg_mutasi') }}</div>
            @endif
            <div class="card">
              <div class="card-header">
                <h4>Formulir Permohonan Alih Tugas atau Mutasi</h4>
            </div>
            <div class="card-body">
                <form action="/user/mutasi/update/{{ $mutasi->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="lampiran1">SK Mutasi/Surat Persetujuan Dari Bupati</label>
                      <input type="file" class="form-control mb-1 @error('lampiran1') is-invalid @enderror" id="lampiran1" name="lampiran1">
                      <a href="{{ route('lampiran', ['folder' => 'mutasi','year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran1]) }}" target="_blank">Lampiran sebelumnya</a>
                      @error('lampiran1')
                           <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran2">Pengantar Dari Kepala OPD</label>
                      <input type="file" class="form-control mb-1 @error('lampiran2') is-invalid @enderror" id="lampiran1" name="lampiran2">
                      <a href="{{ route('lampiran', ['folder' => 'mutasi','year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran2]) }}" target="_blank">Lampiran sebelumnya</a>
                      @error('lampiran2')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran3">SK Pangkat/Jabatan Terakhir</label>
                      <input type="file" class="form-control mb-1 @error('lampiran3') is-invalid @enderror" id="lampiran1" name="lampiran3">
                      <a href="{{ route('lampiran', ['folder' => 'mutasi','year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran3]) }}" target="_blank">Lampiran sebelumnya</a>
                      @error('lampiran3')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran4">SKP 1 Tahun Terakhir</label>
                      <input type="file" class="form-control mb-1 @error('lampiran4') is-invalid @enderror" id="lampiran1" name="lampiran4">
                      <a href="{{ route('lampiran', ['folder' => 'mutasi','year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran4]) }}" target="_blank">Lampiran sebelumnya</a>
                      @error('lampiran4')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran5">Daftar Hadir 3 Bulan Terakhir</label>
                      <input type="file" class="form-control mb-1 @error('lampiran5') is-invalid @enderror" id="lampiran5" name="lampiran5">
                      <a href="{{ route('lampiran', ['folder' => 'mutasi','year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran5]) }}" target="_blank">Lampiran sebelumnya</a>
                      @error('lampiran5')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">PERBAHARUI LAMPIRAN</button>
                </form>
            </div>
            </div>
          </div>
          </div>
      </div>
      </div>
    </section>
  </div>
@endsection