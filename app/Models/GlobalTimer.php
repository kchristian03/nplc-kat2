<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalTimer extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
}
