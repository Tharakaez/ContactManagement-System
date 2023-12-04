<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS By TharakaEz</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    {{-- Include Styles --}}
    @include('libraries.userStyle')
    {{-- Submit BTN --}}
    <link rel="stylesheet" href="{{asset('assets/css/pages/submit-btn.css')}}">
</head>

<body>
    {{-- Include Content --}}
    @yield('content')


    {{-- Include Scripts --}}
    @include('libraries.userScript')
    {{-- Submit BTN --}}
    <script src="{{asset('assets/js/pages/submitBtn.js')}}"></script>
</body>

</html>
