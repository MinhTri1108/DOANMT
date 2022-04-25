<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachMonHoc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'TenMonHoc',
        'LT',
        'TH',
        'TL',
        'TT'

    ];
    protected $primaryKey = 'MaMonHoc';
    protected $table = 'dsmonhoc';
    public function stc()
    {
        return $this->belongsTo('App\Models\HocPhi', 'SoTinChi', 'SoTinChi');
    }
    public function monhoccualop()
    {
        return $this->hasMany('App\Models\DanhSachMonHocCuaLop');
    }
}
