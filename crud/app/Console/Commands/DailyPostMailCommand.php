<?php

namespace App\Console\Commands;

use App\Exports\PostsExport;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\dailyPostMail;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class DailyPostMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:daily-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Daily Post Mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::all();
        $data["email"] = env('MAIL_USERNAME');
        $data["title"] = "Previous Day Post lists";
        $yesterday = Post::whereDate('created_at', Carbon::now()->addDay(-1))->get();
        $pdf = PDF::loadView('mail.fileView', compact('yesterday'));
        $excel = Excel::download(new PostsExport, 'invoice.xls')->getFile();
        Mail::send('mail.dailyStatus', compact('yesterday'), function($message)use($data,$excel,$pdf) {
            $message->to($data['email'],  $data["email"])
                ->subject($data["title"])
                ->attach($excel, ['as' => 'invoice.xls']);
            $message->attachData($pdf->output(), 'dailystatus.pdf');

        });
        return 'Mail sent';
    }

}
