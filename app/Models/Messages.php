<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'incoming_msg_id',
        'outgoing_msg_id',
        'msg',
        'ThoiGian'
    ];
    protected $primaryKey = 'id';
    protected $table = 'messages';
    public function ntsv()
    {
        return $this->belongsTo('App\Models\CollegeStudentAccounts', 'MaSV','outgoing_msg_id' );
    }
}
