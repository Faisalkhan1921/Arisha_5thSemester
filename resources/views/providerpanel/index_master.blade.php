<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    @include('providerpanel.body.css')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
      @include('providerpanel.body.mobilenav')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
       @include('providerpanel.body.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
          @include('providerpanel.body.nav')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                      @yield('user_content')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    @include('providerpanel.body.js')

</body>

</html>
<!-- end document-->
