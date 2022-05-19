<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDiemTichLuy extends Model
{
    public $timestamps = true;
    protected $fillable = [
        // 'MaDK',
        'MaSV',
        'idhocki',
        'SoTC',
        'DiemTichLuy10',
        'DiemTichLuy4',

        // 'TimeUpload',
    ];
    protected $primaryKey = 'id';
    protected $table = 'dsdiemtichluysv';
}
