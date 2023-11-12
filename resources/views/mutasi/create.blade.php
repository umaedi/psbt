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
            <div class="card">
              <div class="card-header">
                <h4>Formulir Permohonan Alih Tugas atau Mutasi</h4>
            </div>
            <div class="card-body">
                <form action="/user/mutasi/create/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="lampiran1">SK Mutasi/Surat Persetujuan Dari Bupati</label>
                      <input type="file" class="form-control @error('lampiran1') is-invalid @enderror" id="lampiran1" name="lampiran1" required>
                      @error('lampiran1')
                           <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran2">Pengantar Dari Kepala OPD</label>
                      <input type="file" class="form-control @error('lampiran2') is-invalid @enderror" id="lampiran1" name="lampiran2" required>
                      @error('lampiran2')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran3">SK Pangkat/Jabatan Terakhir</label>
                      <input type="file" class="form-control @error('lampiran3') is-invalid @enderror" id="lampiran1" name="lampiran3" required>
                      @error('lampiran3')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran4">SKP 1 Tahun Terakhir</label>
                      <input type="file" class="form-control @error('lampiran4') is-invalid @enderror" id="lampiran1" name="lampiran4" required>
                      @error('lampiran4')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran5">Daftar Hadir 3 Bulan Terakhir</label>
                      <input type="file" class="form-control @error('lampiran5') is-invalid @enderror" id="lampiran5" name="lampiran5" required>
                      @error('lampiran5')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">KIRIM PERMOHONAN</button>
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