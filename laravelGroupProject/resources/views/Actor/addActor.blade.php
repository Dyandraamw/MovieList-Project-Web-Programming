@extends('navbar')

@section('title','Add Actor')


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
    <h2 class="mt-5 text-white">Add Actor</h2>

    <form class="m-5 col-10" action="/admin/addActor" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 text-white">
          <label for="name" class="form-label ">Name</label>
          <input type="text" class="form-control bg-secondary border-0 text-white" id="name" aria-describedby="name" name="name" >
          {{-- @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif --}}
        </div>

        <div class="mb-3 text-white">
            <label for="gender" class="form-label ">Gender</label>
            <select class="form-select bg-secondary border-0 text-white" aria-label="Select Gender" id="gender" name="gender">
                <option selected>Open this select menu</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
        </div>

        <div class="mb-3 text-white">
            <label for="biography" class="form-label ">Biography</label>
            <input type="text" class="form-control bg-secondary border-0 text-white" id="biography" aria-describedby="biography" style="height: 100px" name="biography">
        </div>

        <div class="mb-3 text-white">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control bg-secondary border-0 text-white" id="dob" name="dob">
        </div>

        <div class="mb-3 text-white">
            <label for="pob" class="form-label ">Place of Birth</label>
            <input type="text" class="form-control bg-secondary border-0 text-white " id="pob" aria-describedby="pob" name="pob">
        </div>

        <div class="mb-3 text-white">
            <label for="image" class="form-label">Image Url</label>
            <input class="form-control bg-secondary border-0 text-white" type="file" id="image" aria-describedby="image" name="image">
        </div>

        <div class="mb-3 text-white">
            <label for="popularity" class="form-label ">Popularity</label>
            <input type="text" class="form-control bg-secondary border-0 text-white " id="popularity" aria-describedby="popularity" name="popularity">
        </div>

        <button type="submit" class="btn btn-danger col-5">Create</button>
    </form>

</div>
@endsection
