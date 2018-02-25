<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    protected $fillable = [
        'order_number', 'transfer_date', 'transfer_to', 'transfer_amount', 'transfer_name', 'transfer_photo', 'isVerified'
    ];
}
