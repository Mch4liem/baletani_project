<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;

    
    protected $guarded = [];
    protected $dates = ['created_at'];

    protected $fillable = ['username', 'fullname', 'password', 'remember_token'];
    // Definisikan properti, relasi, dan metode lain yang diperlukan untuk model 'Admin' Anda.
}


