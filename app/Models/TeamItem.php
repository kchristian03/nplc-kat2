<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'team_id',
        'item_id'
    ];

    /**
     * Get the item associated with the TeamItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
}
