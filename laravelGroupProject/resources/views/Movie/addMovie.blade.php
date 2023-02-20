@extends('navbar')
@section('title','Add Movie')


@section('content')


<div class=" height-full d-flex flex-column align-items-center bg-black mb-0">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="mt-5 text-white">Add Movie</h2>

    <form class="m-5 col-10" action="/admin/addMovie" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 text-white">
          <label for="title" class="form-label ">Title</label>
          <input type="text" class="form-control bg-secondary border-0 text-white" id="title" aria-describedby="title" name="title" >
        </div>

        <div class="mb-3 text-white">
            <label for="description" class="form-label ">Description</label>
            <input type="text" class="form-control bg-secondary border-0 text-white" id="description" aria-describedby="description" style="height: 100px" name="description">
        </div>

        <div class="mb-3 text-white">
            <label for="genre" class="form-label ">Genre</label>
            <br>
            <label for="genre" class="me-5"><input type="checkbox" name="genre[]" value="Fantasy"/>Fantasy</label>
            <label for="genre" class="me-5"><input type="checkbox" name="genre[]" value="Children"/>Children</label>
            <label for="genre" class="me-5"><input type="checkbox" name="genre[]" value="Adventure"/>Adventure</label>
            <label for="genre" class="me-5"><input type="checkbox" name="genre[]" value="Dark"/>Dark</label>
        </div>

        <div class="mb-3 text-white">
            <label for="Actors" class="form-label ">Actors</label>
            <br>
            <ul class="list-group text-white">
                @foreach ($actors as $item)
                    <li class="list-group-item bg-secondary text-white">
                        <input class="form-check-input me-1" type="checkbox" value="{{ $item->id }}" id="checkbox" name="actor[]">
                        <label class="form-check-label" for="checkbox">{{ $item->name }}</label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mb-3 text-white">
            <label for="characterName" class="form-label ">Character Name</label>
            <input type="text" class="form-control bg-secondary border-0 text-white" id="characterName" aria-describedby="characterName" name="characterName[]" >
        </div>

        <div class="mb-3 text-white">
            <label for="director" class="form-label ">Director</label>
            <input type="text" class="form-control bg-secondary border-0 text-white" id="director" aria-describedby="director" name="director" >
          </div>

        <div class="mb-3 text-white">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="date" class="form-control bg-secondary border-0 text-white" id="releaseDate" name="releaseDate">
        </div>

        <div class="mb-3 text-white">
            <label for="thumbnail" class="form-label">Thumbnail URL</label>
            <input class="form-control bg-secondary border-0 text-white" type="file" id="thumbnail" aria-describedby="thumbnail" name="thumbnail">
        </div>

        <div class="mb-3 text-white">
            <label for="background" class="form-label">Background URL</label>
            <input class="form-control bg-secondary border-0 text-white" type="file" id="background" aria-describedby="background" name="background">
        </div>

        <button type="submit" class="btn btn-danger col-5">Create</button>
    </form>

</div>
@endsection
