<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use Illuminate\Http\Request;

class TTEController extends Controller
{
    protected $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }
    public function show($id)
    {
        $data['permohonan'] = $this->permohonan->find($id);
        return view('superadmin.tte.show', $data);
    }
}
