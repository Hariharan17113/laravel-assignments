<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class tags extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_tag','tag_id','post_id');

    }
    protected $fillable = [
        'tags',
        'post_id',
        'tag_id',
    ];
}
