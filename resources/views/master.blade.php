<!DOCTYPE html>
<html>
<head>
    <title>QuikTrop</title>

    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="/styles/styles.css">
    @yield('head_actions')
</head>
<body>
<div class="container">

    <div class="demo-layout-transparent mdl-layout mdl-js-layout">
        <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">QuikTrip</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="">Login</a>
                    <a class="mdl-navigation__link" href="">Sign Up</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">QuikTrip</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Login</a>
                <a class="mdl-navigation__link" href="">Sign Up</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            @yield('content')
        </main>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@yield('footer_scripts')
</body>
</html>
