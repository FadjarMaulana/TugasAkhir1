<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $guarded = [];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'karyawan_id', 'id');
    }
}
