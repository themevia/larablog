<?php

namespace App\Models;

use App\Events\decreaseCommentPostCount, App\Events\increaseCommentPostCount,
    Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'content',
        'table_name',
        'user_id',
        'table_id',
        'parent_id'
    ];


    protected $dispatchesEvents = [
        'created' => increaseCommentPostCount::class,
        'deleted' => decreaseCommentPostCount::class
    ];
}
