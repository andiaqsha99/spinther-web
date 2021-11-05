<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'counselor';

    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}
