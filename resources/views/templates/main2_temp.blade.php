<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MY PORTFOLIO')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    @yield('custom_css')
    
    <style>
        /* Base styles if custom_css is not provided */
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #101010;
            color: #fff;
        }
    </style>
</head>
<body>
    @yield('content')
    
    <!-- Default Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>