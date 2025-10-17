<!DOCTYPE html>
<html lang="en">

@include('Admin.layouts.head-tag')
<body>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    @include('Admin.layouts.navbar-part')
    @include('Admin.layouts.navbar-part-two')

    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

  @include('Admin.layouts.sidebar-part')





    <div id="content" class="main-content">

        @yield("content")

        @include('Admin.layouts.footer-tag')
    </div>
    </div>
    @include('Admin.layouts.js')

</body>



</html>
