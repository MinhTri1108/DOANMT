<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangKyHocPhan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'HocPhi',
        'NgayDangKy'
    ];
    protected $primaryKey = 'MaDK';
    protected $table = 'dangkymonhoc';
    public function hocphan()
    {
        return $this->belongsTo('App\Models\HocPhan', 'idhocphan','idhocphan');
    }
    public function masv()
    {
        return $this->belongsTo('App\Models\CollegeStudentAccounts', 'MaSV', 'MaSV');
    }
    public function diem()
    {
        return $this->hasMany('App\Models\DanhSachDiem');
    }
    public function diemdanhsv()
    {
        return $this->hasMany('App\Models\DiemDanhSV');
    }
}
