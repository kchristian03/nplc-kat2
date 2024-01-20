<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'team_id',
        'item_id'
    ];
}
