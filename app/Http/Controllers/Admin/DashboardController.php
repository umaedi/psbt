<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }

    public function __invoke(Request $request)
    {
        if (request()->ajax()) {
            dd('ok');
        }

        $data['izin_belajar'] = $this->permohonan->Query()->where('kategori', 'Permohonan izin belajar')->where('status', 'dalam antrian')->count();
        $data['izin_diproses'] = $this->permohonan->Query()->where('kategori', 'Permohonan izin belajar')->where('status', 'diproses')->count();
        $data['izin_diterima'] = $this->permohonan->Query()->where('kategori', 'Permohonan izin belajar')->where('status', 'diterima')->count();
        $data['izin_ditolak'] = $this->permohonan->Query()->where('kategori', 'Permohonan izin belajar')->where('status', 'ditolak')->count();

        $data['mutasi'] = $this->permohonan->Query()->where('kategori', 'Permohonan alih tugas')->where('status', 'dalam antrian')->count();
        $data['mutasi_diproses'] = $this->permohonan->Query()->where('kategori', 'Permohonan alih tugas')->where('status', 'diproses')->count();
        $data['mutasi_diterima'] = $this->permohonan->Query()->where('kategori', 'Permohonan alih tugas')->where('status', 'diterima')->count();
        $data['mutasi_ditolak'] = $this->permohonan->Query()->where('kategori', 'Permohonan alih tugas')->where('status', 'ditolak')->count();
        return view('admin.dashboard.index', $data);
    }
}
