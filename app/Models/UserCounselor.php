<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCounselor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_counselor';

    protected $fillable = [
        'counselor_id',
        'user_id',
        'user_username',
        'diagnosis'
    ];
}
