<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'code', 'name', 'province'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function costs()
    {
        return $this->hasMany('App\Models\Cost');
    }
}
