<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POSTS extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'content',
        'attached',
        'time',
    ];
    protected $primaryKey = 'idposts';
    protected $table = 'posts';
    public function masvpost()
    {
        return $this->belongsTo('App\Models\CollegeStudentAccounts', 'MaSV', 'MaSV');
    }
}
