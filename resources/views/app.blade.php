<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Donasiku') - Platform Donasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
 
        :root {
            --green:      #2d7a3a;
            --green-light:#3fa050;
            --green-pale: #eaf5ec;
            --dark:       #111827;
            --dark-2:     #1e293b;
            --gray:       #6b7280;
            --gray-light: #f3f4f6;
            --white:      #ffffff;
            --radius:     12px;
            --shadow:     0 4px 24px rgba(0,0,0,.08);
        }
 
        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--dark);
            background: var(--white);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
 
        /* ── NAV ── */
        nav {
            background: var(--white);
            border-bottom: 1px solid #e5e7eb;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 8px rgba(0,0,0,.06);
        }
 
        .nav-brand {
            display: flex;
            align-items: center;
            gap: .5rem;
            text-decoration: none;
        }
        .nav-brand .icon {
            width: 36px; height: 36px;
            background: var(--green);
            border-radius: 10px;
            display: grid; place-items: center;
            color: #fff; font-size: 1.1rem;
        }
        .nav-brand span {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--green);
            font-weight: 700;
        }
 
        .nav-links {
            display: flex;
            gap: .25rem;
            list-style: none;
        }
        .nav-links a {
            display: block;
            padding: .45rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            color: var(--gray);
            font-size: .9rem;
            font-weight: 500;
            transition: all .2s;
        }
        .nav-links a:hover,
        .nav-links a.active {
            color: var(--green);
            background: var(--green-pale);
        }
 
        /* ── MAIN ── */
        main { flex: 1; }
 
        /* ── FOOTER ── */
        footer {
            background: var(--dark-2);
            color: #94a3b8;
            padding: 3rem 2rem 1.5rem;
        }
        .footer-grid {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #334155;
        }
        .footer-brand p { margin-top: .5rem; font-size: .875rem; line-height: 1.6; max-width: 280px; }
        .footer-brand .brand-name {
            font-family: 'Playfair Display', serif;
            color: var(--white);
            font-size: 1.2rem;
        }
        .footer-col h4 { color: var(--white); font-size: .875rem; font-weight: 600; margin-bottom: .75rem; }
        .footer-col a, .footer-col p {
            display: block;
            font-size: .85rem;
            color: #94a3b8;
            text-decoration: none;
            margin-bottom: .4rem;
            transition: color .2s;
        }
        .footer-col a:hover { color: var(--green-light); }
        .footer-copy {
            max-width: 1100px;
            margin: 1.25rem auto 0;
            text-align: center;
            font-size: .8rem;
        }
    </style>
    @stack('styles')
</head>
<body>
 
{{-- NAVBAR --}}
<nav>
    <a href="{{ url('/') }}" class="nav-brand">
        <div class="icon">♥</div>
        <span>Donasiku</span>
    </a>
    <ul class="nav-links">
        <li><a href="{{ url('/') }}"        class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ url('/profil') }}"  class="{{ request()->is('profil') ? 'active' : '' }}">Profil</a></li>
        <li><a href="{{ url('/kontak') }}"  class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a></li>
    </ul>
</nav>
 
{{-- PAGE CONTENT --}}
<main>
    @yield('content')
</main>
 
{{-- FOOTER --}}
<footer>
    <div class="footer-grid">
        <div class="footer-brand">
            <div class="brand-name">Donasiku</div>
            <p>Platform donasi sosial ini untuk saling membantu agar mendapatkan pahala secara transparan.</p>
        </div>
        <div class="footer-col">
            <h4>Navigasi</h4>
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ url('/profil') }}">Profil</a>
            <a href="{{ url('/kontak') }}">Kontak</a>
        </div>
        <div class="footer-col">
            <h4>Kontak</h4>
            <p>Email: info@donasi.com</p>
            <p>Telp : 08993000555</p>
        </div>
    </div>
    <p class="footer-copy">2026 donasi. All rights reserved</p>
</footer>
 
@stack('scripts')
</body>
</html>