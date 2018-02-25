<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_number', 'sender', 'to', 'cost_id', 'commodity_id', 'payment', 'weight', 'status_id', 'letters','isRefund'
    ];

    protected $casts = [
        'sender' => 'array',
        'to' => 'array',
        'payment' => 'array',
        'letters' => 'array'
    ];

    protected $dates = ['deleted_at'];

    public function letters()
    {
        return $this->hasMany('App\Models\Letter');
    }

    public function cost()
    {
        return $this->belongsTo('App\Models\Cost');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function commodity()
    {
        return $this->belongsTo('App\Models\Commodity');
    }

    public function scopeOfStatus($query, $id)
    {
        return $query->where('status_id', $id);
    }
}
