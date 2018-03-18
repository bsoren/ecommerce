<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Panel - @yield('title')</title>

    <link rel="stylesheet" href="/css/all.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="/js/all.js"></script>

</head>
<body>

    @include('includes.admin-sidebar')

    <div class="off-canvas-content admin_title_bar" data-off-canvas-content>

        <div class="title-bar">
            <div class="title-bar-left">
                <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
                <span class="title-bar-title">{{ getenv('APP_NAME') }}</span>
            </div>
        </div>

        @yield('content')

    </div>

</body>
</html>