<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title??"None" }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
</head>

<body>
    <div style="background-color: black; color: white; padding-top: 10px; padding-bottom: 10px">
        <div class="container">
            <a href="{{ route('companies.index') }}" style="padding: 10px; text-decoration: none; color: rgb(64, 137, 255)">Companies</a>
            <a href="{{ route('employees.index') }}" style="padding: 10px; margin-left: 20px; text-decoration: none; color: rgb(64, 137, 255)">Employees</a>
        </div>
    </div>
    <div class="container-xl">
        @yield('content')
    </div>
</body>

</html>
