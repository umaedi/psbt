<?php

namespace App\Services;

use App\Models\Izinbelajar;

class IzinbelajarService
{
    protected $izinbelajar;
    public function __construct(Izinbelajar $izinbelajar)
    {
        $this->izinbelajar = $izinbelajar;
    }

    public function store($data)
    {
        return $this->izinbelajar->create($data);
    }

    public function Query()
    {
        return $this->izinbelajar->query();
    }
}
