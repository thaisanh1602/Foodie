<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foodie</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- SUMMERNOTE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <!-- font-awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div>@include('layouts.header')</div>
    <div>
        {{-- @yield: display content of section --}}
        @yield('content')
        {{-- or use code below: @section('content') @show --}}
    </div><!--content-->
    </div>
</body>

</html>