<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'mission_played',
        'mission_name'
    ];
}
