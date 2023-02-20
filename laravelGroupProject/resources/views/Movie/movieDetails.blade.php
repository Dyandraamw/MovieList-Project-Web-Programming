@extends('navbar')

@section('title','Movie Details')


@section('content')
<div class="container p-10">
    @foreach ($details as $item)
    <img src="{{ url('storage/'.$item->background) }}" class="mb-5 p-0" style="width:100%; height:300px; filter:brightness(20%);" alt="image">
    <div class="row">
        <div class="col-4 ">
            <div class="card bg-black text-white" style="width: 15rem;">

                <img src="{{ url('storage/'.$item->thumbnail) }}" class="card-img-top" style="height: 20rem;" alt="image">
                <div class="card-body p-0">
                    <h4 class="card-title my-3">Info</h4>
                  <h5 class="card-title mt-3">Genre</h5>
                  <p class="card-text">
                    @foreach ($item->genre as $gen)
                        | {{ $gen }} |&NoBreak;
                    @endforeach
                    </p>

                  <h5 class="card-title mt-3">Director</h5>
                  <p class="card-text">{{ $item->director }}</p>

                    @auth
                        @if (Auth::user()->role =='admin')
                        <a href="/editMovie/{{ $item->id }}" class="btn btn-danger">Edit</a>
                        <form action="/deleteMovie/{{ $item->id }}" method="POST">
                            {{ method_field('DELETE') }}
                            @csrf
                            <input type="submit" class="btn btn-success mt-5" value="Delete" >
                        </form>
                        @endif
                    @endauth

                  {{-- <a href="/editActor/{{ $item->id }}" class="btn btn-danger">Edit</a> --}}
                </div>
              </div>
        </div>
        <div class="col-8 text-white">
            <h1 class="card-title mb-5">{{ $item->title }}</h1>

            <h5 class="card-title mt-3">Description</h5>
            <p class="card-text">{{ $item->description }}</p>

            <h5 class="card-title mt-5 text-danger">Casts</h5>
            <div class="flex-wrap d-flex justify-content-center mt-2 mb-5 ">
                @foreach ($actors as $actor)
                <div class="card m-4  bg-dark p-2 text-white" style="width: 13rem;">
                    <img src="{{ url('storage/'.$actor->image) }}" class="img-fluid card-img-top" style="height: 10rem;" alt="image">
                    <div class="card-body">
                      <h5 class="card-title">{{ $actor->name }}</h5>

                      {{-- <a href="actorDetail/{{ $actor->id }}" class="btn btn-danger">Detail</a> --}}
                    </div>
                </div>
                @endforeach

            </div>
            <h5 class="card-title mt-5 text-danger">More</h5>
            <div class="flex-wrap d-flex justify-content-center mt-5 mb-5 ">
                @foreach ($movie as $item)
                <div class="card m-4 mb-4 bg-dark p-2 text-white" style="width: 15rem;">
                    <img src="{{ url('storage/'.$item->thumbnail) }}" class="img-fluid card-img-top" style="height: 10rem;" alt="image">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->title }}</h5>
                      <p class="card-text">{{ $item->releaseDate }}</p>
                      </div>
                </div>
                @endforeach

            </div>
            {{-- <p class="card-text">{{ $actor->popularity }}</p> --}}

        </div>
    </div>
    @endforeach
</div>

@endsection
