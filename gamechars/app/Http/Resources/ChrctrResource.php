<?php

namespace App\Http\Resources;

use App\Models\Game;
use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ChrctrResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $gname = DB::table('games')->where('id', $this->game_id)->value('name');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'game' => $gname
        ];
    }
}
