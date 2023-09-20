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
                <hr>
            </div>
        </header>

        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-md-3">
                        
                    </div>
                    <main class="col col-12 col-md-9">
                        <x-notifications />
                        <h1 class="h3 mb-4">{{ $title }}</h1>
                        {{ $slot }}
                    </main>
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