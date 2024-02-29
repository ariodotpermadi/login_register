<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = "table_user";
    protected $fillable = [
        'username',
        'password',
    ];

    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $username = 'username';
}
