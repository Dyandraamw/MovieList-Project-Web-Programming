@extends('navbar')

@section('title','Edit Movie')


@section('content')
<div class=" height-full d-flex flex-column align-items-center bg-black mb-0">
    <h2 class="mt-5 text-white">Edit Movie</h2>
        @csrf
        @foreach ($details as $item)
        <form action="/editformM" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $item->id }}">
            @include('Movie/editformM')


        </form>
    @endforeach

</div>

@endsection
