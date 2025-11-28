<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip',
        'country',
        'city',
        'device',
        'browser',
        'platform',
        'page',
        'lat',
        'lng',
    ];
}
