<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonAuthComments extends Model
{
    use HasFactory;
    protected $fillable=[
        'non_auth_user_id',
        'comments',
    ];
    public function user()
    {
        return $this->belongsTo(NonAuthUsers::class,'non_auth_user_id');
    }
}
