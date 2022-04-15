<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachMonHocCuaLop extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'HocKi',
    ];
    protected $primaryKey = 'idmonhoccualop';
    protected $table = 'monhoccualop';
    public function lop()
    {
        return $this->belongsTo('App\Models\DanhSachLop', 'MaLop', 'MaLop');
    }
    public function monhoc()
    {
        return $this->belongsTo('App\Models\DanhSachMonHoc', 'MaMonHoc', 'MaMonHoc');
    }
}
