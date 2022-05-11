<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        // 'iduser',
        'msg',
        'time',
    ];
    protected $primaryKey = 'id';
    protected $table = 'boxchat';
    public function iduser()
    {
        return $this->belongsTo('App\Models\CollegeStudentAccounts', 'iduser', 'MaSV');
    }
}
