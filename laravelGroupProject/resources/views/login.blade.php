@extends('navbar')

@section('title','Login')


@section('content')

<div class=" height-full d-flex flex-column align-items-center bg-black mb-0">
    <h2 class="mt-5 text-white">Hello, Welcome back to <span class=" text-danger">Movie</span>List</h2>

    <form class="m-5 col-3" action="/login" method="POST">
        @csrf
        <div class="mb-3 text-white">
          <label for="email" class="form-label ">Email address</label>
          <input type="email" class="form-control bg-secondary border-0 " id="email" aria-describedby="emailHelp" placeholder="Enter your email" name="email" value={{ Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : "" }}>

        </div>
        <div class="mb-3 text-white">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control bg-secondary border-0" id="password" placeholder="Enter your password" name="password">
        </div>
        <div class="mb-3 form-check text-white">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" checked={{ Cookie::get('mycookie') !==null }}>
          <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        </div>

        <input type="submit" class="btn btn-danger col-12" value="Login">
        {{-- Login</input> --}}
        <h6 class="mt-3 text-white">Don't have an account? <a class="link text-danger" href="/register">Register Now!</a></h6>
    </form>

</div>
@endsection
