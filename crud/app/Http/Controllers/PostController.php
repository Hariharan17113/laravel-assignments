<?php

namespace App\Http\Controllers;
use App\Events\PostDeleted;
use App\Events\PostCreated;
use App\Events\PostUpdated;
use App\Models\Comment;
use App\Models\Post;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('Admin')) {
                $data = Post::latest()->with('Comment')->get();
            } else {
                $data = Post::where('user_id', '=', Auth::id())->with('tags')->get();
            }
            $comment = $data;
            return view('posts.index', compact('data', 'comment'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'comments' => 'required',
            'tag' => 'required',
        ]);
        $tag=$request->input('tag');
        $id=Auth::id();
        $post=Post::create(['user_id'=> $id,'title' => request('title'),'description' => request('description')]);
        $id = $post->id;
        Comment::create(['post_id'=> $id,'comments' => request('comments')]);
        if (!sizeof(tags::where('tags','C')->get())) {
            tags::create(['tags' => 'C']);
            tags::create(['tags' => 'C++']);
            tags::create(['tags' => 'Python']);
            tags::create(['tags' => 'PHP']);
        }
        foreach($tag as $key => $t){
            Post::find($id)->tags()->attach(['tag_id' => tags::where('tags',$t)->get('id')[0]["id"]]);
        }
        Event::dispatch(new PostCreated($post));
        return redirect()->route('posts.index',compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        config(['app.timezone' => 'Asia/Kolkata']);
        $users= DB::table('post_tag')
            ->join('posts','posts.id',"=",'post_tag.post_id')
            ->join('tags','tags.id',"=",'post_tag.tag_id')
            ->where('post_id',"=",$id)
            ->get();
        $post = DB::table('posts')->find($id);
        $comment = Post::where('id',$id)->with('Comment')->first();
        foreach ($users as $key => $user) {
            $tags[$key] = DB::table('tags')->where('id',$user->tag_id)->get('tags');
        }
        if (Auth::check()){
            return view('posts.show',compact('post','comment','tags'));
        }
        else{
            return view('posts.show',compact('post','comment'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,Comment $comment)
    {
        return view('posts.edit',compact('post','comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'comments' => 'required',
        ]);
        $tag=$request->input('tag');
        $post->update($request->all());
        $id=$post->id;
        Comments::where('post_id', $id)
            ->update(['comments' => request('comments')]);
        Post::find($id)->tags()->detach();
        foreach($tag as $key => $t){
            Post::find($id)->tags()->attach(['tag_id' => tags::where('tags',$t)->get('id')[0]["id"]]);
        }
        Event::dispatch(new PostUpdated($post));
        return redirect()->route('posts.show',$id)
            ->with('success','Post created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Event::dispatch(new PostDeleted($post));
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');

    }
}
