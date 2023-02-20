<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actors = [
            ['id' => '1','name' => 'Daniel Radcliffe','gender' => 'Male','biography' => 'He played in the Harry Potter franchise as the main character','dob' => '2023-01-01','pob' => 'London, UK','image' => 'images/daniel-radcliffe.jpg','popularity' => '89'],
            ['id' => '2','name' => 'Tom Felton','gender' => 'Male','biography' => 'He played in the Harry Potter franchise as Draco Malfoy','dob' => '2016-01-04','pob' => 'Coventry, UK','image' => 'images/tom-felton.JPG','popularity' => '87'],
            ['id' => '3','name' => 'Emma Watson','gender' => 'Female','biography' => 'She played in the Harry Potter franchise as Hermione Granger','dob' => '2023-01-04','pob' => 'Brighton, UK','image' => 'images/emma-watson.jpg','popularity' => '99'],
            ['id' => '4','name' => 'Rupert Grint','gender' => 'Male','biography' => 'He played in the Harry Potter franchise as Ron Weasley','dob' => '2023-02-02','pob' => 'London, UK','image' => 'images/rupert-grint.jpeg','popularity' => '67'],
            ['id' => '5','name' => 'Alan Rickman','gender' => 'Male','biography' => 'He played in the Harry Potter franchise as Severus Snape','dob' => '2023-01-10','pob' => 'New York, USA','image' => 'images/alan-rickman.jpg','popularity' => '77'],
            ['id' => '6','name' => 'Garry Oldman','gender' => 'Male','biography' => 'He played in the Harry Potter franchise as Sirius Black','dob' => '2023-01-18','pob' => 'Coventry, UK','image' => 'images/garry-oldman.jpg','popularity' => '88'],
            ['id' => '7','name' => 'Richard Harris','gender' => 'Male','biography' => 'He played in the Harry Potter franchise as Albus Dumbledore','dob' => '2023-01-08','pob' => 'Brighton, UK','image' => 'images/richard-harris.jpg','popularity' => '78'],
            ['id' => '8','name' => 'Robert Pattison','gender' => 'Male','biography' => 'He played in the Harry Potter franchise as Cedric Diggory','dob' => '2023-01-15','pob' => 'Coventry, UK','image' => 'images/robert-pattison.jpg','popularity' => '98']
        ];
        DB::table('actors')->insert($actors);
    }
}
