<?php

namespace App\Models;

use App\Events\decreaseReactionPostCount;
use App\Events\increaseReactionPostCount;
use App\Events\updateReactionPostCount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reaction_table',
        'reaction_id',
        'type'
    ];


    protected $dispatchesEvents = [
        'created' => increaseReactionPostCount::class,
        'updated' => updateReactionPostCount::class,
        'deleted' => decreaseReactionPostCount::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
