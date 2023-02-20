@extends('navbar')

@section('title','Edit Actor')


@section('content')
<div class=" height-full d-flex flex-column align-items-center bg-black mb-0">
    <h2 class="mt-5 text-white">Edit Actor</h2>


        @csrf
        @foreach ($details as $item)
        <form action="/editform" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $item->id }}">
            @include('Actor/editform')


        </form>
    @endforeach

</div>

@endsection
