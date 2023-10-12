<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\IzinbelajarService;
use Illuminate\Support\Facades\Storage;

class IzinBelajarController extends Controller
{
    private $izinbelajar;
    public function __construct(IzinbelajarService $izinbelajarService)
    {
        $this->izinbelajar = $izinbelajarService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $izinbelajar = $this->izinbelajar->Query();
            $page = request()->get('pagination', 10);

            if (request()->q) {
                $izinbelajar->whereHas('user', function ($query) {
                    $query->where('nama', 'like', '%' . request()->q . '%');
                });
            }

            $data['table'] = $izinbelajar->with('user')->where('status', request()->index)->paginate($page);
            return view('admin.izinbelajar._data_table', $data);
        }

        $data['title'] = 'Permohonan Izin Belajar';
        return view('admin.izinbelajar.index', $data);
    }

    public function show($id)
    {
        $data['izinbelajar'] = $this->izinbelajar->find($id);
        $data['title'] = 'Permohonan Izin Belajar';
        return view('admin.izinbelajar.show', $data);
    }

    public function update(Request $request, $id)
    {

        if ($request->status == '1') {
            $status = '1';
            $redirect = '/admin/permohonan_izin_belajar?index=1';
        } elseif ($request->status == '2') {
            $status = '2';
            $suratizin = $request->file('suratizin')->store('public/surat_izin');
            $redirect = '/admin/permohonan_izin_belajar?index=2';
        } else {
            $status = '3';
            $redirect = '/admin/permohonan_izin_belajar?index=3';
        }

        DB::beginTransaction();
        try {
            $this->izinbelajar->update($id, $status, $pesan ?? '', $suratizin ?? '');
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();
        return redirect($redirect)->with('msg_success', 'Status Permohonan Izin Belajar Berhasil Diperbaharui');
    }
}
