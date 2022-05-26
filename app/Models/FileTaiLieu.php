<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileTaiLieu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'idquyen',
        'MoTa',
        'File',
        'ThoiGianFile'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tailieu';
    // public function magv()
    // {
    //     return $this->belongsTo('App\Models\LecturersAccounts', 'MaGV', 'MaGV');
    // }
    // public function masv()
    // {
    //     return $this->belongsTo('App\Models\CollegeStudentAccounts', 'MaSV', 'MaSV');
    // }
    // public function maadmin()
    // {
    //     return $this->belongsTo('App\Models\AdminAccounts', 'MaAdmin', 'MaAdmin');
    // }
        public function quyen()
    {
        return $this->belongsTo('App\Models\Permission', 'idloaitk', 'idloaitk');
    }
}
