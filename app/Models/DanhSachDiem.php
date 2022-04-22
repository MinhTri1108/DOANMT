<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDiem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'MaDK',
        'DiemCC',
        'DiemGK',
        'DiemThi',
        'DiemTBMon',
    ];
    protected $primaryKey = 'iddiem';
    protected $table = 'dsdiem';
    public function diem()
    {
        return $this->belongsTo('App\Models\DangKyHocPhan', 'MaDK', 'MaDK');
    }
}
