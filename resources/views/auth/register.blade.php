@extends('layouts.app')
@section('content')
<main role="main" class="container">
   <div class="my-3 p-3 bg-white rounded">
     <h6 class="border-bottom border-gray mb-3 pb-2 mb-0">Formulir Pendafataran</h6>
       <form action="/register" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
             <div class="col-md-3">
               <div class="card">
                 <div class="card-body">
                   <img id="imgPrev" src="{{ asset('img/avatar-1.png') }}" alt="photo" width="100%">
                 </div>
               </div>
             </div>
             <div class="col-md-9">
               <div class="card">
                 <div class="card-body">
                   <div class="form-group mb-3">
                     <label for="photo">Photo</label>
                     <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" onchange="previewImg()" accept=".png, .jpg, .jpeg" id="image">
                     @error('photo')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
                 <div class="form-group">
                     <label for="name">Nama Lengkap</label>
                     <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" name="nama" value="{{ old('nama') }}">
                     @error('nama')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
                 </div>
               </div>
             </div>
           </div>
             <div class="form-group my-3">
               <label for="nip">NIP</label>
               <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip') }}">
               @error('nip')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="pangkat">Pangkat/Golongan</label>
               <input type="text" class="form-control @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat" value="{{ old('pangkat') }}">
               @error('pangkat')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="jabatan">Jabatan</label>
               <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
               @error('jabatan')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="instansi">Instansi</label>
               <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi" name="instansi" value="{{ old('instansi') }}">
               @error('instansi')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="no_tlp">No Telpon Aktif</label>
               <input type="number" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" value="{{ old('no_tlp') }}">
               @error('no_tlp')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="domisili">Domisili</label>
               <textarea type="text" class="form-control @error('domisili') is-invalid @enderror" id="domisili" name="domisili">{{ old('domisili') }}</textarea>
               @error('domisili')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="email">Alamat Email</label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
               @error('email')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="password">Password (Minimal 6 karakter)</label>
               <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
               @error('password')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="password">Konfirmasi Password</label>
               <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" name="password_confirmation">
               @error('password_confirmation')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             @include('layouts._loading')
             <button id="btn_submit" type="submit" class="w-btn-round w-btn-round-header mb-3">DAFTAR</button>
          </div>
       </form>
    </div>
   </div>
 </main>  
@endsection

      
    


