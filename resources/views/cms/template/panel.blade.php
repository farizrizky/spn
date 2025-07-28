<!DOCTYPE html>
<html lang="en">
    <head>
        @include('cms.partial.panel-head')
    </head>
  <body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="dark">
            @include('cms.partial.panel-menu')
        </div>

        <div class="main-panel">
            <div class="main-header">
                @include('cms.partial.panel-header')
            </div>

            <div class="container">
                @yield('content')
            </div>

            <footer class="footer">
               @include('cms.partial.panel-footer')
            </footer>
        </div>
        <!-- End Navbar -->
        
        @include('cms.partial.panel-script')
        @yield('script')
        
        @if(Session::get('notify'))
        @include('cms.partial.notify')
        @endif

        @if(Session::get('sweetalert'))
        @include('cms.partial.sweetalert')
        @endif
        
     </body>
</html>
