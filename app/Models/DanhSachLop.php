<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachLop extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'TenLop',
        'slug_lop'

    ];
    protected $primaryKey = 'MaLop';
    protected $table = 'dslop';
    public function khoa()
    {
        return $this->belongsTo('App\Models\DanhSachKhoa', 'MaKhoa', 'MaKhoa');
    }
    public function khoahoc()
    {
        return $this->belongsTo('App\Models\DanhSachKhoaHoc', 'MaKhoaHoc', 'MaKhoaHoc');
    }
    public function hedaotao()
    {
        return $this->belongsTo('App\Models\HeDaoTao', 'MaHeDT', 'MaHeDT');
    }
    public function danhsachsinhvien()
    {
        return $this->hasMany('App\Models\CollegeStudentAccounts');
    }
}
