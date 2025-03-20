<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etel_osszetevo_kapcsolat extends Model
{
    use HasFactory;
    public $table = 'etel_osszetevo_kapcsolatok';
    public $timestamps = false;
    public $guarded=[];
}
