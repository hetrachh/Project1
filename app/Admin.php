<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens;
    protected $guard = 'admin';

    protected $fillable = ['name','email','password','is_superadmin','contact_number'];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
