<!-- resources/views/mail/hello.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .content {
            padding: 20px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        @yield('head-mail')
    </div>

    <div class="content">
        @yield('content-mail')
    </div>

    <div class="footer">
        @yield('footer-mail')
    </div>
</body>
</html>
