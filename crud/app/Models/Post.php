<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'description',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function Comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }
}
