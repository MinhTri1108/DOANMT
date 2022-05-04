<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamHoc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'namhoc',
    ];
    protected $primaryKey = 'idnamhoc';
    protected $table = 'namhoc';
    public function hocki()
    {
        return $this->hasMany('App\Models\HocKi');
    }
}
