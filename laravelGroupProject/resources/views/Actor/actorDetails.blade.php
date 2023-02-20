@extends('navbar')

@section('title','Actor Details')


@section('content')
<div class="container mt-5 mb-5">
    @foreach ($details as $actor)
    <div class="row">
        <div class="col-4 ">
            <div class="card bg-black text-white" style="width: 15rem;">
                <img src="{{ url('storage/'.$actor->image) }}" class="card-img-top" style="height: 20rem;" alt="image">
                <div class="card-body p-0">
                    <h4 class="card-title my-3">Personal Info</h4>
                  <h5 class="card-title mt-3">Popularity</h5>
                  <p class="card-text">{{ $actor->popularity }}</p>

                  <h5 class="card-title mt-3">Gender</h5>
                  <p class="card-text">{{ $actor->gender }}</p>

                  <h5 class="card-title mt-3">Birthday</h5>
                  <p class="card-text">{{ $actor->dob }}</p>

                  <h5 class="card-title mt-3">Place of Birth</h5>
                  <p class="card-text">{{ $actor->pob }}</p>


                    @auth
                        @if (Auth::user()->role =='admin')
                            <a href="/editActor/{{ $actor->id }}" class="btn btn-danger">Edit</a>
                            <form action="/deleteActor/{{ $actor->id }}" method="POST">
                                {{ method_field('DELETE') }}
                                @csrf
                                <input type="submit" class="btn btn-success mt-5" value="Delete" >
                            </form>
                            {{-- <a href="/deleteActor/{{ $actor->id }}" class="btn btn-success">Delete</a> --}}
                        @endif
                    @endauth
                </div>
              </div>
        </div>
        <div class="col-8 text-white">
            <h1 class="card-title mb-5">{{ $actor->name }}</h1>

            <h5 class="card-title mt-3">Biography</h5>
            <p class="card-text">{{ $actor->biography }}</p>

            <h5 class="card-title mt-5">Known For</h5>
            <div class="flex-wrap d-flex justify-content-center mt-2 mb-5 ">
                @foreach ($movie as $item)
                <div class="card m-4  bg-dark p-2 text-white" style="width: 13rem;">
                    <img src="{{ url('storage/'.$item->thumbnail) }}" class="img-fluid card-img-top" style="height: 10rem;" alt="image">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->title }}</h5>
                      <p class="card-text">{{ $item->releaseDate }}</p>
                      <a href="/movieDetail/{{ $item->id }}" class="btn btn-danger">Detail</a>
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
