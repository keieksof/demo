<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class PostScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:scheduler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::where('display', false)
            ->whereNotNull('scheduled_at')
            ->whereDate('scheduled_at', '<=', now())
            ->get();

        foreach ($posts as $post) {
            $post->update(['display' => true, 'scheduled_at' => null]);
        }
    }
}
