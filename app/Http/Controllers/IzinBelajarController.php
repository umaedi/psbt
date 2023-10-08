<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\IzinbelajarService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IzinBelajarController extends Controller
{
    public $izinbelajar;
    public function __construct(IzinbelajarService $izinbelajarService)
    {
        $this->izinbelajar = $izinbelajarService;
    }

    public function index()
    {
        $data['title'] = 'Permohonan izin belajar';
        return view('izinbelajar.index', $data);
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
        $data['lampiran1'] = Storage::putFile('public/lampiranizinbelajar', $request->file('lampiran1'));
        $data['lampiran2'] = Storage::putFile('public/lampiranizinbelajar', $request->file('lampiran2'));
        $data['lampiran3'] = Storage::putFile('public/lampiranizinbelajar', $request->file('lampiran3'));
        $data['lampiran4'] = Storage::putFile('public/lampiranizinbelajar', $request->file('lampiran4'));

        DB::beginTransaction();
        try {
            $this->izinbelajar->store($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        DB::commit();
        return redirect('/user/dashboard')->with('msg_izin_belajar', 'Permohonan izin belajar berhasil terkirim');
    }

    public function show()
    {
        if (request()->ajax()) {
            $data['table'] = $this->izinbelajar->Query()->where('user_id', auth()->user()->id)->get();
            return view('izinbelajar._data_table', $data);
        }

        $data['title'] = "Permohonan izin belajar";
        return view('izinbelajar.show', $data);
    }
}
