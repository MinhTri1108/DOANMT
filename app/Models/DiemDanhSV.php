<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemDanhSV extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [

        // 'MaSV',
        'MaDK',
        'DiemDanh',
        'Ngay'

    ];
    protected $primaryKey = 'iddiemdanh';
    protected $table = 'diemdanh';
    public function madk()
    {
        return $this->belongsTo('App\Models\DangKyHocPhan', 'MaDK','MaDK');
    }
}
