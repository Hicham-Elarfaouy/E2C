<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Page Not Found - E2C</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">

    <!-- Scripts -->
    @vite(['resources/css/main.css'])
</head>
<body>
<main>
    <section class="py-5 mt-5">
        <div class="container">
            <div class="row row-cols-1 d-flex justify-content-center align-items-center">
                <div class="col-md-10 text-center"><img class="img-fluid w-100" src="{{ asset('storage/img/illustrations/404.svg') }}"></div>
                <div class="col text-center">
                    <h2 class="display-3 fw-bold mb-4">Page Not Found</h2>
                    <p class="fs-4 text-muted">Fusce adipiscing sit, torquent porta pulvinar.</p>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
