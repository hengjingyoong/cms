<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials._head')
</head>
<body>

@include('layouts.partials._nav')

@yield('content')

@include('layouts.partials._footer')
@include('layouts.partials._javascript')
</body>
</html>