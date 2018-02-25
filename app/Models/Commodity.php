<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $fillable = [
        'code', 'name'
    ];

    protected $hidden = [
       'created_at', 'updated_at'
    ];

    public function costs()
    {
        return $this->hasMany('App\Models\Cost');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
