<?php

namespace App\Http\Controllers;
use App\Mail\dailyPostMail;
use App\Models\NonAuthComments;
use App\Models\NonAuthUsers;
use App\Models\Post;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;
use PDF;

class SidebarController extends Controller
{
    public function index($id){
        $posts= DB::table('post_tag')
            ->join('tags','tags.id',"=",'post_tag.tag_id')
            ->join('posts','posts.id',"=",'post_tag.post_id')
            ->where('tag_id',"=",$id)
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
    public function show($id)
    {
        config(['app.timezone' => 'Asia/Kolkata']);
        $post = DB::table('posts')->find($id);
        $comment = Post::where('id',$id)->with('Comment')->first();
        return view('posts.show',compact('post','comment'));
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
}
