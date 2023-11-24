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
       List Permohonan Telah TTE
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
    <div class="section mt-2" id="content">
        <div class="section-title">List Permohonan Telah TTE</div>
        <div class="transactions" id="dataTable">
            <!-- item -->
            <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Tunggu sebentar yah...
            </button>
            <!-- * item -->
        </div>
    </div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(async function loadTable() {
            var param = {
                url: '/super_admin/permohonan/rejected',
                method: 'GET',
                data: {
                    load: 'table'
                }
            }
            
            await transAjax(param).then((result) => {
                $('#dataTable').html(result);
            }).catch((err) => {
                $('#content').addClass('d-none');
                initToast('Mohon Maaf', 'Terjadi kesalahan pada sisi server/client.', 'warning', 'Silahkan coba lagi nanti')
            });
        });
    </script>
@endpush