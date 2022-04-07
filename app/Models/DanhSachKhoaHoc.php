<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachKhoaHoc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'TenKhoaHoc'

    ];
    protected $primaryKey = 'MaKhoaHoc';
    protected $table = 'dskhoahoc';
    public function lop()
    {
        return $this->hasMany('App\Models\DanhSachLop');
    }
}
