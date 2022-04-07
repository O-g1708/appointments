<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <form action="{{ route('appointment.store') }}" method="post">
            {{ csrf_field() }}

            <div class="col-md-6 offset-md-3 border p-4 shadow bg-light">
                <div class="col-12">
                    <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Lawyer appointment scheduling</h3>
                </div>
                <form action="">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="Email address">
                        </div>
                        <div class="col-md-6">
                            <input type="date" name="date" class="form-control" placeholder="Enter Date">
                        </div>
                        <div class="col-md-6">
                            <input type="time" name="time" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary float-end">Book Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>


</body>
</html>

