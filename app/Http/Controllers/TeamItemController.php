<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Team;
use App\Models\TeamItem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamItemRequest;
use App\Http\Requests\UpdateTeamItemRequest;

class TeamItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamItem $teamItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamItem $teamItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamItemRequest $request, TeamItem $teamItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamItem $teamItem)
    {
        //
    }

    public function buyItem(Request $request)
    {
        $team = Team::find($request->team_id);

        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }

        if($team->coin >= $request->price){

        $newCoinValue = $team->coin - $request->price;

        $team->update(['coin' => $newCoinValue]);

        TeamItem::create([
            'team_id' => $request->team_id,
            'item_id' => $request->item_id,
        ]);
        return response()->json(['message' => 'Item ' . $request->item_id . ' bought successfully']);
        }
        return response()->json(['message' => 'Item ' . $request->item_id . ' cant be bought, not enough coin']);

    }
}
