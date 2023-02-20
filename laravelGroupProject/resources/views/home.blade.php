@extends('navbar')

@section('title','Home')

@section('style')

@endsection
 <style>
    .image {
        width: 100%;
        height: 400px;

    }
    .carousel-inner{
        width:100%;
        position: absolute;
    }
    .carousel-caption {
        text-align: left!important;
        top: 30%;
    }
    .container-show{
        position: relative;
    }

 </style>
@section('content')
<div class="container-fluid bg-black mb-5  p-0 col-12">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        @foreach ($movie->slice(0,3) as $item)
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                    <img src="{{ url('storage/'.$item->background) }}" class="image" alt="..." style=" filter: brightness(30%);">
                    <div></div>
                    <div class="carousel-caption text-left  ">

                        <h4>{{ $item->genre[0] }}   &nbsp |  &nbsp {{ $item->releaseDate }}</h4>
                        <h2>{{ $item->title }}</h2>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>

        @endforeach

    </div>
</div>

<div class="container-show bg-black mb-0 mt-5 col-12">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class=" text-danger  ">Popular</h1>

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


<div class="container-show bg-black mb-0 mt-5 col-12">
    <div class="container d-flex justify-content-between align-items-center">
        <h2 class=" text-danger  ">Show</h2>
        <form class="d-flex "role="search" method="GET" action="/">
            <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{ $keyword }}">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
        @auth
            @if (Auth::user()->role =='admin')
                <a class="btn btn-danger" href="/admin/addMovie" role="button">Add Movie</a>
            @endif
        @endauth

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
