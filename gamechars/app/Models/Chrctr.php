<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chrctr extends Model
{
    use HasFactory;
    protected $fillable = ['game_id', 'name'];

    public function games()
    {
        return $this->belongsTo(Game::class);
    }
}
