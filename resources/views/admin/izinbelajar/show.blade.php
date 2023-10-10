@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permohonan izin belajar</h1>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>DATA DIRI PERMOHONAN</h4>
              </div>
              <div class="card-body">
                  <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                      @csrf
                    <div class="form-group">
                      <label for="img">Photo</label>
                      <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url($izinbelajar->user->photo) }}" loading="lazy" alt="photo" width="100%" >
                      @error('img')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input id="name" type="text" class="form-control" name="name" tabindex="1" value="{{ $izinbelajar->user->nama }}">
                    </div>
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input id="nip" type="text" class="form-control" name="nip" tabindex="2" value="{{ $izinbelajar->user->nip }}">
                    </div>
                    <div class="form-group">
                      <label for="">Pangkat</label>
                      <input type="text" class="form-control" name="pangkat" tabindex="2" value="{{ $izinbelajar->user->pangkat }}">
                  </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" tabindex="2" value="{{ $izinbelajar->user->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="">Instansi</label>
                        <input type="text" class="form-control" name="instansi" tabindex="2" value="{{ $izinbelajar->user->instansi }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" tabindex="2" value="{{ $izinbelajar->user->email }}">
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">Mobile Number/WhatsApp</label>
                      <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ $izinbelajar->user->no_tlp }}">
                    </div>
                    <div class="form-group">
                        <label for="domisili">Domisili</label>
                        <textarea id="domisili" type="text" class="form-control @error('domisili') is-invalid @enderror" name="domisili" tabindex="5">{{ $izinbelajar->user->domisili }}</textarea>
                      </div>
                  </form>
                </div>
            </div>
          </div>
          <div class="col-md-8 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>Lampiran Permohonan Penerbitan Izin Belajar</h4>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <tbody>
                  <tr>
                    <th>1</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izinbelajar->lampiran1) }}" target="_blank"> Surat Pengantar Dari OPD</a></td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izinbelajar->lampiran2) }}" target="_blank"> SK Pangkat atau Jabatan Terakhir</a></td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izinbelajar->lampiran3) }}" target="_blank"> SKP 1 Tahun Terakhir</a></td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($izinbelajar->lampiran4) }}" target="_blank"> Daftar Hadir 3 Bulan Terakhir</a></td>
                  </tr>
                </tbody>
            </table>
            <div class="row">
            <form method="POST" onsubmit="return confirm('Yakin verifikasi data ini?')" action="/admin/permohonan_izin_belajar/update/{{ $izinbelajar->id }}">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-primary">VERIFIKASI PERMOHONAN</button>
            </form>
            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="ml-2 btn btn-info">TOLAK PERMOHONAN</button>
            </div>
            </div>
            </div>
          </div>
          </div>
      </div>
      </div>
    </section>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action="/admin/permohonan_izin_belajar/update/{{ $izinbelajar->id }}" method="POST">
      @method('PUT')
      @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Alasan Penolakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <textarea name="pesan"  class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
          <button type="submit" class="btn btn-primary">TOLAK</button>
        </div>
      </div>
    </form>  
    </div>
  </div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
@endpush