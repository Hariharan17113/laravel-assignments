<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'tags',
        'post_id',
        'tag_id',
    ];
    public function posts()
    {
        return $this->belongsTo(Post::class);

    }

}
