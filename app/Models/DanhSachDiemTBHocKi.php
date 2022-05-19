<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDiemTBHocKi extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        // 'MaDK',
        'MaSV',
        'idhocki',
        'DiemTB',
        'DiemTB4',
        'SoTC',
        // 'TimeUpload',
    ];
    protected $primaryKey = 'id';
    protected $table = 'dsdiemtbhocki';
}
