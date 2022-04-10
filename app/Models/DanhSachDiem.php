<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDiem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'DiemCC',
        'DiemGK',
        'DiemThi',
        'DiemTBMon',
        'Diem4',
    ];
    protected $primaryKey = 'iddiem';
    protected $table = 'dsdiem';
}
