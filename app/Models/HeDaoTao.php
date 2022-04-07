<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeDaoTao extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'TenHDT'

    ];
    protected $primaryKey = 'MaHeDT';
    protected $table = 'hedaotao';
    public function lop()
    {
        return $this->hasMany('App\Models\DanhSachLop');
    }
}
