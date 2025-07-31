<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PT. Sindo Prima Niaga - {{ $title ?? 'Professional, Fast, Save, and Competitive' }}</title>
        @include('web.partial.head')
    </head>
    <body>
        <!-- preloader -->
        @include('web.partial.preloader')
        
        <!-- header area starts -->
        <header class="header-area">
            <!-- header top -->
            {{-- @include('web.partial.topbar') --}}

            <!-- menu area -->
            @include('web.partial.menu')
        </header>
        
        <main class="main">
            @yield('content')
        </main>

        <!-- footer area starts -->
        @include('web.partial.footer')

        <!-- javascript files -->
        @include('web.partial.script')

        @include('web.partial.whatsapp-button')
        @yield('script')
    </body>
</html>

