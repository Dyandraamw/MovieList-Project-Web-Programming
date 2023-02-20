@extends('navbar')

@section('title','Register')


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
    <h2 class="mt-5 text-white">Hello, Welcome  to <span class=" text-danger">Movie</span>List</h2>

    <form class="m-5 col-3"  method="POST" action="/register">
        @csrf
        <div class="mb-3 text-white">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control bg-secondary border-0" name="username" id="username" placeholder="Enter your username" value="{{ old('username') }}">
          </div>
        <div class="mb-3 text-white">
          <label for="email" class="form-label ">Email address</label>
          <input type="email" class="form-control bg-secondary border-0 " id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email" value="{{ old('email') }}" >

        </div>
        <div class="mb-3 text-white">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control bg-secondary border-0" id="password" name="password" placeholder="Enter your password">
        </div>
        <div class="mb-3 text-white">
            <label for="confirm" class="form-label">Confirm Password</label>
             {{-- <input type="password" class="form-control bg-secondary border-0" id="confirm" placeholder="Enter your confirm password">  --}}
             <input  type="password" class="form-control bg-secondary border-0 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Enter your  confirm password" id="password">

        </div>

        <input type="submit" class="btn mt-3 btn-danger col-12" value="Register">


      </form>

</div>
@endsection
