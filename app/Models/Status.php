<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
