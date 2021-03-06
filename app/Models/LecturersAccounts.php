<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturersAccounts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'fname',
        'lname',
        'password',
        'NgaySinh',
        'cccd',
        'GioiTinh',
        'DiaChi',
        'SDT',
        'Email',
        'Status',
        'avatar',
        'idloaitk'
    ];
    protected $primaryKey = 'MaGV';
    protected $table = 'dsgiaovien';
    public function permission()
    {
        return $this->belongsTo('App\Models\permission', 'idloaitk', 'idloaitk');
    }
    public function tailieu()
    {
        return $this->hasMany('App\Models\FileTaiLieu');
    }
    public function hocphan()
    {
        return $this->hasMany('App\Models\HocPhan');
    }
}
