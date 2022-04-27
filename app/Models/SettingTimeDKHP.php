<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTimeDKHP extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'start',
        'open'
    ];
    protected $primaryKey = 'idtime';
    protected $table = 'timeopendkhp';
    public function admin()
    {
        return $this->belongsTo('App\Models\AdminAccounts', 'MaAdmin', 'MaAdmin');
    }
}
