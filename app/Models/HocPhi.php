<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocPhi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'GiaTien',
    ];
    protected $primaryKey = 'SoTinChi';
    protected $table = 'hocphi';
    public function stc()
    {
        return $this->hasMany('App\Models\DanhSachMonHoc');
    }
}
