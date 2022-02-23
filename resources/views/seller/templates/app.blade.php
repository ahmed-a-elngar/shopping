<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.10.1-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/styles.css') }}">
    <title>@yield('page_title')</title>
</head>
<body>

<div class="main-container">
    <div class="side-section">
        <!-- navbar  -->
        @include('seller.templates.navbar')
    </div>
    <div class="main-section">
        <div class="main-body">
            @yield('page_content')
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
@yield('js_content_src')
<script>
    @yield('js_content')
</script>
</body>
</html>