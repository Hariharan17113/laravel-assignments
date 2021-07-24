<?php

namespace App\Http\Controllers;
use App\Mail\dailyPostMail;
use App\Models\NonAuthComments;
use App\Models\NonAuthUsers;
use App\Models\Post;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;
use PDF;

class NonAuthController extends Controller
{
    public function index($name){
        $posts= DB::table('post_tag')
            ->join('posts','posts.id',"=",'post_tag.post_id')
            ->join('tags','tags.id',"=",'post_tag.tag_id')
            ->where('tags',"=",$name)
            ->get();
        return view('start.index',compact('posts'));
    }
    public function search(Request $request){
        {
            $search = $request->input('search');
            $posts = Post::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->get();
            $tags = tags::query()
                ->where('tags', 'LIKE', "%{$search}%")
                ->get();

            return view('start.search', compact('posts','tags'));
        }
    }
    public function store(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $check_email = NonAuthUsers::where('email', '=', $email)->get();
        if ($check_email->count() > 0){
            $user = $check_email->first();
        }
        else{
            $user = NonAuthUsers::create(['name' => $name, 'email' => $email]);
        }
        $comments = $request->input('comments');
        NonAuthComments::create(['non_auth_user_id' => $user->id, 'comments' => $comments]);
        return view('welcome');
    }
    public function daily($type)
    {
        return Excel::download(new PostsExport, 'posts.' . $type);
    }
}
