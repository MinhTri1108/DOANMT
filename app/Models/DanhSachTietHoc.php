<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachTietHoc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'TietHoc',
        'GioHocBD',
        'GioHocKT'
    ];
    protected $primaryKey = 'idtiethoc';
    protected $table = 'dstiethoc';
}
