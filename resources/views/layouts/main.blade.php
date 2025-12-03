<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Laptop Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        h4,
        h5 {
            color: #CF8507;
        }

        h4 a,
        h5 a {
            color: #CF8507;
            text-decoration: underline;
        }

        h4 a:hover,
        h5 a:hover {
            color: #CF8507;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class=" container mt-3">
        <div class="row">
            <div class="col-sm-12">
                @include('layouts.header')
            </div><!--header-->
        </div>
        <div class="row">
            <div class="col-sm-9">
                {{-- @yield: display content of section --}}
                @yield('content')
                {{-- or use code below: @section('content') @show --}}
            </div><!--content-->
        </div>

    </div>
</body>

</html>