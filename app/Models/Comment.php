<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'matk',
        'iduser',
        'content',
    ];
    protected $primaryKey = 'idcmt';
    protected $table = 'comment';
    public function repcmt()
    {
        return $this->belongsTo('App\Models\POSTS', 'idposts', 'idposts');
    }
}
