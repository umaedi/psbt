@extends('layouts.app')
@section('content')
<body class="bg-light">
   <img src="{{ asset('img') }}/hero/banner.png" loading="lazy" class="img-fluid" alt="Responsive image">
   <main role="main" class="container">
    <div class="d-flex align-items-center p-3 mt-3 text-white-50 bg-primary rounded box-shadow">
       <div class="lh-100">
         <h5 class="mb-0 text-white lh-100">Permohonan Surat Bebas Temuan</h5>
       </div>
     </div>
     <div class="row">
       <div class="col-md-8">
         <div class="my-3 p-3 bg-white rounded box-shadow">
           <h6 class="border-bottom border-gray pb-2 mb-3">Persyaratan Penerbitan Izin Belajar</h6>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">1. Surat Pengantar Dari OPD</li>
             <li class="list-group-item">2. SK Pangkat Atau Jabatan Terakhir</li>
             <li class="list-group-item">3. SKP 1 Tahun Terakhir</li>
             <li class="list-group-item">4. Daftar Hadir 3 Bulan Terakhir</li>
           </ul>
         </div>
         <div class="my-3 p-3 bg-white rounded box-shadow">
           <h6 class="border-bottom border-gray pb-2 mb-3">Persyaratan Penerbitan Alih Tugas Atau Mutasi</h6>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">1. SK Mutasi Atau Surat Persetujuan Bupati</li>
             <li class="list-group-item">2. Pengantar Dari Kepala OPD</li>
             <li class="list-group-item">3. SK Pangkat Atau Jabatan Terakhir</li>
             <li class="list-group-item">4. SKP 1 Tahun Terakhir</li>
             <li class="list-group-item">5. Daftar Hadir 3 Bulan Terakhir</li>
           </ul>
         </div>
       </div>
 
     <div class="col-md-4">
       <div class="my-3 p-3 bg-white rounded box-shadow">
           <h6>Alur Permohonan</h6>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">1. Pemohon melakukan pendaftaran</li>
             <li class="list-group-item">2. Pemohon mengajukan permohonan</li>
             <li class="list-group-item">3. Permohonan diverifikasi oleh admin</li>
             <li class="list-group-item">4. Permohonan dikonfirmmasi</li>
             <li class="list-group-item">5. Surat izin diterbitkan</li>
           </ul>
          </div>
          <a href="/register" class="btn btn-primary">DAFTAR SEKARANG</a>
          <a href="/login" class="btn btn-primary">LOGIN</a>
       <div class="my-3 p-3 bg-white rounded box-shadow">
           <h6>Kontak Kami</h6>
           <ul class="list-group list-group-flush">
             <li class="list-group-item" >Iwan : <span class="font-weight-bold"><a style="text-decoration: none" href="https://api.whatsapp.com/send?phone=6281315100557" target="_blank">081315100557</a></span></li>
             <li class="list-group-item">Email: <a style="text-decoration: none" href="mailto:"kobi.biologi@gmail.com>inspektorattuba@gmail.com</a></span></li>
           </ul>
       </div>
     </div>
   </div>
   </main>
   @stack('js')
 </body> 
@endsection