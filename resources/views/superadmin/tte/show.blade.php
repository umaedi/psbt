@extends('layouts.superadmin')
@section('content')
      <!-- App Header -->
      <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Transactions
        </div>
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a>
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Transactions -->
        <div class="section mt-2">
            <div class="section-title">Detail Permohonan</div>
            <div class="transactions">
                <!-- item -->
                <a href="app-transaction-detail.html" class="item">
                    <div class="detail">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->user->photo) }}" alt="img" class="image-block imaged w48">
                        <div>
                            <strong>{{ $permohonan->user->nama }}</strong>
                            <p>{{ $permohonan->kategori }}</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger"> - $ 150</div>
                    </div>
                </a>
                <!-- * item -->
            </div>
        </div>
        <div class="section inset mt-1">
            <div class="section-title">Lampiran</div>
            <div class="accordion" id="accordionExample1">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion01">
                            SK Mutasi Atau Surat Persetujuan Bupati
                        </button>
                    </h2>
                    <div id="accordion01" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"  height="1000px"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion02">
                            Pengantar Dari Kepala OPD
                        </button>
                    </h2>
                    <div id="accordion02" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion03">
                            SK Pangkat Atau Jabatan Terakhir
                        </button>
                    </h2>
                    <div id="accordion03" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion04">
                            SKP 1 Tahun Terakhir
                        </button>
                    </h2>
                    <div id="accordion04" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion05">
                            Daftar Hadir 3 Bulan Terakhir
                        </button>
                    </h2>
                    <div id="accordion05" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- * Transactions -->

        <div class="section mt-2 mb-2">
            <a href="javascript:;" class="btn btn-primary btn-block btn-lg">Tanda Tangani</a>
        </div>


    </div>
    <!-- * App Capsule -->
@endsection