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
                Profil Pemohon
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
    
            <div class="section mt-3 text-center">
                <div class="avatar-section">
                    <a href="#">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($user->photo) }}" alt="avatar" class="imaged w100 rounded">
                        <span class="button">
                            <ion-icon name="camera-outline"></ion-icon>
                        </span>
                    </a>
                </div>
            </div>
    
            <div class="section mt-2 mb-2">
                <div class="section-title">Profile Pemohon</div>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="text4b">Nama</label>
                                    <input type="text" class="form-control" id="text4b" placeholder="{{ $user->nama }}">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
    
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="email4b">NIP</label>
                                    <input type="text" class="form-control" id="email4b" placeholder="{{ $user->nip }}">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="email4b">Pangkat</label>
                                    <input type="text" class="form-control" id="email4b" placeholder="{{ $user->pangkat }}">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="email4b">Jabatan</label>
                                    <input type="text" class="form-control" id="email4b" placeholder="{{ $user->jabatan }}">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="email4b">Instansi</label>
                                    <input type="text" class="form-control" id="email4b" placeholder="{{ $user->instansi }}">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="email4b">Email</label>
                                    <input type="text" class="form-control" id="email4b" placeholder="{{ $user->email }}">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="phone4b">No Tlp</label>
                                    <input type="tel" class="form-control" id="phone4b" placeholder="{{ $user->no_tlp }}">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
    
                            <div class="form-group boxed">
                                <div class="input-wrapper">
                                    <label class="label" for="textarea4b">Textarea</label>
                                    <textarea id="textarea4b" rows="2" class="form-control"
                                        placeholder="Textarea">{{ $user->domisili }}</textarea>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
        <!-- * App Capsule -->
@endsection