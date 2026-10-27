<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    protected $table = 'sach';

    protected $primaryKey = 'ma_sach';

    public $incrementing = false;

    protected $keyType = 'string';



    protected $fillable = [
        'ma_sach',
        'ma_loai',
        'nhan_de',
        'tac_gia',
        'nha_xuat_ban',
        'mo_ta',
        'hinh_anh',
        'so_trang',
        'gia_bia',
        'so_luong',
    ];

    public function getRouteKeyName(): string
    {
        return 'ma_sach';
    }

    public function loaiSach()
    {
        return $this->belongsTo(
            LoaiSach::class,
            'ma_loai',
            'ma_loai'
        );
    }
}