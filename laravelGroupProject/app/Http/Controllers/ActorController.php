<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\MovieData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addActor()
    {
        return view('Actor/addActor');
    }

    public function showActors(Request $request)
    {
        //$actors =DB::table('actors')->get();

        // $movie = Actor::join('movie_actors','movie_actors.actor_id','=','actors.id')
        // ->join('movie_data','movie_actors.movie_id','=','movie_data.id')
        // ->where('movie_data.id','LIKE','movie_actors.movie_id')
        // ->get(['movie_data.title']);

        $keyword = $request->keyword;
        $actors = Actor::where('name','LIKE','%'.$keyword.'%')
        ->get();

        return view('Actor/showActors',compact('actors','keyword'));
    }

    public function home(Request $request)
    {
        $keyword = $request->keyword;
        $movie = MovieData::where('title','LIKE','%'.$keyword.'%')
        ->paginate(4);

        return view('home',compact('movie','keyword'));
    }


    public function showDetail($id){
        $details = DB::table('actors')
        ->where('id','LIKE',$id)
        ->get();

        $movie = Actor::join('movie_actors','movie_actors.actor_id','=','actors.id')
        ->join('movie_data','movie_actors.movie_id','=','movie_data.id')
        ->where('movie_actors.actor_id','LIKE',$id)
        ->get(['movie_data.id','movie_data.thumbnail','movie_data.title','movie_data.releaseDate']);

        return view('Actor/actorDetails',compact('details','movie'));
   }

   public function editActor($id)
    {
        $details = DB::table('actors')
        ->where('id','LIKE',$id)
        ->get();
        return view('Actor/editActor',compact('details'));
    }

    public function editform(Request $request)
    {
        //$actor = $request->all();

        $img = $request->file('image');
        $imgname = $img->getClientOriginalName();
        Storage::putFileAs('public/images',$img,$imgname);
        $imgurl = 'images/'.$imgname;

        DB::table('actors')
        ->where('id',$request->id)
        ->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'biography' => $request->biography,
            'dob' => $request->dob,
            'pob' => $request->pob,
            'image' => $imgurl,
            'popularity' => $request->popularity,
        ]);


        return redirect('/actors');
    }

    public function storeActor(Request $request)
    {
        //$actor = $request->all();

        $request->validate([
            'name' => 'required|min:3',
            'gender' => 'required',
            'biography' => 'required|min:10',
            'dob' => 'required',
            'pob' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'popularity' => 'required|numeric'
        ]);

        $img = $request->file('image');
        $imgname = $img->getClientOriginalName();
        Storage::putFileAs('public/images',$img,$imgname);
        $imgurl = 'images/'.$imgname;

        DB::table('actors')->insert([
            'name' => $request->name,
            'gender' => $request->gender,
            'biography' => $request->biography,
            'dob' => $request->dob,
            'pob' => $request->pob,
            'image' => $imgurl,
            'popularity' => $request->popularity,
        ]);


        return redirect('/admin/addActor');
    }


    public function deleteActor($id)
    {
         $actor = Actor::where('id','LIKE',$id)
         ->delete();

        return redirect('/actors');
    }
}
