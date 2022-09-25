<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body  class="horizontal-layout horizontal-menu" data-open="hover" data-menu="horizontal-menu">
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.scripts')
</body>
</html>
