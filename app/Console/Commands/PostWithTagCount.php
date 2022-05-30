<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;

class PostWithTagCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:post_with_tag_count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Amount of posts linked with tags with {id}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $posts = Tag::find($id)->posts;
        $size = count($posts);
        $this->info('Count = ' . $size);
    }
}
