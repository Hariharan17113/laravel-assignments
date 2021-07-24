<?php

namespace App\Exports;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PostsExport implements FromView
{
    public function view(): View
    {
        $today_date = Carbon::today();
        $posts = Post::with('user')->get();
        return view('mail.fileExcel', compact('posts', 'today_date'));
    }
}
