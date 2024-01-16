<?php

namespace App\Models;

use App\Models\Pos;
use App\Models\Item;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    public function item(): BelongsToMany
    {
    return $this->belongsToMany(Item::class, 'team_items', 'team_id', 'item_id');
    }

    public function story(): BelongsToMany
    {
    return $this->belongsToMany(Story::class, 'team_stories', 'team_id', 'story_id');
    }

    public function result(): BelongsToMany
    {
    return $this->belongsToMany(Pos::class, 'results', 'team_id', 'pos_id');
    }
}