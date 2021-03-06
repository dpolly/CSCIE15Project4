{{--
    11-29-2014 DMP: Created
    12-06-2014 DMP: Modified design
    12-15-2014 DMP: fixed issue with Logo
--}}

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>@yield('title', 'Dpolly.me P4')</title>
    <link rel="stylesheet" href='{{ URL::asset('css/foundation.css') }}' />
    <link rel="stylesheet" href='{{ URL::asset('css/app.css') }}' />
    <script src="{{ URL::asset('/js/vendor/jquery.js') }}"></script>
    <script src="{{ URL::asset('/js/vendor/fastclick.js') }}"></script>
    <script src="{{ URL::asset('js/foundation/foundation.js') }}"></script>
    <script src="{{ URL::asset('/js/foundation/foundation.accordion.js') }}"></script>

</head>
<body>
    <script>
      $(document).foundation();
    </script>

     <div id="header" class="row">
            <div class="small-2 columns">
                  <img src="{{ URL::asset('img/logo.png')}}" alt="Logo">
            </div>
            <div class="small-10 columns">
                  <div class="panel">
                        <h1>Plant Database</h1>
                        <h4>A Part of Every Horticulturist's Digital Toolbox is the Plant Database</h4>
                  </div>
            </div>
     </div>

    <div id="content" class="row">
        <div class="small-12">
            <div class="panel">
                <div class="small-4 columns">
                    <div class="panel">
                                <a href="/plant">SEARCH Database</a><br>
                                <a href="/plant/create">ADD New Plant</a><br>

                    </div>
                </div>
                <div class="small-8 columns">
                    <div class="panel">
                       @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer" class="row">
        <div class="panel" >
            <h6>CSCIE-15 Dynamic Web Applications Project 4</h6>
        </div>
    </div>

    <script>
      $(document).foundation();
    </script>

</body>
</html>