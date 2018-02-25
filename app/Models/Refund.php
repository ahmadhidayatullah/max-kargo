<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
  protected $fillable = [
      'task_id','method','nomor_rekening','charge','is_refund'
  ];

  public function task()
  {
      return $this->belongsTo('App\Models\Task')->withTrashed();
  }
}
