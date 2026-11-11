<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>{{ config('app.name') }}</title>
    <style>
        :root { color-scheme: light dark; --text: #1b1b18; --muted: #4a4a45; --page: #fdfdfc; --link: #1f4fd1; }
        @media (prefers-color-scheme: dark) { :root { --text: #ededec; --muted: #c2c2bc; --page: #0f0f0e; --link: #9db9ff; } }
        body { margin: 0; font: 1rem/1.6 system-ui, sans-serif; color: var(--text); background: var(--page); }
        main { max-width: 36rem; margin: 0 auto; padding: 4rem 1rem; }
        p { color: var(--muted); }
        a { color: var(--link); }
    </style>
</head>
<body>
<main>
    <h1>{{ config('app.name') }}</h1>
    <p>No campaign is live yet. Sign in to the backend, open the campaign and set it live; this page then sends
        visitors to it.</p>
    <p><a href="{{ route('laranail-waitlist-kit.admin.dashboard') }}">Open the backend</a></p>
    <p>No administrator yet? Run <code>php artisan laranail::waitlist-kit.admin you@example.com</code>.</p>
</main>
</body>
</html>
