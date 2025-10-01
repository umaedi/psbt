<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PermohonanService;

class IzinBelajarController extends Controller
{
    private $permohonan;
    public function __construct(PermohonanService $permohonananService)
    {
        $this->permohonan = $permohonananService;
    }

    public function index(Request $request, $user_id)
    {
        $data = $this->permohonan->Query()->where('user_id', $user_id)->where('kategori', 'Permohonan izin belajar')->get();
    }
}
