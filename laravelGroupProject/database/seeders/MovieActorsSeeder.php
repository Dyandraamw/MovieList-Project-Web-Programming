<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['actor_id'=>1,'movie_id'=>1],
            ['actor_id'=>1,'movie_id'=>2],
            ['actor_id'=>1,'movie_id'=>3],
            ['actor_id'=>1,'movie_id'=>4],
            ['actor_id'=>1,'movie_id'=>5],
            ['actor_id'=>2,'movie_id'=>1],
            ['actor_id'=>3,'movie_id'=>1],
            ['actor_id'=>3,'movie_id'=>2],
            ['actor_id'=>3,'movie_id'=>3],
            ['actor_id'=>3,'movie_id'=>4],
            ['actor_id'=>3,'movie_id'=>5],
            ['actor_id'=>4,'movie_id'=>1],
            ['actor_id'=>4,'movie_id'=>2],
            ['actor_id'=>4,'movie_id'=>3],
            ['actor_id'=>4,'movie_id'=>4],
            ['actor_id'=>4,'movie_id'=>5],
            ['actor_id'=>5,'movie_id'=>5],
            ['actor_id'=>6,'movie_id'=>3],
            ['actor_id'=>7,'movie_id'=>2],
            ['actor_id'=>8,'movie_id'=>4],

        ];
        DB::table('movie_actors')->insert($data);
    }
}
