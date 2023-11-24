<div class="appBottomMenu">
    <a href="/super_admin/permohonan" class="item {{ Request::is('super_admin/permohonan') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon><strong>Permohonan</strong>
        </div>
    </a>
    <a href="/super_admin/permohonan/signed" class="item {{ Request::is('super_admin/permohonan/signed') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="create-outline"></ion-icon><strong>TTE</strong>
        </div>
    </a>
    <a href="/super_admin/permohonan/waiting_sign" data-toggle="modal" class="item">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="finger-print-outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="/super_admin/permohonan/rejected" class="item {{ Request::is('super_admin/permohonan/rejected') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon><strong>Ditolak</strong>
        </div>
    </a>
    <a href="/user/profile" class="item {{ Request::is('user/profile') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="person-outline"></ion-icon><strong>Profil</strong>
        </div>
    </a>
</div>