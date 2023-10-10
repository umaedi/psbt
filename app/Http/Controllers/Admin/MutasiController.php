<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MutasiService;
use Illuminate\Http\Request;

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
            $page = request()->get('pagination', 10);
            $data['table'] = $this->mutasi->Query()->whereNull('status')->paginate($page);
            return view('admin.mutasi._data_table', $data);
        }
    }
}
