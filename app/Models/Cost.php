<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable = [
        'origin_id', 'destination_id','commodity_id', 'price', 'base_rate'
    ];

    protected $hidden = ['origin_id', 'destination_id', 'created_at', 'updated_at'];

    protected $casts = [
        'price' => 'array'
    ];

    public function origin()
    {
        return $this->belongsTo('App\Models\Origin');
    }

    public function destination()
    {
        return $this->belongsTo('App\Models\Destination');
    }

    public function commodity()
    {
        return $this->belongsTo('App\Models\Commodity');
    }
    
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
