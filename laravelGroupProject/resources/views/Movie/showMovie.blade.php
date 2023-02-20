@extends('navbar')

@section('title','Movies')


@section('content')

<div class="container-show bg-black mb-0 mt-5 col-12">
    <div class="container d-flex justify-content-between align-items-center">
        <h2 class=" text-danger  ">Show</h2>
        <form class="d-flex "role="search" method="GET" action="/showMovie">
            <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{ $keyword }}">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
    </div>

    <div class="flex-wrap d-flex justify-content-center mt-5 mb-5 ">
        @foreach ($movie as $item)
        <div class="card m-4 mb-4 bg-dark p-2 text-white" style="width: 15rem;">
            <img src="{{ url('storage/'.$item->thumbnail) }}" class="img-fluid card-img-top" style="height: 10rem;" alt="image">
            <div class="card-body">
              <h5 class="card-title">{{ $item->title }}</h5>
              <p class="card-text">{{ $item->releaseDate }}</p>
              <a href="movieDetail/{{ $item->id }}" class="btn btn-danger">Detail</a>
            </div>
        </div>
        @endforeach

    </div>
    <div class="pagination d-flex justify-content-center">
        {{ $movie->links() }}
    </div>

</div>

@endsection
