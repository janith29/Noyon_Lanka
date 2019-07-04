<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inverty extends Model
{
   
    protected $table = 'inverty';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','articleNo', 'qty','color','collection','location','created_at','updated_at'
    ];
}
