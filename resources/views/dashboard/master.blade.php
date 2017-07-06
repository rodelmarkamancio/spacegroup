<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Space Group | Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ URL::asset('build/css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Navigation -->
        @include ('dashboard.nav')

        <div class="content-wrapper py-3">
            <div class="container-fluid">

                <!-- Breadcrumbs -->
                @include ('dashboard.breadcrumbs')

                @yield ('content')
                {{-- @include ('dashboard.info') --}}

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-wrapper -->

        <a class="scroll-to-top rounded" href="#">
            <i class="fa fa-chevron-up"></i>
        </a>

        <script src="{{ URL::asset('build/js/admin.js') }}"></script>
        @yield ('footerjs')
    </body>
</html>