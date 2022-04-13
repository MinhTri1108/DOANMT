<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachPhongHoc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'SoPhong',
    ];
    protected $primaryKey = 'idphong';
    protected $table = 'dsphonghoc';
    public function phong()
    {
        return $this->hasMany('App\Models\LichHoc');
    }
}
