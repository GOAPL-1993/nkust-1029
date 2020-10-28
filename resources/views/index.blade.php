<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Auth Test</title>
    </head>
    <body>
        <h1>Auth Test
            @auth 
            :{{Auth::user()->name}}
            @endauth
        </h1>
        <hr>
        <button><a href='/'>Home</a></button>
        @guest
        <button><a href='/login'>Login</a></button>
        <button><a href='/register'>Register</a></button>
        @endguest
        @auth
        <button><a href='/member-only'>Member Area</a></button>
        <button><a href='/logout'>Logout</a></button>
        <button><a href='/dashboard'>Dashboard</a></button>
        @endauth
        <hr>
    </body>
</html>