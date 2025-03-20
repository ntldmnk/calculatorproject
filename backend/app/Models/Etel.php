<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etel extends Model
{
    use HasFactory;
    public $table = 'etelek';
    public $timestamps = false;
    protected $guarded=[];
    protected $primaryKey = 'etelID';
    
    
}
