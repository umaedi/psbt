<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\IzinbelajarService;
use Illuminate\Support\Facades\Auth;

class IzinBelajarController extends Controller
{
    public $izinbelajar;
    public function __construct(IzinbelajarService $izinbelajarService)
    {
        $this->izinbelajar = $izinbelajarService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $data['table'] = $this->izinbelajar->Query()->where('user_id', auth()->user()->id)->get();
            return view('izinbelajar._data_table', $data);
        }

        $data['title'] = "Permohonan izin belajar";
        return view('izinbelajar.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Permohonan izin belajar';
        return view('izinbelajar.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lampiran1' => 'required|file|mimes:pdf,docx|max:2048',
            'lampiran2' => 'required|file|mimes:pdf,docx|max:2048',
            'lampiran3' => 'required|file|mimes:pdf,docx|max:2048',
            'lampiran4' => 'required|file|mimes:pdf,docx|max:2048',
        ]);

        $data['user_id'] = Auth::user()->id;
        $randomName = Str::random(16);

        $lampiran1 = $request->file('lampiran1');
        $newLampiran1 = Str::replace('', '_',  strtolower(auth()->user()->nama . '_surat_pengantar_dari_opd_' . $randomName . '.' . $lampiran1->getClientOriginalExtension()));
        $data['lampiran1'] = $lampiran1->storeAs('public/lampiran', $newLampiran1);

        $lampiran2 = $request->file('lampiran2');
        $newLampiran2 = Str::replace('', '_', strtolower(auth()->user()->nama . '_sk_pangkat_atau_jabatan_terakhir_' . $randomName . '.' . $lampiran2->getClientOriginalExtension()));
        $data['lampiran2'] = $lampiran2->storeAs('public/lampiran', $newLampiran2);

        $lampiran3 = $request->file('lampiran3');
        $newLampiran3 = Str::replace('', '_', strtolower(auth()->user()->nama . '_skp_1_tahun_terakhir_' . $randomName . '.' . $lampiran3->getClientOriginalExtension()));
        $data['lampiran3'] = $lampiran3->storeAs('public/lampiran', $newLampiran3);

        $lampiran4 = $request->file('lampiran4');
        $newLampiran4 = Str::replace('', '_', strtolower(auth()->user()->nama . '_daftar_hadir_3_bulan_terakhir_' . $randomName . '.' . $lampiran4->getClientOriginalExtension()));
        $data['lampiran4'] = $lampiran4->storeAs('public/lampiran', $newLampiran4);

        DB::beginTransaction();
        try {
            $this->izinbelajar->store($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        DB::commit();
        return redirect('/user/permohonan_izin_belajar')->with('msg_izin_belajar', 'Permohonan izin belajar berhasil terkirim');
    }

    public function show($id)
    {
        $data['izin_belajar'] = $this->izinbelajar->find($id);
        $data['title'] = "Permohonan izin belajar";
        return view('izinbelajar.show', $data);
    }
}
