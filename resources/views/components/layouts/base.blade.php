@props([
    'title'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/main.css'])
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                HEADER

                @auth
                    <a href="{{ route('login.exit') }}">Logout</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endif
                
                <hr>
            </div>
        </header>

        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-md-3">
                        <ul class="nav nav-pills flex-column mb-auto">    
                        @auth                        
                            <li>
                                <a href="{{ route('home') }}" class="nav-link link-dark">Home page</a>
                            </li>
                            <li>
                                <a href="{{ route('tags.index') }}" class="nav-link link-dark">Tags</a>
                            </li>
                            <li>
                                <a href="{{ route('posts.index') }}" class="nav-link link-dark">Posts</a>
                            </li>
                            <li>
                                <a href="{{ route('videos.index') }}" class="nav-link link-dark">Videos</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.password.edit') }}" class="nav-link link-dark">Change password</a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}" class="nav-link link-dark">Users</a>
                            </li>                           
                        @else
                            <li>
                                <a href="{{ '/' }}" class="nav-link link-dark">Blog</a>
                            </li> 
                        @endif
                        </ul>
                    </div>
                    <div class="col col-12 col-md-9">
                        @if(!auth()->user()->email_verified_at)
                            <div class="alert alert-danger">
                                Verify email please
                            </div>
                        @endif
                        <x-notifications />
                        <h1 class="h3 mb-4">{{ $title }}</h1>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <hr>
                FOOTER
            </div>
        </footer>
    </div>
</body>
</html>