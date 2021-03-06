<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeStudentAccounts extends Model
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
    protected $primaryKey = 'MaSV';
    protected $table = 'dssinhvien';
    public function permission()
    {
        return $this->belongsTo('App\Models\permission', 'idloaitk', 'idloaitk');
    }
    public function lop()
    {
        return $this->belongsTo('App\Models\DanhSachLop', 'MaLop', 'MaLop');
    }
    // public function mess()
    // {
    //     return $this->hasMany('App\Models\Messages');
    // }
}

