<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChrctrResource;
use App\Models\Chrctr;
use Illuminate\Http\Request;

class ChrctrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ChrctrResource::collection(Chrctr::all());
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'game_id' => 'exists:games,id'
        ]);
        $char = Chrctr::create([
            'name' => $request->name,
            'game_id' => $request->game_id
        ]);
        return new ChrctrResource($char);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $chrctr = Chrctr::find($id);
        return new ChrctrResource($chrctr);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chrctr $chrctr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $chrctr = Chrctr::find($id);
        $request->validate([
            'name' => 'required',
            'game_id' => 'exists:games,id'
        ]);

        $chrctr->update([
            'name' => $request->name,
            'game_id' => $request->game_id
        ]);
        return new ChrctrResource($chrctr);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chrctr = Chrctr::find($id);
        $chrctr->delete();
    }
}
