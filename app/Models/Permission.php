<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    use Notifiable;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'matk',
        'tentk'

    ];
    protected $primaryKey = 'idloaitk';
    protected $table = 'quyen';
    public function admin(){
        return $this->hasMany('App\Models\AdminAccounts');
    }
    public function giangvien()
    {
        return $this->hasMany('App\Models\LecturesAccounts');
    }
    public function sinhvien()
    {
        return $this->hasMany('App\Models\CollegeStudentAccounts');
    }
}
