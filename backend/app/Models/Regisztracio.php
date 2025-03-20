<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regisztracio extends Model
{
    use HasFactory;
    public $table = 'regisztraciok';
    public $timestamps = false;
    public $guarded=[];
    protected $primaryKey = 'regisztracioID';
   
}
