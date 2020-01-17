<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Company extends Authenticatable
{
	use HasApiTokens;
    protected $guard = 'company';

    protected $fillable = ['name','email','password','logo','desc','address'];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
