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
            <div class="row">
                <div class="col col-12 col-md-3">
                    <ul>
                        <li><x-navs.link route="home">Home</x-navs.link></li>
                        <li><x-navs.link route="categories.index">Categories</x-navs.link></li>
                        <li><x-navs.link route="categories.trash">Trash</x-navs.link></li>
                        <li><x-navs.link route="posts.index">Posts</x-navs.link></li>
                    </ul>
                </div>
                <main class="col col-12 col-md-9">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            FOOTER
        </div>
    </footer>
</body>
</html>