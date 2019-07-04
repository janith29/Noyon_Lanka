<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Reset extends Model
{
    protected $table='reset';
    protected $primaryKey = 'id';
    protected $fillable=[
        'id','Question', 'Q1', 'Q1A', 'Q2','Q2A','Q3','Q3A'
    ];
}