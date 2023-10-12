<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\IzinbelajarService;
use App\Services\MutasiService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private $izinbelajar;
    private $mutasi;
    public function __construct(IzinbelajarService $izinbelajarService, MutasiService $mutasiService)
    {
        $this->izinbelajar = $izinbelajarService;
        $this->mutasi = $mutasiService;
    }

    public function __invoke(Request $request)
    {
        if (request()->ajax()) {
            dd('ok');
        }

        $data['izin_belajar'] = $this->izinbelajar->Query()->whereNull('status')->count();
        $data['izin_diproses'] = $this->izinbelajar->Query()->where('status', '1')->count();
        $data['izin_diterima'] = $this->izinbelajar->Query()->where('status', '2')->count();
        $data['izin_ditolak'] = $this->izinbelajar->Query()->where('status', '3')->count();

        $data['mutasi'] = $this->mutasi->Query()->whereNull('status')->count();
        $data['mutasi_diproses'] = $this->mutasi->Query()->where('status', '1')->count();
        $data['mutasi_diterima'] = $this->mutasi->Query()->where('status', '2')->count();
        $data['mutasi_ditolak'] = $this->mutasi->Query()->where('status', '3')->count();
        return view('admin.dashboard.index', $data);
    }
}
