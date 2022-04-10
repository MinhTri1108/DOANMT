<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'hoten' ,'password','ngaysinh','cccd','gender','diachi','sdt','email'
        // idadmin
        'incoming_msg_id',
        'outgoing_msg_id',
        'msg',
        'ThoiGian'
    ];
    protected $primaryKey = 'MaAdmin';
    protected $table = 'dsadmin';
}
