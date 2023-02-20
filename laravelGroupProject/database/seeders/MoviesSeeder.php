<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Harry Potter and the Sorcerer Stone',
                'description' => 'Harry Potter, an eleven-year-old orphan, discovers that he is a wizard and is invited to study at Hogwarts. Even as he escapes a dreary life and enters a world of magic, he finds trouble awaiting him.',
                'genre' => json_encode(['Fantasy','Children']),
                'actor' => json_encode(['Daniel Radcliffe','Emma Watson','Rupert Grint','Tom Felton']),
                'characterName'=> json_encode(['Harry Potter','Hermione Granger','Ron Weasley','Draco Malfoy']),
                'director' => 'Chris Columbus',
                'releaseDate' => '2001',
                'thumbnail' => 'images/harry-potter-1.jpg',
                'background' => 'images/harry-potter-1.jpg'
            ],
            [
                'title' => 'Harry Potter and the Chamber of Secrets',
                'description' => 'A house-elf warns Harry against returning to Hogwarts, but he decides to ignore it. When students and creatures at the school begin to get petrified, Harry finds himself surrounded in mystery.',
                'genre' => json_encode(['Fantasy','Children','Adventure']),
                'actor' => json_encode(['Daniel Radcliffe','Emma Watson','Rupert Grint','Richard Harris']),
                'characterName'=> json_encode(['Harry Potter','Hermione Granger','Ron Weasley','Albus Dumbledore']),
                'director' => 'Chris Columbus',
                'releaseDate' => '2002',
                'thumbnail' => 'images/harry-potter-2.jpg',
                'background' => 'images/harry-potter-2.jpg'
            ],
            [
                'title' => 'Harry Potter and the Prisoner of Azkaban',
                'description' => 'Harry, Ron and Hermoine return to Hogwarts just as they learn about Sirius Black and his plans to kill Harry. However, when Harry runs into him, he learns that the truth is far from reality.',
                'genre' => json_encode(['Fantasy','Adventure']),
                'actor' => json_encode(['Daniel Radcliffe','Emma Watson','Rupert Grint','Gary Oldman']),
                'characterName'=> json_encode(['Harry Potter','Hermione Granger','Ron Weasley','Sirius Black']),
                'director' => 'Alfonso Cuarón',
                'releaseDate' => '2004',
                'thumbnail' => 'images/harry-potter-3.jpg',
                'background' => 'images/harry-potter-3.jpg'
            ],
            [
                'title' => 'Harry Potter and the Goblet of Fire',
                'description' => 'When Harry gets chosen as the fourth participant in the inter-school Triwizard Tournament, he is unwittingly pulled into a dark conspiracy that slowly unveils its dangerous agenda.',
                'genre' => json_encode(['Fantasy','Adventure','Dark']),
                'actor' => json_encode(['Daniel Radcliffe','Emma Watson','Rupert Grint','Robert Pattison']),
                'characterName'=> json_encode(['Harry Potter','Hermione Granger','Ron Weasley','Cedric Diggory']),
                'director' => 'Mike Newell',
                'releaseDate' => '2005',
                'thumbnail' => 'images/harry-potter-4.jpg',
                'background' => 'images/harry-potter-4.jpg'
            ],
            [
                'title' => 'Harry Potter and the  Order of the Phoenix',
                'description' => 'Harry Potter and Dumbledore warning about the return of Lord Voldemort is not heeded by the wizard authorities who, in turn, look to undermine Dumbledore authority at Hogwarts and discredit Harry.',
                'genre' => json_encode(['Fantasy','Adventure','Dark']),
                'actor' => json_encode(['Daniel Radcliffe','Emma Watson','Rupert Grint','Alan Rickman']),
                'characterName'=> json_encode(['Harry Potter','Hermione Granger','Ron Weasley','Severus Snape']),
                'director' => 'David Yates',
                'releaseDate' => '2007',
                'thumbnail' => 'images/harry-potter-5.jpg',
                'background' => 'images/harry-potter-5.jpg'
            ],
        ];

        DB::table('movie_data')->insert($data);
    }
}
