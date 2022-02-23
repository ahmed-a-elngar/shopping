<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{csrf_token()}}">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.10.1-web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/styles.css') }}">
</head>
<body>
{{--    @if (! \Illuminate\Support\Facades\Auth::user())--}}
{{--        <script>--}}
{{--            window.location.href = '../home';--}}
{{--        </script>--}}
{{--    @endif--}}
    <!-- navbar  -->
    @include('customer.templates.navbar')
    @yield('page_content')
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
@section('js_content_src')
    <script src="{{asset('js/customer/home.js')}}"></script>
@show
<script>
    @yield('js_content')
</script>
</body>
</html>