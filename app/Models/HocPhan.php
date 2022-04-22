<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [

    ];
    protected $primaryKey = 'idhocphan';
    protected $table = 'mahocphan';
    public function lichhoc()
    {
        return $this->hasMany('App\Models\LichHoc');
    }
    public function magv()
    {
        return $this->belongsTo('App\Models\LecturersAccounts', 'MaGV', 'MaGV');
    }
    public function monhoc()
    {
        return $this->belongsTo('App\Models\DanhSachMonHoc', 'MaMonHoc', 'MaMonHoc');
    }
    public function dkhp()
    {
        return $this->hasMany('App\Models\DangKyHocPhan');
    }
    public function file()
    {
        return $this->hasMany('App\Models\FileTaiLieu');
    }
}
