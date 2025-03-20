<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class koret_osszetevo_kapcsolat extends Model
{
    use HasFactory;
    public $table = 'koret_osszetevo_kapcsolatok';
    public $timestamps = false;
    public $guarded=[];
}
