<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hazai · @yield('title')</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --bg:       #f5f5f0;
    --surface:  #ffffff;
    --border:   #e8e8e4;
    --text:     #1a1a1a;
    --muted:    #888;
    --accent:   #2563eb;
    --danger:   #dc2626;
    --success:  #16a34a;
    --radius:   8px;
}

body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    font-size: 14px;
    line-height: 1.5;
}

/*Wrapper*/
.wrap { max-width: 860px; margin: 0 auto; padding: 32px 16px 64px; }

/*Header*/
.site-header {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    margin-bottom: 28px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--border);
}
.site-header .logo { font-size: 18px; font-weight: 600; letter-spacing: -0.3px; }
.site-header .logo span { color: var(--accent); }
.site-header nav a {
    font-size: 13px;
    color: var(--muted);
    text-decoration: none;
    margin-left: 20px;
}
.site-header nav a:hover { color: var(--text); }
.site-header nav a.active { color: var(--accent); font-weight: 500; }

/*Alert*/
.alert {
    padding: 10px 14px;
    border-radius: var(--radius);
    font-size: 13px;
    margin-bottom: 20px;
    border: 1px solid transparent;
}
.alert-success { background: #f0fdf4; border-color: #bbf7d0; color: var(--success); }
.alert-danger   { background: #fef2f2; border-color: #fecaca; color: var(--danger); }

/*Card*/
.card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
}
.card-body { padding: 20px; }

/*Tombol*/
.btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 14px;
    border-radius: var(--radius);
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    border: 1px solid transparent;
    text-decoration: none;
    transition: opacity .15s;
    font-family: inherit;
}
.btn:hover { opacity: .85; }
.btn-primary { background: var(--accent); color: #fff; }
.btn-outline  { background: #fff; color: var(--text); border-color: var(--border); }
.btn-danger   { background: var(--danger); color: #fff; }
.btn-sm { padding: 4px 10px; font-size: 12px; }

/*Form*/
.form-group { margin-bottom: 16px; }
.form-label { display: block; font-size: 12px; font-weight: 600; color: var(--muted); text-transform: uppercase; letter-spacing: .04em; margin-bottom: 6px; }
.form-control, .form-select {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    font-family: inherit;
    font-size: 14px;
    color: var(--text);
    background: #fff;
    outline: none;
}
.form-control:focus, .form-select:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(37,99,235,.1); }
.form-row { display: grid; gap: 14px; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); }
.form-error { font-size: 12px; color: var(--danger); margin-top: 4px; }

/*Tabel*/
table { width: 100%; border-collapse: collapse; }
thead th {
    text-align: left;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .05em;
    color: var(--muted);
    padding: 10px 14px;
    border-bottom: 1px solid var(--border);
    background: var(--bg);
}
tbody td { padding: 11px 14px; border-bottom: 1px solid var(--border); vertical-align: middle; }
tbody tr:last-child td { border-bottom: none; }
tbody tr:hover td { background: #fafaf8; }
tfoot td { padding: 10px 14px; font-weight: 600; font-size: 13px; border-top: 1px solid var(--border); }

/*Section title*/
.section-title { font-size: 13px; font-weight: 600; color: var(--muted); text-transform: uppercase; letter-spacing: .05em; margin-bottom: 12px; }

/*Badge*/
.badge { display: inline-block; padding: 2px 8px; border-radius: 20px; font-size: 11px; font-weight: 500; background: #f0f0f0; color: var(--muted); }
</style>
</head>
<body>
<div class="wrap">

    <header class="site-header">
        <div class="logo">hazai<span>.</span></div>
        <nav>
            <a href="{{ route('pengeluaran.index') }}" class="{{ request()->routeIs('pengeluaran.index') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('pengeluaran.create') }}" class="{{ request()->routeIs('pengeluaran.create') ? 'active' : '' }}">+ Tambah</a>
        </nav>
    </header>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')

</div>
</body>
</html>
