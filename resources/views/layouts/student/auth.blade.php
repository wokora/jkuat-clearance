<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'JKUAT')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/css/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.css">
</head>
<body class="hold-transition login-page">

   @yield('content')

<!-- jQuery -->
<script src="/js/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="/js/adminlte.js"></script>
</body>
</html>
