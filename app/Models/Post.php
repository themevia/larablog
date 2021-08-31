<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory,
    Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'author_id',
        'category_id',
        'cover_photo',
        'tags',
        'comments',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAll()
    {

    }

    public function getTrashedAll(): array
    {
        $trashed = $this->onlyTrashed()->paginate(6)->toArray();
        foreach ($trashed['data'] as $key => $item) {
            $author = User::find($item['author_id'])->first();
            $trashed['data'][$key]['author'] = $author['name'].' '.$author['surname'];
            $posts['data'][$key]['category'] = (new Category())->find($item['category_id'])->get()->toArray()['title'];
            $who_removed = User::find($item['who_removed_id'])->first();
            $trashed['data'][$key]['who_removed'] = $who_removed['name'].' '.$who_removed['surname'];
        }
        return $trashed;
    }


    public function increaseColumn(int $id,string $column,string $operator = '+')
    {
        $this->where('id',$id)
            ->update([
                $column => DB::raw("$column $operator 1")
            ]);
        return "$column $operator 1";
    }

    public function decreaseColumn(int $id,string $column)
    {
        return $this->increaseColumn($id,$column,'-');
    }
}
