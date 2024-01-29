<?php

namespace App\Models;

use App\Models\Pos;
use App\Models\Item;
use App\Models\User;
use App\Models\Story;
use App\Models\ItemUsage;
use App\Models\PlayingRally;
use App\Models\PlayingPuzzle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function itemusage(): HasMany
    {
        return $this->hasMany(ItemUsage::class);
    }

    public function playingPuzzle(): HasOne
    {
        return $this->hasOne(PlayingPuzzle::class);
    }

    public function playingRally(): HasOne
    {
        return $this->hasOne(PlayingRally::class);
    }
}
