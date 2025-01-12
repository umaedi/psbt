@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permohonan alih tugas</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Permohonan</div>
      </div>
      </div>
      <div class="section-body">
        @error('suratizin')
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Perhatian!</h4>
          <p>{{ $message }}</p>
        </div>             
        @enderror
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>DATA DIRI PEMOHON</h4>
              </div>
              <div class="card-body">
                  <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                      @csrf
                    <div class="form-group">
                      <label for="img">Photo</label>
                      <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url($mutasi->user->photo) }}" loading="lazy" alt="photo" width="100%" >
                      @error('img')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input id="name" type="text" class="form-control" name="name" tabindex="1" value="{{ $mutasi->user->nama }}">
                    </div>
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input id="nip" type="text" class="form-control" name="nip" tabindex="2" value="{{ $mutasi->user->nip }}">
                    </div>
                    <div class="form-group">
                      <label for="">Pangkat</label>
                      <input type="text" class="form-control" name="pangkat" tabindex="2" value="{{ $mutasi->user->pangkat }}">
                  </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" tabindex="2" value="{{ $mutasi->user->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="">Instansi</label>
                        <input type="text" class="form-control" name="instansi" tabindex="2" value="{{ $mutasi->user->instansi }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" tabindex="2" value="{{ $mutasi->user->email }}">
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">Mobile Number/WhatsApp</label>
                      <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ $mutasi->user->no_tlp }}">
                    </div>
                    <div class="form-group">
                        <label for="domisili">Domisili</label>
                        <textarea id="domisili" type="text" class="form-control @error('domisili') is-invalid @enderror" name="domisili" tabindex="5">{{ $mutasi->user->domisili }}</textarea>
                      </div>
                  </form>
                </div>
            </div>
          </div>
          <div class="col-md-8 mb-3">
            <div class="card mb-3">
              @if ($mutasi->status == 'diproses')
              <div class="alert alert-warning">Permohonan ini telah diverifikasi. Silakan upload surat balasan</div>
              @endif
              <div class="card-header">
                <h4>Informasi Status Permohonan Penerbitan Izin Alih Tugas atau Mutasi</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th scope="col">Tgl Pengajuan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Surat izin</th>
                  </tr>
              </thead>
                <tbody>
                  @if ($mutasi->status == 'dalam antrian')
                    <td>{{ \Carbon\Carbon::parse($mutasi->created_at)->isoFormat('D MMMM Y') }}</td>
                    <td><span class="badge badge-warning">Perlu Diproses</span></td>
                    <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan perlu diproses')">Download</button></td>
                  @elseif($mutasi->status == 'diproses')
                    <td>{{ \Carbon\Carbon::parse($mutasi->created_at)->isoFormat('D MMMM Y') }}</td>
                    <td><span class="badge badge-success">Diproses</span></td>
                    <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan sedang diproses!')">Download</button></td>
                    @elseif($mutasi->status == 'diterima')
                    <td>{{ \Carbon\Carbon::parse($mutasi->created_at)->isoFormat('D MMMM Y') }}</td>
                    <td><span class="badge badge-success">Diterima</span></td>
                    <td><a href="{{ route('surat_izin', ['folder' => 'mutasi', 'filename' => $mutasi->suratizin]) }}" target="_blank"><span class="btn btn-info btn-sm">Download</span></a></td>
                  @else
                    <td>{{ \Carbon\Carbon::parse($mutasi->created_at)->isoFormat('D MMMM Y') }}</td>
                    <td><span class="badge badge-danger">Ditolak</span></td>
                    <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan ditolak!')">Download</button></td>
                  @endif
                </tbody>
              </table>
            </div>
            </div>
            
            <div class="card">
              <div class="card-header">
                <h4>Lampiran Permohonan Penerbitan Izin Alih Tugas Atau Mutasi</h4>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <tbody>
                  <tr>
                    <th>1</th>
                    <td><a href="{{ route('lampiran', ['folder' => 'mutasi', 'year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran1]) }}" target="_blank"> SK Mutasi/Surat Persetujuan Dari Bupati</a></td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td><a href="{{ route('lampiran', ['folder' => 'mutasi', 'year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran2]) }}" target="_blank"> Surat Pengantar Dari OPD</a></td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td><a href="{{ route('lampiran', ['folder' => 'mutasi', 'year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran3]) }}" target="_blank"> SK Pangkat atau Jabatan Terakhir</a></td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td><a href="{{ route('lampiran', ['folder' => 'mutasi', 'year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran4]) }}" target="_blank"> SKP 1 Tahun Terakhir</a></td>
                  </tr>
                  <tr>
                    <th>5</th>
                    <td><a href="{{ route('lampiran', ['folder' => 'mutasi', 'year' => $mutasi->created_at->format('Y'), 'filename' => $mutasi->lampiran5]) }}" target="_blank"> Daftar Hadir 3 Bulan Terakhir</a></td>
                  </tr>
                </tbody>
            </table>
            <div class="row">
            @if ($mutasi->status == 'dalam antrian')
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#uploadFile">TERIMA, DAN UNGGAH SURAT BALASAN</button>
            <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="ml-2 btn btn-warning">TOLAK PERMOHONAN</button>
            @endif
            @if ($mutasi->status == 'diproses')
                
            @endif
            </div>
            </div>
            </div>
            @if ($mutasi->status == 'ditolak')
            <div class="card mt-3">
              <div class="card-header">
                <h4>Alasan Penolakan</h4>
            </div>
            <div class="card-body">
              <textarea class="form-control">{{ $mutasi->pesan }}</textarea>
            </div>
            </div>
            @endif
          </div>
          </div>
      </div>
      </div>
    </section>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action="/admin/mutasi/update/{{ $mutasi->id }}" method="POST">
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
          <input type="hidden" name="status" value="ditolak">
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
<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action="/admin/mutasi/update/{{ $mutasi->id }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Unggah Surat Balasan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="status" value="diterima">
          <input type="file" name="suratizin" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
          <button type="submit" class="btn btn-primary">UNGGAH</button>
        </div>
      </div>
    </form>  
  </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
@endpush