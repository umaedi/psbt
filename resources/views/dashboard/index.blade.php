@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>DATA DIRI</h4>
              </div>
              <div class="card-body">
                  <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                      @csrf
                    <div class="form-group">
                      <label for="img">Photo</label>
                      <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->photo) }}" loading="lazy" alt="photo" width="100%" >
                      @error('img')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input id="name" type="text" class="form-control" name="name" tabindex="1" value="{{ auth()->user()->nama }}">
                    </div>
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input id="nip" type="text" class="form-control" name="nip" tabindex="2" value="{{ auth()->user()->nip }}">
                    </div>
                    <div class="form-group">
                      <label for="">Pangkat</label>
                      <input type="text" class="form-control" name="pangkat" tabindex="2" value="{{ auth()->user()->pangkat }}">
                  </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" tabindex="2" value="{{ auth()->user()->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="">Instansi</label>
                        <input type="text" class="form-control" name="instansi" tabindex="2" value="{{ auth()->user()->instansi }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" tabindex="2" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">Mobile Number/WhatsApp</label>
                      <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ auth()->user()->no_tlp }}">
                    </div>
                    <div class="form-group">
                        <label for="domisili">Domisili</label>
                        <textarea id="domisili" type="text" class="form-control @error('domisili') is-invalid @enderror" name="domisili" tabindex="5">{{ auth()->user()->domisili }}</textarea>
                      </div>
                  </form>
                </div>
            </div>
          </div>
          <div class="col-md-8 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>PENERBITAN TIDAK PERNAH DIHUKUM DISIPLIN</h4>
            </div>
            <div class="card-body">
                <h6>Persyaratan Penerbitan Izin Belajar</h6>
                <table class="table">
                    <tbody>
                      <tr>
                        <th>1</th>
                        <td>Surat Pengantar Dari OPD</td>
                      </tr>
                      <tr>
                        <th>2</th>
                        <td>SK Pangkat atau Jabatan Terakhir</td>
                      </tr>
                      <tr>
                        <th>3</th>
                        <td>SKP 1 Tahun Terakhir</td>
                      </tr>
                      <tr>
                        <th>4</th>
                        <td>Daftar Hadir 3 Bulan Terakhir</td>
                      </tr>
                    </tbody>
                </table>
                <a href="/user/permohonan_izin_belajar/create" class="btn btn-primary">Ajukan Permohonan</a>
                <a href="/user/permohonan_izin_belajar" class="btn btn-info">Status Permohonan</a>
            </div>
            <hr>
            <div class="card-body">
                <h6>Persyaratan Alih Tugas atau Mutasi</h6>
                <table class="table">
                    <tbody>
                      <tr>
                        <th>1</th>
                        <td>SK Mutasi/Surat Persetujuan Dari Bupati</td>
                      </tr>
                      <tr>
                        <th>2</th>
                        <td>Pengantar Dari Kepala OPD</td>
                      </tr>
                      <tr>
                        <th>3</th>
                        <td>SK Pangkat/Jabatan Terakhir</td>
                      </tr>
                      <tr>
                        <th>4</th>
                        <td>SKP 1 Tahun Terakhir</td>
                      </tr>
                      <tr>
                        <th>5</th>
                        <td>Daftar Hadir 3 Bulan Terakhir</td>
                      </tr>
                    </tbody>
                </table>
                <a href="/user/mutasi/create" class="btn btn-primary">Ajukan Permohonan</a>
                <a href="/user/mutasi" class="btn btn-info">Status Permohonan</a>
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