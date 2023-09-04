@props([
    'title'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div class="container">
            HEADER
        </div>
    </header>

    <div>
        <div class="container">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    <footer>
        <div class="container">
            FOOTER
        </div>
    </footer>
</body>
</html>