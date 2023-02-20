<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: black;
        }
        #content {
            flex: 1;
        }

    </style>
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" id="navbar">
        <div class="container-fluid">
          <h1 class="navbar-brand text-danger">Movie<span class="navbar-brand text-white">List</span></h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-end ">
            <div class="navbar-nav">
              <a class="nav-link text-white" href="/">Home</a>
              <a class="nav-link text-white" href="/showMovie">Movies</a>
              <a class="nav-link text-white" href="/actors">Actors</a>
            </div>
            <div class="navbar-button">
                @auth
                    @if (Auth::user()->role =='user')
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle justify-content-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/editProfile">Edit Profile</a></li>
                            <form action="/logout" method="GET">
                                <input type="submit" value="Logout" class="dropdown-item">
                            </form>
                            </ul>
                        </div>

                    @else
                        <form action="/logout" method="GET">
                            <input type="submit" value="Logout" class="btn btn-warning">
                        </form>
                    @endif
                    {{-- <form action="/logout" method="GET">
                        <input type="submit" value="Logout" class="btn btn-warning">
                    </form> --}}
                @else
                    <a class="btn btn-primary" href="/register" role="button">Register</a>
                    <a class="btn btn-outline-primary" href="/login" role="button">Login</a>
                @endif
            </div>
          </div>
    </nav>

    <div class="height-full" id="content">
        @yield('content')
    </div>



    <div class="footer">
        <footer class="bg-dark d-flex flex-column align-items-center text-white">
            <h2 class=" text-danger p-2">Movie<span class=" text-white">List</span></h2>
            <p class=" h6 text-white"><span class=" text-danger">Movie</span>List is a website that contains a list of movies</p>
            <p class=" h6 text-white">© 2021 MovieList All Rights Reserved</p>

        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
