<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'organisation',
        'country',
        'role_id'
    ];

    public function role()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }
}
