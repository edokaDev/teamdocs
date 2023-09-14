<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        $this->disableForeignKeys();
        $this->truncate('posts');
        \App\Models\Post::factory(5)->create();
        $this->enableForeignKeys();
    }
}
