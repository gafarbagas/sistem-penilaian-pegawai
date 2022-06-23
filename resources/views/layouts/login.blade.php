<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    @include('includes.style')

</head>

<body class="hold-transition skin-blue sidebar-mini"
style="background: url(/admin/img/bg.png)no-repeat; background-size:cover; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; -ms-background-size:cover; min-height:100%;">
    
    <div class="container">

        <!-- Outer Row -->
        @yield('content')

    </div>

    <!-- Bootstrap core JavaScript-->
    @include('includes.script')

</body>

</html>