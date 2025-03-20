<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etel_koret_kapcsolat extends Model
{
    use HasFactory;
    public $table = 'etel_koret_kapcsolatok';
    public $timestamps = false;
    public $guarded=[];
}
