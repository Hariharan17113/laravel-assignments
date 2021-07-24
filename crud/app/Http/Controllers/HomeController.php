<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = DB::table('posts')->select('*')
            ->orderBy('id','desc')->get();
        return view('home',compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $data = array();
        $data['title']= $request->get('title');
        $data['description'] = $request->get('description');
        $data['comments'] = $request->get('comment');
        $post=DB::table('posts')->insert($data);
        return redirect()->route('index');
        return view('home');
    }
}
