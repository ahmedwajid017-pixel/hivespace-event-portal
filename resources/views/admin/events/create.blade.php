<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Event - HiveSpace</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f2f4f3;
            --surface: #ffffff;
            --ink: #14201c;
            --muted: #5f6f68;
            --line: #dfe5e2;
            --brand: #0f5c4d;
            --brand-hover: #0b4a3e;
            --honey: #f5b301;
            --danger: #b42318;
            --danger-bg: #fef3f2;
            --danger-line: #fecdca;
            --focus: rgba(15, 92, 77, 0.22);
            --font-display: "Bricolage Grotesque", "Segoe UI", system-ui, sans-serif;
            --font-body: "DM Sans", "Segoe UI", system-ui, -apple-system, sans-serif;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: var(--font-body);
            background: var(--bg);
            color: var(--ink);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar */
        .navbar {
            background: var(--ink);
            color: #fff;
            padding: 16px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: var(--font-display);
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        .logo svg { width: 26px; height: 26px; }

        .admin-label { color: #9fb3ab; font-size: 14px; }

        /* Layout */
        .container {
            width: 92%;
            max-width: 720px;
            margin: 40px auto 64px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--muted);
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 18px;
            border-radius: 6px;
        }

        .back-link:hover { color: var(--brand); }

        .card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: 0 1px 2px rgba(20, 32, 28, 0.04), 0 12px 32px -16px rgba(20, 32, 28, 0.18);
            overflow: hidden;
        }

        .card-header {
            padding: 32px 36px 26px;
            border-bottom: 1px solid var(--line);
            border-top: 4px solid var(--honey);
        }

        h1 {
            font-family: var(--font-display);
            font-size: 30px;
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.15;
            margin-bottom: 6px;
        }

        .subtitle { color: var(--muted); font-size: 15px; }

        .card-body { padding: 32px 36px 36px; }

        /* Error summary */
        .alert-error {
            background: var(--danger-bg);
            border: 1px solid var(--danger-line);
            color: var(--danger);
            padding: 16px 18px;
            border-radius: 10px;
            margin-bottom: 26px;
            font-size: 14px;
        }

        .alert-error strong { display: block; margin-bottom: 6px; }
        .alert-error ul { margin-left: 18px; }

        /* Form */
        .form-group { margin-bottom: 24px; }

        label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .hint { color: var(--muted); font-size: 13px; margin-top: 6px; }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fbfcfb;
            font-family: inherit;
            font-size: 15px;
            color: var(--ink);
            transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
        }

        input::placeholder,
        textarea::placeholder { color: #94a39c; }

        input:hover,
        textarea:hover { border-color: #c4cec9; }

        input:focus,
        textarea:focus {
            outline: none;
            background: #fff;
            border-color: var(--brand);
            box-shadow: 0 0 0 4px var(--focus);
        }

        input.is-invalid,
        textarea.is-invalid {
            border-color: var(--danger);
            background: var(--danger-bg);
        }

        .field-error { color: var(--danger); font-size: 13px; margin-top: 6px; }

        textarea { min-height: 150px; resize: vertical; line-height: 1.6; }

        input[type="date"] { max-width: 260px; }

        /* Actions */
        .actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 26px;
            border-top: 1px solid var(--line);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 22px;
            border-radius: 10px;
            border: 1px solid transparent;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-primary { background: var(--brand); color: #fff; }
        .btn-primary:hover { background: var(--brand-hover); }

        .btn-secondary { background: #fff; color: var(--ink); border-color: var(--line); }
        .btn-secondary:hover { background: #f4f6f5; border-color: #c4cec9; }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid var(--focus);
            outline-offset: 2px;
        }

        @media (max-width: 600px) {
            .navbar { padding: 14px 5%; }
            .admin-label { display: none; }
            .card-header { padding: 26px 22px 20px; }
            .card-body { padding: 24px 22px 28px; }
            h1 { font-size: 26px; }
            input[type="date"] { max-width: none; }
            .actions { flex-direction: column-reverse; }
            .btn { width: 100%; }
        }

        @media (prefers-reduced-motion: reduce) {
            * { transition: none !important; }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <polygon points="12,2 21,7 21,17 12,22 3,17 3,7" fill="#f5b301"/>
        </svg>
        HiveSpace
    </div>
    <div class="admin-label">Admin</div>
</nav>

<div class="container">

    <a href="{{ route('admin.events.index') }}" class="back-link">
        &larr; Back to events
    </a>

    <div class="card">

        <div class="card-header">
            <h1>Create new event</h1>
            <p class="subtitle">Add a community event for HiveSpace members.</p>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert-error" role="alert">
                    <strong>Please fix the following:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.events.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="title">Event title</label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="e.g. Community Meetup"
                        class="{{ $errors->has('title') ? 'is-invalid' : '' }}"
                    >

                    @error('title')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="What is this event about, and who should come?"
                        class="{{ $errors->has('description') ? 'is-invalid' : '' }}"
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="event_date">Event date</label>

                    <input
                        type="date"
                        id="event_date"
                        name="event_date"
                        value="{{ old('event_date') }}"
                        class="{{ $errors->has('event_date') ? 'is-invalid' : '' }}"
                    >

                    @error('event_date')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="actions">

                    <button type="submit" class="btn btn-primary">
                        Create event
                    </button>

                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>