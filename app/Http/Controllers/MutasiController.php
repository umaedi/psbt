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
        $mutasi = $this->permohonan->Query()->where('user_id', auth()->user()->id)->where('kategori', 'Permohonan alih tugas')->latest()->first();
        if($mutasi && $mutasi->status !== 'diterima') {
            return redirect('/user/dashboard')->with('error', 'Mohon maaf untuk saat ini Anda belum bisa mengajukan permohonan alih tugas atau mutasi, karena ada permohonan sebelumnya yang belum selesai!');
        }

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

        $fileName1 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_sk_mutasi_surat_persetujuan_dari_bupati' . '.pdf';
        $pathFile = 'lampiran/mutasi/'. date('Y');
        $request->file('lampiran1')->storeAs($pathFile, $fileName1, 's3');
        $data['lampiran1'] = $fileName1;

        $fileName2 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_pengantar_dari_kepala_opd' . '.pdf';
        $pathFile = 'lampiran/mutasi/'. date('Y');
        $request->file('lampiran2')->storeAs($pathFile, $fileName2, 's3');
        $data['lampiran2'] = $fileName2;

        $fileName3 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_sk_pangkat_jabatan_terakhir' . '.pdf';
        $pathFile = 'lampiran/mutasi/'. date('Y');
        $request->file('lampiran3')->storeAs($pathFile, $fileName3, 's3');
        $data['lampiran3'] = $fileName3;

        $fileName4 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_skp_1_tahun_terakhir' . '.pdf';
        $pathFile = 'lampiran/mutasi/'. date('Y');
        $request->file('lampiran4')->storeAs($pathFile, $fileName4, 's3');
        $data['lampiran4'] = $fileName4;

        $fileName5 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_daftar_hadir_3_bulan_terakhir' . '.pdf';
        $pathFile = 'lampiran/mutasi/'. date('Y');
        $request->file('lampiran5')->storeAs($pathFile, $fileName5, 's3');
        $data['lampiran5'] = $fileName5;

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
            $fileName1 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_sk_mutasi_surat_persetujuan_dari_bupati' . '.pdf';
            $pathFile = 'lampiran/mutasi/'. $mutasi->created_at->format('Y');
            $request->file('lampiran1')->storeAs($pathFile, $fileName1, 's3');
            $data['lampiran1'] = $fileName1;
            Storage::disk('s3')->delete('lampiran/mutasi/'.$mutasi->created_at->format('Y').'/'.$mutasi->lampiran1);
        }

        if($request->hasFile('lampiran2')) {
            $fileName2 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_pengantar_dari_kepala_opd' . '.pdf';
            $pathFile = 'lampiran/mutasi/'. $mutasi->created_at->format('Y');
            $request->file('lampiran2')->storeAs($pathFile, $fileName2, 's3');
            $data['lampiran2'] = $fileName2;
            Storage::disk('s3')->delete('lampiran/mutasi/'.$mutasi->created_at->format('Y').'/'.$mutasi->lampiran2);
        }

        if($request->hasFile('lampiran3')) {
            $fileName3 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_sk_pangkat_jabatan_terakhir' . '.pdf';
            $pathFile = 'lampiran/mutasi/'. $mutasi->created_at->format('Y');
            $request->file('lampiran3')->storeAs($pathFile, $fileName3, 's3');
            $data['lampiran3'] = $fileName3;
            Storage::disk('s3')->delete('lampiran/mutasi/'.$mutasi->created_at->format('Y').'/'.$mutasi->lampiran3);
        }

        if($request->hasFile('lampiran4')) {
            $fileName4 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_skp_1_tahun_terakhir' . '.pdf';
            $pathFile = 'lampiran/mutasi/'. $mutasi->created_at->format('Y');
            $request->file('lampiran4')->storeAs($pathFile, $fileName4, 's3');
            $data['lampiran4'] = $fileName4;
            Storage::disk('s3')->delete('lampiran/mutasi/'.$mutasi->created_at->format('Y').'/'.$mutasi->lampiran4);
        }
      
        if($request->hasFile('lampiran5')) {
            $fileName5 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_daftar_hadir_3_bulan_terakhir' . '.pdf';
            $pathFile = 'lampiran/mutasi/'. date('Y');
            $request->file('lampiran5')->storeAs($pathFile, $fileName5, 's3');
            $data['lampiran5'] = $fileName5;
            Storage::disk('s3')->delete('lampiran/mutasi/'.$mutasi->created_at->format('Y').'/'.$mutasi->lampiran5);
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
