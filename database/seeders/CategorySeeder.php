<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $timenow = Carbon::now()->format('Y-m-d H:i:s');
        $categories = [
            [
                'name' => 'diy',
                'slug' => 'diy',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'bedroom',
                'slug' => 'bedroom',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'scandinavian interior',
                'slug' => 'scandinavian-interior',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'outdoor',
                'slug' => 'outdoor',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'nordic interior',
                'slug' => 'nordic-interior',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'makeover',
                'slug' => 'makeover',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'kitchen',
                'slug' => 'kitchen',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'video',
                'slug' => 'video',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'living room',
                'slug' => 'living-room',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'upcycle',
                'slug' => 'upcycle',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'kids room',
                'slug' => 'kids-room',
                'status' => 1,
                'created_at' => $timenow
            ],
            [
                'name' => 'styling',
                'slug' => 'styling',
                'status' => 1,
                'created_at' => $timenow
            ]
        ];
        DB::table('categories')->insert($categories);
    }
}
