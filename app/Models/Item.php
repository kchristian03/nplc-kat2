<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    public function team(): BelongsToMany
    {
    return $this->belongsToMany(Team::class, 'team_items', 'item_id', 'team_id');
    }
}



