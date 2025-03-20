<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koret extends Model
{
    use HasFactory;
    public $table = 'koretek';
    public $timestamps = false;
    public $guarded=[];
    protected $primaryKey = 'koretID';
    
}
