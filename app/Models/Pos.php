<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pos extends Model
{
    use HasFactory;

    public function team(): BelongsToMany
    {
    return $this->belongsToMany(Team::class, 'results', 'pos_id', 'team_id');
    }
}
