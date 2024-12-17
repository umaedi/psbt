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
            @if (session('msg'))
            <div class="alert alert-warning">{{ session('msg') }}</div>
            @endif
            <div class="card">
              <div class="card-header">
                <h4>Formulir Permohonan Penerbitan Izin Belajar</h4>
            </div>
            <div class="card-body">
                <form action="/user/permohonan_izin_belajar/update/{{ $izin_belajar->id }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="lampiran1">Surat Pengantar Dari OPD</label>
                      <input type="file" class="form-control mb-1 @error('lampiran1') is-invalid @enderror" id="fileInput" name="lampiran1">
                      <a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->lampiran1) }}" target="_blank">Lihat lampiran sebelumnya</a>
                      @error('lampiran1')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran2">SK Pangkat atau Jabatan Terakhir</label>
                      <input type="file" class="form-control mb-1 @error('lampiran2') is-invalid @enderror" id="lampiran1" name="lampiran2">
                      <a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->lampiran2) }}" target="_blank">Lihat lampiran sebelumnya</a>
                      @error('lampiran2')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran3">SKP 1 Tahun Terakhir</label>
                      <input type="file" class="form-control mb-1 @error('lampiran3') is-invalid @enderror" id="lampiran1" name="lampiran3">
                      <a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->lampiran3) }}" target="_blank">Lihat lampiran sebelumnya</a>
                      @error('lampiran3')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran4">Daftar Hadir 3 Bulan Terakhir</label>
                      <input type="file" class="form-control mb-1 @error('lampiran4') is-invalid @enderror" id="lampiran1" name="lampiran4">
                      <a href="{{ \Illuminate\Support\Facades\Storage::url($izin_belajar->lampiran4) }}" target="_blank">Lihat lampiran sebelumnya</a>
                      @error('lampiran4')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">PERBAHARUI PERMOHONAN</button>
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