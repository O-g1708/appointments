<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
            <div class="col-md-6 offset-md-3 border p-4 shadow bg-light">
                <div class="col-12">
                    <h2 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Lawyer appointment scheduling</h2>
                </div>
                <form action="{{ route('appointment.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="Email address">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control datetimepicker" name="time" id="time" placeholder="Appointment time">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary float-end">Book Appointment</button>
                        </div>
                    </div>
                </form>
                @if($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
            </div>
    </div>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#time').datetimepicker({
            format: 'DD-MM-YYYY HH:00'
        });
    });
</script>

</html>

