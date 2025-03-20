<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etkezesiNaplo extends Model
{
    use HasFactory;
    public $table = 'etkezesiNaplok';
    public $timestamps = false;
    public $guarded=[];
    protected $primaryKey = 'etkezesiNaploID';
    
}
