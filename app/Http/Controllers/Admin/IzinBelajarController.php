<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\IzinbelajarService;

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
            $page = request()->get('pagination', 10);
            $data['table'] = $this->izinbelajar->Query()->with('user')->whereNull('status')->paginate($page);
            return view('admin.izinbelajar._data_table', $data);
        }
    }

    public function show($id)
    {
        $data['izinbelajar'] = $this->izinbelajar->find($id);
        $data['title'] = 'Permohonan Izin Belajar';
        return view('admin.izinbelajar.show', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->pesan) {
            $status = '3';
            $pesan = $request->pesan;
        } else {
            $status = '1';
            $pesan = '';
        }

        DB::beginTransaction();
        try {
            $this->izinbelajar->update($id, $status, $pesan);
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();
        return redirect('/permohonan_izin_belajar')->with('msg_success', 'Permohonan Izin Belajar Berhasil Dikonfirmasi');
    }
}
