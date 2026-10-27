<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiSach extends Model
{
    protected $table = 'loai_sach';

    protected $primaryKey = 'ma_loai';

    public $incrementing = false;

    protected $keyType = 'string';

    

    protected $fillable = [
        'ma_loai',
        'ten_loai',
    ];

    public function saches()
    {
        return $this->hasMany(
            Sach::class,
            'ma_loai',
            'ma_loai'
        );
    }
}