<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\PermohonanService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MutasiController extends Controller
{
    public $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('user_id', auth()->user()->id)->where('kategori', 'Permohonan alih tugas')->get();
            return view('mutasi._data_table', $data);
        }
        return view('mutasi.index');
    }

    public function create()
    {
        $data['title'] = 'Formulir Permohonan Alih Tugas atau Mutasi';
        return view('mutasi.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lampiran1' => 'required|mimes:pdf|max:2048',
            'lampiran2' => 'required|mimes:pdf|max:2048',
            'lampiran3' => 'required|mimes:pdf|max:2048',
            'lampiran4' => 'required|mimes:pdf|max:2048',
            'lampiran5' => 'required|mimes:pdf|max:2048',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['kategori'] = 'Permohonan alih tugas';
        $randomName = Str::random(16);

        $lampiran1 = $request->file('lampiran1');
        $newLampiran1 = Str::replace(' ', '_',  strtolower(auth()->user()->nama . '_sk_mutasi_surat_persetujuan_dari_bupati_' . $randomName . '.' . $lampiran1->getClientOriginalExtension()));
        $data['lampiran1'] = $lampiran1->storeAs('public/lampiran/mutasi/'.date('Y'), $newLampiran1);

        $lampiran2 = $request->file('lampiran2');
        $newLampiran2 = Str::replace(' ', '_', strtolower(auth()->user()->nama . '_pengantar_dari_kepala_opd_' . $randomName . '.' . $lampiran2->getClientOriginalExtension()));
        $data['lampiran2'] = $lampiran2->storeAs('public/lampiran/mutasi/'.date('Y'), $newLampiran2);

        $lampiran3 = $request->file('lampiran3');
        $newLampiran3 = Str::replace(' ', '_', strtolower(auth()->user()->nama . '_sk_pangkat_jabatan_terakhir_' . $randomName . '.' . $lampiran3->getClientOriginalExtension()));
        $data['lampiran3'] = $lampiran3->storeAs('public/lampiran/mutasi/'.date('Y'), $newLampiran3);

        $lampiran4 = $request->file('lampiran4');
        $newLampiran4 = Str::replace(' ', '_', strtolower(auth()->user()->nama . '_skp_1_tahun_terakhir_' . $randomName . '.' . $lampiran4->getClientOriginalExtension()));
        $data['lampiran4'] = $lampiran4->storeAs('public/lampiran/mutasi/'.date('Y'), $newLampiran4);

        $lampiran5 = $request->file('lampiran5');
        $newLampiran5 = Str::replace(' ', '_', strtolower(auth()->user()->nama . '_daftar_hadir_3_bulan_terakhir_' . $randomName . '.' . $lampiran5->getClientOriginalExtension()));
        $data['lampiran5'] = $lampiran5->storeAs('public/lampiran/mutasi/'.date('Y'), $newLampiran5);

        DB::beginTransaction();
        try {
            $this->permohonan->store($data);
        } catch (\Throwable $th) {
            saveLogs($th->getMessage(), 'error!');
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect('/user/mutasi')->with('msg_mutasi', 'Permohonan Alih Tugas atau Mutasi berhasil terkirim');
    }

    public function show($id)
    {
        $data['title'] = 'Permohonan Alih Tugas atau Mutasi';
        $data['mutasi'] = $this->permohonan->find($id);
        return view('mutasi.show', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Permohonan Alih Tugas atau Mutasi';
        $data['mutasi'] = $this->permohonan->find($id);
        return view('mutasi.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if(!$request->except('_token')) {
            return \back()->with('msg_mutasi', 'Tidak ada file yang dipilih!');
        }

        $request->validate([
            'lampiran1' => 'mimes:pdf|max:2048',
            'lampiran2' => 'mimes:pdf|max:2048',
            'lampiran3' => 'mimes:pdf|max:2048',
            'lampiran4' => 'mimes:pdf|max:2048',
            'lampiran5' => 'mimes:pdf|max:2048',
        ]);

        $mutasi = $this->permohonan->find($id);

        $data['user_id'] = Auth::user()->id;
        $data['kategori'] = 'Permohonan alih tugas';
        $randomName = Str::random(16);

        if($request->hasFile('lampiran1')) {
            $lampiran1 = $request->file('lampiran1');
            $newLampiran1 = Str::replace(' ', '_',  strtolower(auth()->user()->nama . '_sk_mutasi_surat_persetujuan_dari_bupati_' . $randomName . '.' . $lampiran1->getClientOriginalExtension()));
            $data['lampiran1'] = $lampiran1->storeAs('public/lampiran/mutasi/'.$mutasi->created_at->format('Y'), $newLampiran1);
            Storage::delete($mutasi->lampiran1);
        }

        if($request->hasFile('lampiran2')) {
            $lampiran2 = $request->file('lampiran2');
            $newLampiran2 = Str::replace(' ', '_', strtolower(auth()->user()->nama . '_pengantar_dari_kepala_opd_' . $randomName . '.' . $lampiran2->getClientOriginalExtension()));
            $data['lampiran2'] = $lampiran2->storeAs('public/lampiran/mutasi/'.$mutasi->created_at->format('Y'), $newLampiran2);
            Storage::delete($mutasi->lampiran1);
        }

        if($request->hasFile('lampiran3')) {
            $lampiran3 = $request->file('lampiran3');
            $newLampiran3 = Str::replace(' ', '_', strtolower(auth()->user()->nama . '_sk_pangkat_jabatan_terakhir_' . $randomName . '.' . $lampiran3->getClientOriginalExtension()));
            $data['lampiran3'] = $lampiran3->storeAs('public/lampiran/mutasi/'.$mutasi->created_at->format('Y'), $newLampiran3);
            Storage::delete($mutasi->lampiran3);
        }

        if($request->hasFile('lampiran4')) {
            $lampiran4 = $request->file('lampiran4');
            $newLampiran4 = Str::replace(' ', '_', strtolower(auth()->user()->nama . '_skp_1_tahun_terakhir_' . $randomName . '.' . $lampiran4->getClientOriginalExtension()));
            $data['lampiran4'] = $lampiran4->storeAs('public/lampiran/mutasi/'.$mutasi->created_at->format('Y'), $newLampiran4);
            Storage::delete($mutasi->lampiran4);
        }
      
        if($request->hasFile('lampiran5')) {
            $lampiran5 = $request->file('lampiran5');
            $newLampiran5 = Str::replace(' ', '_', strtolower(auth()->user()->nama . '_daftar_hadir_3_bulan_terakhir_' . $randomName . '.' . $lampiran5->getClientOriginalExtension()));
            $data['lampiran5'] = $lampiran5->storeAs('public/lampiran/mutasi/'.$mutasi->created_at->format('Y'), $newLampiran5);
            Storage::delete($mutasi->lampiran5);
        }

        if($mutasi->status == 'ditolak') {
            $data['status'] = "dalam antrian";
            try {
                $this->permohonan->update($id, $data);
            } catch (\Throwable $th) {
                saveLogs($th->getMessage(), 'error!');
                DB::rollBack();
                throw $th;
            }
            return redirect('/user/mutasi')->with('msg_mutasi', 'Permohonan Alih Tugas atau Mutasi berhasil diperbaharui');
        }
        \abort(404);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->permohonan->softDelete($id);
        } catch (\Throwable $th) {
            saveLogs($th->getMessage(), 'error!');
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect('/user/mutasi')->with('msg_mutasi', 'Permohonan Alih Tugas atau Mutasi berhasil dihpaus!');
    }
}
