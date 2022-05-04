<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocKi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'HocKi',
    ];
    protected $primaryKey = 'idhocki';
    protected $table = 'hocki';
    public function namhoc()
    {
        return $this->belongsTo('App\Models\NamHoc', 'idnamhoc', 'idnamhoc');
    }
    public function hocphan()
    {
        return $this->hasMany('App\Models\HocPhan');
    }
}
