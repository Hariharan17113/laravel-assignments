<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::where('user_id','=',Auth::id())->with('tags')->get();
        $tags= $data;
        return view('posts.index',compact('data','tags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        if (!sizeof(Tag::where('tags','C')->get())) {
            Tag::create(['tags' => 'C']);
            Tag::create(['tags' => 'C++']);
            Tag::create(['tags' => 'Python']);
            Tag::create(['tags' => 'PHP']);
        }
        foreach($tag as $key => $t){
            Post::find($id)->tags()->attach(['tag_id' => Tag::where('tags',$t)->get('id')[0]["id"]]);
        }
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
        $comment = Post::where('id',$id)->with('Comments')->first();
        foreach ($users as $key => $user) {
            $tags[$key] = DB::table('tags')->where('id',$user->tag_id)->get('tags');
        }
        return view('posts.show',compact('post','comment','tags'));
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
        ]);
        $post->update($request->all());
        $id=$post->id;
        $tag=$request->input('tag');
        Post::find($id)->tags()->detach();
        foreach($tag as $key => $t){
            Post::find($id)->tags()->attach(['tag_id' => Tag::where('tags',$t)->get('id')[0]["id"]]);
        }
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
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');

    }
}
