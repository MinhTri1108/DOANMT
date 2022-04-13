<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuNgay extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'thumay',
    ];
    protected $primaryKey = 'idthu';
    protected $table = 'thungay';
    public function thu()
    {
        return $this->hasMany('App\Models\LichHoc');
    }
}
