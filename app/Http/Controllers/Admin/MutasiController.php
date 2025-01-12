<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\PermohonanService;

class MutasiController extends Controller
{
    private $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $mutasi = $this->permohonan->Query();
            $page = request()->get('pagination', 10);

            if (request()->q) {
                $mutasi->whereHas('user', function ($query) {
                    $query->where('nama', 'like', '%' . request()->q . '%');
                });
            }

            $data['table'] = $mutasi->with('user')->where('kategori', 'Permohonan alih tugas')->where('status', \request()->index)->paginate($page);
            return view('admin.mutasi._data_table', $data);
        }

        $title = 'Permohonan Mutasi';
        return view('admin.mutasi.index', compact('title'));
    }

    public function show($id)
    {
        $data['title'] = 'Permohonan Mutasi';
        $data['mutasi'] = $this->permohonan->find($id);
        return view('admin.mutasi.show', $data);
    }

    public function update(Request $request, $id)
    {
        $mutasi = $this->permohonan->find($id);
        if ($request->status == 'diproses') {
            $data['status'] = 'diproses';
            $redirect = 'admin/mutasi?index=diproses';
        } elseif ($request->status == 'diterima') {
            $request->validate([
                'suratizin' => 'required|mimes:pdf|max:2045'
            ]);

            $data['status'] = 'diterima';
            
            $pathFile = 'lampiran/surat_izin/mutasi';
            $fileName = uniqid() . '_surat_izin_alih_tugas_atau_mutasi_' . str_replace(' ', '_', $mutasi->user->nama) . '.pdf';
            $request->file('suratizin')->storeAs($pathFile, $fileName, 's3');
            $data['suratizin'] = $fileName;
            
            $redirect = 'admin/mutasi?index=diterima';
        } else {
            $data['status'] = 'ditolak';
            $redirect = 'admin/mutasi?index=ditolak';
            $data['pesan'] = $request->pesan;
        }

        DB::beginTransaction();
        try {
            $this->permohonan->update($id, $data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return;
        }
        DB::commit();
        return redirect($redirect)->with('msg_success', 'Status Permohonan Izin Mutasi Berhasil Diperbaharui');
    }
}
