<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryIn extends Model
{
   
    protected $table = 'deliveredinve';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','deliveredinve','deliID','accd'
    ];
}
