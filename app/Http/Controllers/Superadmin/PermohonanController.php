<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    protected $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }
    public function index()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->get();
            return view('superadmin.permohonan._data_table', $data);
        }

        $data['title'] = 'Permohonan';
        return view('superadmin.permohonan.index', $data);
    }

    public function show($id)
    {
        $data['permohonan'] = $this->permohonan->find($id);
        return view('superadmin.permohonan.show', $data);
    }

    public function waiting_sign()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'diproses')->get();
            return view('superadmin.permohonan._data_table_tte', $data);
        }
        $data['title'] = 'Permohonan menunggu TTE';
        return view('superadmin.permohonan.waiting_sign');
    }

    public function signed()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'diterima')->get();
            return view('superadmin.permohonan._data_table_tte', $data);
        }
        $data['title'] = 'Permohonan tertnda';
        return view('superadmin.permohonan.signed');
    }

    public function rejected()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'ditolak')->get();
            return view('superadmin.permohonan._data_table_tte', $data);
        }
        $data['title'] = 'Permohonan tertnda';
        return view('superadmin.permohonan.rejected');
    }
}
