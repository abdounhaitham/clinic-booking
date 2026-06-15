<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ClinicBook') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="antialiased" style="background: #f0fdf8; min-height: 100vh; display: flex; align-items: center; justify-content: center;">

    <div style="width: 100%; max-width: 440px; padding: 24px;">

        <!-- Logo -->
        <div style="text-align: center; margin-bottom: 32px;">
            <a href="/" style="display: inline-flex; align-items: center; gap: 10px; text-decoration: none;">
                <div style="width: 40px; height: 40px; background: #0d9488; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <svg width="22" height="22" fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <span style="font-size: 22px; font-weight: 700; color: #0f766e;">ClinicBook</span>
            </a>
        </div>

        <!-- Card -->
        <div style="background: white; border-radius: 20px; padding: 36px; border: 1px solid #e2e8f0; box-shadow: 0 4px 24px rgba(0,0,0,0.06);">
            {{ $slot }}
        </div>

        <p style="text-align: center; margin-top: 20px; font-size: 13px; color: #94a3b8;">
            © 2026 ClinicBook. All rights reserved.
        </p>
    </div>

</body>
</html>