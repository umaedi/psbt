<div class="appBottomMenu">
    <a href="/user/dashboard" class="item {{ Request::is('user/dashboard') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon><strong>Permohonan</strong>
        </div>
    </a>
    <a href="/user/izin" class="item {{ Request::is('user/izin') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="create-outline"></ion-icon><strong>TTE</strong>
        </div>
    </a>
    <a href="javascript:void()" data-toggle="modal" data-target="#modal-selfi"  class="item">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="finger-print-outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="/user/histories" class="item {{ Request::is('user/histories') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon><strong>Riwayat</strong>
        </div>
    </a>
    <a href="/user/profile" class="item {{ Request::is('user/profile') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="person-outline"></ion-icon><strong>Profil</strong>
        </div>
    </a>
</div>