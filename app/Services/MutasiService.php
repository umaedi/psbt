<?php

namespace App\Services;

use App\Models\Mutasi;

class MutasiService
{
    protected $mutasi;
    public function __construct(Mutasi $mutasi)
    {
        $this->mutasi = $mutasi;
    }

    public function store($data)
    {
        return $this->mutasi->create($data);
    }

    public function find($id)
    {
        $model =  $this->mutasi->find($id);
        return $model;
    }

    public function Query()
    {
        return $this->mutasi->query();
    }

    public function sofDelete($id)
    {
        $model = $this->mutasi->find($id);
        return $model->delete();
    }
}
