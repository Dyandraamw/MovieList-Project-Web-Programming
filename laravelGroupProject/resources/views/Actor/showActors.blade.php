@extends('navbar')

@section('title','Actors')


@section('content')

<div class="container bg-black mb-0 mt-5 col-10">
    <div class="container d-flex justify-content-between align-items-center" style="height: 50px">
        <h2 class=" text-danger  ">Actors</h2>

        <form class="d-flex "role="search" method="GET" action="/actors">
            <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{ $keyword }}">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>

        @auth
            @if (Auth::user()->role =='admin')
                <a class="btn btn-danger" href="/admin/addActor" role="button">Add Actor</a>
            @endif
        @endauth

    </div>

    <div class="flex-wrap d-flex justify-content-center mt-5 ">
        @foreach ($actors as $actor)
        <div class="card m-4 mb-4 bg-dark p-2 text-white" style="width: 15rem;">
            <img src="{{ url('storage/'.$actor->image) }}" class="img-fluid card-img-top" style="height: 10rem;" alt="image">
            <div class="card-body">
              <h5 class="card-title">{{ $actor->name }}</h5>
              <p class="card-text">
                {{-- {{ $tname }} --}}
                 {{-- @foreach ($movie as $item)
                    {{ $item->title }},
                @endforeach --}}
              </p>
              <a href="actorDetail/{{ $actor->id }}" class="btn btn-danger">Detail</a>

            </div>
        </div>
        @endforeach
    </div>



</div>

@endsection
