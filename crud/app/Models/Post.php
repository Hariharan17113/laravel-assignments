<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function Comment()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
    public function tags()
    {
        return $this->belongsToMany(tags::class,'post_tag','post_id','tag_id');
    }

    public static function latestPosts(){
        return static::latest()->paginate(5);
    }
    public static function graph(){
        $posts = static::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $months = static::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $key => $month) {
            $datas[$month-1] = $posts[$key];
        }
        return $datas;
    }
    public static function graphByYear(){
        $posts = static::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Year(created_at)"))
            ->pluck('count');
        $years = static::select(DB::raw("Year(created_at) as year"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Year(created_at)"))
            ->pluck('year');
        $datas = array(0,0,0,0,0,0,0);
        foreach ($years as $key => $year) {
            $datas[$year-2017] = $posts[$key];
        }
        return $datas;
    }
}
