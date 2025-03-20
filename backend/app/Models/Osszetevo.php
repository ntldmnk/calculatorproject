<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osszetevo extends Model
{
    use HasFactory;
    public $table = 'osszetevok';
    public $timestamps = false;
    public $guarded=[];
    protected $primaryKey = 'osszetevoID';
    
}
