<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichLamViec extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'NoiDung',
        'DiaDiem',
        'Ngay',
        'Gio',
        'GhiChu',
        'DoiTuong',
    ];
    protected $primaryKey = 'id';
    protected $table = 'lichlamviec';
}
