<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id){
        $comments=$request->input('comments');
        Comment::create(['post_id'=> $id,'comments' => $comments]);
        return redirect()->back();
    }
    /**
     * @param $id
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $c = Comment::find($id);
        $c->delete();
        return redirect()->back();
    }
}
