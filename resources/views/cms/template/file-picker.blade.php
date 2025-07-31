<!DOCTYPE html>
<html lang="en">
    <head>
        @include('cms.partial.panel-head')
    </head>
  <body>
    <div class="wrapper">

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <div class="logo-header" data-background-color="dark">
                    <a href="#" class="text-white">
                        File Picker
                    </a>
                </div>
            </div>
            <div class="container">
                @yield('content')
            </div>

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
