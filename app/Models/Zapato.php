<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapato extends Model
{
    //use HasFactory;
    protected $table ='zapatos';
    protected $fillable=['marca','modelo','tamaño','tipo'];
}
