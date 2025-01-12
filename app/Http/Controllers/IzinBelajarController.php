<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\ProcessLampiran;
use Illuminate\Support\Facades\DB;
use App\Services\PermohonanService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IzinBelajarController extends Controller
{
    private $permohonan;
    public function __construct(PermohonanService $permohonananService)
    {
        $this->permohonan = $permohonananService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('user_id', auth()->user()->id)->where('kategori', 'Permohonan izin belajar')->get();
            return view('izinbelajar._data_table', $data);
        }

        $data['title'] = "Permohonan izin belajar";
        return view('izinbelajar.index', $data);
    }

    public function create()
    {
        $izin_belajar = $this->permohonan->Query()->where('user_id', auth()->user()->id)->where('kategori', 'Permohonan izin belajar')->latest()->first();
        if($izin_belajar && $izin_belajar->status !== 'diterima') {
            return redirect('/user/dashboard')->with('error', 'Mohon maaf untuk saat ini Anda belum bisa mengajukan permohonan izin belajar, karena ada permohonan sebelumnya yang belum selesai!');
        }

        $data['title'] = 'Permohonan izin belajar';
        return view('izinbelajar.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lampiran1' => 'required|mimes:pdf|max:2048',
            'lampiran2' => 'required|mimes:pdf|max:2048',
            'lampiran3' => 'required|mimes:pdf|max:2048',
            'lampiran4' => 'required|mimes:pdf|max:2048',
        ]);

        $data['user_id'] = Auth::id();
        $data['kategori'] = 'Permohonan izin belajar';

        $fileName1 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_surat_pengantar_dari_opd' . '.pdf';
        $pathFile = 'lampiran/izin_belajar/'. date('Y');
        $request->file('lampiran1')->storeAs($pathFile, $fileName1, 's3');
        $data['lampiran1'] = $fileName1;

        $fileName2 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_sk_pangkat_atau_jabatan_terakhir_' . '.pdf';
        $pathFile = 'lampiran/izin_belajar/'. date('Y');
        $request->file('lampiran2')->storeAs($pathFile, $fileName2, 's3');
        $data['lampiran2'] = $fileName2;

        $fileName3 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_skp_1_tahun_terakhir_' . '.pdf';
        $pathFile = 'lampiran/izin_belajar/'. date('Y');
        $request->file('lampiran3')->storeAs($pathFile, $fileName3, 's3');
        $data['lampiran3'] = $fileName3;

        $fileName4 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_daftar_hadir_3_bulan_terakhir_' . '.pdf';
        $pathFile = 'lampiran/izin_belajar/'. date('Y');
        $request->file('lampiran4')->storeAs($pathFile, $fileName4, 's3');
        $data['lampiran4'] = $fileName4;

        try {
            $this->permohonan->store($data);
        } catch (\Throwable $th) {
            saveLogs($th->getMessage(), 'error');
            DB::rollBack();
        }

        return redirect('/user/permohonan_izin_belajar')->with('msg_izin_belajar', 'Permohonan izin belajar berhasil terkirim');
    }

    public function edit($id)
    {
        $data['izin_belajar'] = $this->permohonan->find($id);
        $data['title'] = "Permohonan izin belajar";
        return view('izinbelajar.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if(!$request->except('_token')) {
           return \back()->with('msg', 'Tidak ada file yang dipilih!');
        }

        $request->validate([
            'lampiran1' => 'mimes:pdf|max:2048',
            'lampiran2' => 'mimes:pdf|max:2048',
            'lampiran3' => 'mimes:pdf|max:2048',
            'lampiran4' => 'mimes:pdf|max:2048',
        ]);
        
        $izin_belajar = $this->permohonan->find($id);

        $data['user_id'] = Auth::user()->id;

        if($request->hasFile('lampiran1')) {
            $fileName1 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_surat_pengantar_dari_opd' . '.pdf';
            $pathFile = 'lampiran/izin_belajar/'. date('Y');
            $request->file('lampiran1')->storeAs($pathFile, $fileName1, 's3');
            Storage::disk('s3')->delete('lampiran/izin_belajar/'. $izin_belajar->created_at->format('Y') . '/'. $izin_belajar->lampiran1);
            $data['lampiran1'] = $fileName1;
        }

        if($request->hasFile('lampiran2')) {
            $fileName2 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_sk_pangkat_atau_jabatan_terakhir_' . '.pdf';
            $pathFile = 'lampiran/izin_belajar/'. date('Y');
            $request->file('lampiran2')->storeAs($pathFile, $fileName2, 's3');
            Storage::disk('s3')->delete('lampiran/izin_belajar/'. $izin_belajar->created_at->format('Y') . '/'. $izin_belajar->lampiran2);
            $data['lampiran2'] = $fileName2;
        }

        if($request->hasFile('lampiran3')) {
            $fileName3 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_skp_1_tahun_terakhir_' . '.pdf';
            $pathFile = 'lampiran/izin_belajar/'. date('Y');
            $request->file('lampiran3')->storeAs($pathFile, $fileName3, 's3');   
            Storage::disk('s3')->delete('lampiran/izin_belajar/'. $izin_belajar->created_at->format('Y') . '/'. $izin_belajar->lampiran3);
            $data['lampiran3'] = $fileName3;
        }

        if($request->hasFile('lampiran4')) {
            $fileName4 = uniqid() . '_' . str_replace(' ', '_', auth()->user()->nama) . '_daftar_hadir_3_bulan_terakhir_' . '.pdf';
            $pathFile = 'lampiran/izin_belajar/'. date('Y');
            $request->file('lampiran4')->storeAs($pathFile, $fileName4, 's3');
            Storage::disk('s3')->delete('lampiran/izin_belajar/'. $izin_belajar->created_at->format('Y') . '/'. $izin_belajar->lampiran4);
            $data['lampiran4'] = $fileName4;
        }

        if($izin_belajar->status == 'ditolak') {
            $data['status'] = "dalam antrian";
            try {
                $this->permohonan->update($id, $data);
            } catch (\Throwable $th) {
                throw $th;
            }
            return back()->with('msg', 'Lampiran permohonan berhasil diperbaharui');
        }
        \abort(404);
    }

    public function show($id)
    {
        $data['izin_belajar'] = $this->permohonan->find($id);
        $data['title'] = "Permohonan izin belajar";
        return view('izinbelajar.show', $data);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->permohonan->softDelete($id);
        } catch (\Throwable $th) {
            saveLogs($th->getMessage(), 'error');
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect('/user/permohonan_izin_belajar')->with('msg_izin_belajar', 'Permohonan izin belajar berhasil dihapus!');
    }
}
