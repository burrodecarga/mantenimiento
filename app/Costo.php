<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Task;

class Costo extends Model
{
    protected $fillable=[
        'task_id',
        'costo_id',
        'costo_tipo',
        'name',
        'cantidad',
        'precio',
        'total',
     ];

     public function task(){
         return $this->belongsTo(Task::class);
     }

}
