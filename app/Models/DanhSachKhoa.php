<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachKhoa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'TenKhoa',
        'slug_khoa',
        'DiaChiKhoa',
        'SDTKhoa'
    ];
    protected $primaryKey = 'MaKhoa';
    protected $table = 'dskhoa';
    public function lop()
    {
        return $this->hasMany('App\Models\DanhSachLop');
    }
}
