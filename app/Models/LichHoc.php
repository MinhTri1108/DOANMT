<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichHoc extends Model
{
    use HasFactory;
    public $timestamps = false;
    // protected $fillable = [
    // ];
    protected $primaryKey = 'idlichhoc';
    protected $table = 'lichhoc';
    // public function hocphan()
    // {
    //     return $this->belongsTo('App\Models\LichHoc', 'idlichhoc', 'idlichhoc');
    // }
    public function thu()
    {
        return $this->belongsTo('App\Models\ThuNgay', 'idthu', 'idthu');
    }
    public function tiethoc()
    {
        return $this->belongsTo('App\Models\DanhSachTietHoc', 'idtiethoc', 'idtiethoc');
    }
    public function phong()
    {
        return $this->belongsTo('App\Models\DanhSachPhongHoc', 'idphong', 'idphong');
    }
    public function hocphan()
    {
        return $this->belongsTo('App\Models\HocPhan', 'idhocphan', 'idhocphan');
    }
}
