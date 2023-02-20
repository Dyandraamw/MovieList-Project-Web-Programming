<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\MovieData;
use Database\Seeders\MovieActorsSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDO;

class MovieDataController extends Controller
{
    public function home(Request $request)
    {
        $keyword = $request->keyword;
        $movie = MovieData::where('title','LIKE','%'.$keyword.'%')
        ->paginate(4);


        return view('home',compact('movie','keyword'));
    }

    public function showMovie(Request $request)
    {
        $keyword = $request->keyword;
        $movie = MovieData::where('title','LIKE','%'.$keyword.'%')
        ->paginate(4);


        return view('Movie/showMovie',compact('movie','keyword'));
    }

    public function showDetail($id){
        $details = MovieData::where('id','LIKE',$id)
        ->get();

        $movie = MovieData::get();

        $actors = MovieData::join('movie_actors','movie_actors.movie_id','=','movie_data.id')
        ->join('actors','movie_actors.actor_id','=','actors.id')
        ->where('movie_actors.movie_id','LIKE',$id)
        ->get(['movie_data.id','actors.image','actors.id','actors.name']);

        return view('Movie/movieDetails',compact('details','actors','movie'));
   }

    public function addMovie()
    {
        $actors =DB::table('actors')->get();
        return view('Movie/addMovie',compact('actors'));
    }

    public function storeMovie(Request $request)
    {
        //$actor = $request->all();

        $request->validate([
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:8',
            'genre' => 'required',
            'actor' => 'required',
            'characterName' => 'required',
            'director' => 'required|min:3',
            'releaseDate' => 'required',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif',
            'background' => 'required|mimes:jpeg,jpg,png,gif'
        ]);
        $i=0;
        $genres = $request->input('genre');

        $genreArr[] = array();

        foreach($genres as $genre){
            $genreArr[$i] = $genre;
            $i++;
        }

        $charas = $request->input('characterName');

        $charaArr[] = array();
        $i=0;
        foreach($charas as $chara){
            $charaArr[$i] = $chara;
            $i++;
        }

        $actors = $request->input('actor');
        $actorArr[] =array();
        $i=0;
        foreach ($actors as $actor) {
            $actorName =  DB::table('actors')
            ->select('name')
            ->where('id','LIKE',$actor)
            ->get();
            $actorArr[$i] = json_decode($actorName) ;
            $i++;
        }

        $img = $request->file('thumbnail');
        $imgname = $img->getClientOriginalName();
        Storage::putFileAs('public/images',$img,$imgname);
        $imgurl = 'images/'.$imgname;

        $img2 = $request->file('background');
        $imgname2 = $img2->getClientOriginalName();
        Storage::putFileAs('public/images',$img2,$imgname2);
        $imgurl2 = 'images/'.$imgname2;

        DB::table('movie_data')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => json_encode($genreArr),
            'actor' => json_encode($actorArr),
            'characterName' => json_encode($charaArr),
            'director' => $request->director,
            'releaseDate' => $request->releaseDate,
            'thumbnail' => $imgurl,
            'background' => $imgurl2,
        ]);

        $maxid = DB::table('movie_data')->max('id');

        foreach ($actors as $actor) {
            DB::table('movie_actors')->insert([
                'actor_id'=> $actor,
                'movie_id'=>$maxid
            ]);

        }


        return redirect('/');
    }

    public function editMovie($id)
    {
        $details = MovieData::where('id','LIKE',$id)
        ->get();

        $actors =DB::table('actors')->get();


        return view('Movie/editMovie',compact('details','actors'));
    }

    public function editform(Request $request){
        $i=0;
        $genres = $request->input('genre');

        $genreArr[] = array();

        foreach($genres as $genre){
            $genreArr[$i] = $genre;
            $i++;
        }

        $charas = $request->input('characterName');

        $charaArr[] = array();
        $i=0;
        foreach($charas as $chara){
            $charaArr[$i] = $chara;
            $i++;
        }

        $actors = $request->input('actor');
        $actorArr[] =array();
        $i=0;
        foreach ($actors as $actor) {
            $actorName =  DB::table('actors')
            ->select('name')
            ->where('id','LIKE',$actor)
            ->get();
            $actorArr[$i] = json_decode($actorName) ;
            $i++;
        }

        $img = $request->file('thumbnail');
        $imgname = $img->getClientOriginalName();
        Storage::putFileAs('public/images',$img,$imgname);
        $imgurl = 'images/'.$imgname;

        $img2 = $request->file('background');
        $imgname2 = $img2->getClientOriginalName();
        Storage::putFileAs('public/images',$img2,$imgname2);
        $imgurl2 = 'images/'.$imgname2;

        DB::table('movie_data')
        ->where('id',$request->id)
        ->update([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => json_encode($genreArr),
            'actor' => json_encode($actorArr),
            'characterName' => json_encode($charaArr),
            'director' => $request->director,
            'releaseDate' => $request->releaseDate,
            'thumbnail' => $imgurl,
            'background' => $imgurl2,
        ]);


        return redirect('/');
    }

    public function deleteMovie($id)
    {
         $movie = MovieData::where('id','LIKE',$id)
         ->delete();

        return redirect('/');
    }
}
