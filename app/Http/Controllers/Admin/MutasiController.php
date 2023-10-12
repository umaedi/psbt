<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\MutasiService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MutasiController extends Controller
{
    private $mutasi;
    public function __construct(MutasiService $mutasiService)
    {
        $this->mutasi = $mutasiService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $mutasi = $this->mutasi->Query();
            $page = request()->get('pagination', 10);

            if (request()->q) {
                $mutasi->whereHas('user', function ($query) {
                    $query->where('nama', 'like', '%' . request()->q . '%');
                });
            }

            $data['table'] = $mutasi->with('user')->where('status', request()->index)->paginate($page);
            return view('admin.mutasi._data_table', $data);
        }

        $title = 'Permohonan Mutasi';
        return view('admin.mutasi.index', compact('title'));
    }

    public function show($id)
    {
        $data['title'] = 'Permohonan Mutasi';
        $data['mutasi'] = $this->mutasi->find($id);
        return view('admin.mutasi.show', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->status == '1') {
            $status = '1';
            $redirect = '/admin/mutasi?index=1';
        } elseif ($request->status == '2') {
            $status = '2';
            $suratizin = $request->file('suratizin')->store('public/surat_izin');
            $redirect = '/admin/mutasi?index=2';
        } else {
            $status = '3';
            $redirect = '/admin/mutasi?index=3';
            $pesan = $request->pesan;
        }

        DB::beginTransaction();
        try {
            $this->mutasi->update($id, $status, $pesan ?? '', $suratizin ?? '');
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();
        return redirect($redirect)->with('msg_success', 'Status Permohonan Izin Mutasi Berhasil Diperbaharui');
    }
}
