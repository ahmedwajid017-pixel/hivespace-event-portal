<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Events - HiveSpace</title>

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
            --honey-soft: #fff6dc;
            --danger: #b42318;
            --danger-bg: #fef3f2;
            --ok: #067647;
            --ok-bg: #ecfdf3;
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
            max-width: 1120px;
            margin: 40px auto 64px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 16px;
            margin-bottom: 26px;
        }

        .header h1 {
            font-family: var(--font-display);
            font-size: 34px;
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin-bottom: 6px;
        }

        .header p { color: var(--muted); }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 11px 18px;
            border-radius: 10px;
            border: 1px solid transparent;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-primary { background: var(--brand); color: #fff; }
        .btn-primary:hover { background: var(--brand-hover); }

        .btn-sm { padding: 7px 14px; font-size: 13px; }

        .btn-edit { background: #fff; color: var(--ink); border-color: var(--line); }
        .btn-edit:hover { background: #f4f6f5; border-color: #c4cec9; }

        .btn-delete { background: #fff; color: var(--danger); border-color: var(--line); }
        .btn-delete:hover { background: var(--danger-bg); border-color: #fecdca; }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid var(--focus);
            outline-offset: 2px;
        }

        /* Success message */
        .success {
            background: var(--ok-bg);
            border: 1px solid #abefc6;
            color: var(--ok);
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        /* Table card */
        .card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: 0 1px 2px rgba(20, 32, 28, 0.04), 0 12px 32px -16px rgba(20, 32, 28, 0.18);
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        th {
            background: #f7f9f8;
            text-align: left;
            padding: 14px 20px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            border-bottom: 1px solid var(--line);
        }

        td {
            padding: 20px;
            border-top: 1px solid var(--line);
            vertical-align: middle;
        }

        tbody tr:first-child td { border-top: none; }
        tbody tr:hover { background: #fafbfa; }

        .col-date { width: 96px; }
        .col-status { width: 130px; }
        .col-actions { width: 170px; }

        /* Date chip */
        .date-chip {
            width: 56px;
            border: 1px solid var(--line);
            border-radius: 12px;
            text-align: center;
            overflow: hidden;
            background: #fff;
        }

        .date-chip .month {
            background: var(--honey);
            color: var(--ink);
            font-size: 12px;
            font-weight: 700;
            padding: 3px 0;
        }

        .date-chip .day {
            font-family: var(--font-display);
            font-size: 22px;
            font-weight: 700;
            line-height: 1.5;
        }

        .date-chip.is-past .month { background: #e3e8e5; color: var(--muted); }
        .date-chip.is-past .day { color: var(--muted); }

        /* Event info */
        .event-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 3px;
        }

        .event-date-text { color: var(--muted); font-size: 13px; margin-bottom: 6px; }

        .description {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.55;
            max-width: 520px;
        }

        /* Status badge */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-upcoming { background: var(--ok-bg); color: var(--ok); }
        .badge-past { background: #eef1ef; color: var(--muted); }

        /* Actions */
        .actions { display: flex; gap: 8px; }
        .actions form { display: inline; }

        /* Empty state */
        .empty {
            text-align: center;
            padding: 64px 24px;
        }

        .empty-icon { width: 56px; height: 56px; margin-bottom: 16px; }

        .empty h2 {
            font-family: var(--font-display);
            font-size: 22px;
            margin-bottom: 6px;
        }

        .empty p { color: var(--muted); margin-bottom: 22px; }

        /* Mobile: rows become stacked cards */
        @media (max-width: 800px) {
            .navbar { padding: 14px 5%; }

            .header { flex-direction: column; align-items: flex-start; }
            .header h1 { font-size: 28px; }

            table, tbody, tr, td { display: block; width: 100%; }
            thead { display: none; }

            tr { padding: 18px; border-top: 1px solid var(--line); }
            tbody tr:first-child { border-top: none; }

            td { padding: 0; border: none; }
            td + td { margin-top: 12px; }

            .col-date, .col-status, .col-actions { width: 100%; }
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

    <div class="header">
        <div>
            <h1>Events</h1>
            <p>Manage the community events on HiveSpace.</p>
        </div>

        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
            + Create event
        </a>
    </div>

    @if(session('success'))
        <div class="success" role="status">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        @if($events->count())

            <table>
                <thead>
                    <tr>
                        <th class="col-date">Date</th>
                        <th>Event</th>
                        <th class="col-status">Status</th>
                        <th class="col-actions">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($events as $event)

                        @php
                            $date = \Carbon\Carbon::parse($event->event_date);
                            $isPast = $date->copy()->startOfDay()->lt(today());
                        @endphp

                        <tr>
                            <td class="col-date">
                                <div class="date-chip {{ $isPast ? 'is-past' : '' }}">
                                    <div class="month">{{ $date->format('M') }}</div>
                                    <div class="day">{{ $date->format('d') }}</div>
                                </div>
                            </td>

                            <td>
                                <div class="event-title">{{ $event->title }}</div>
                                <div class="event-date-text">{{ $date->format('l, F j, Y') }}</div>
                                <div class="description">
                                    {{ \Illuminate\Support\Str::limit($event->description, 140) }}
                                </div>
                            </td>

                            <td class="col-status">
                                @if($isPast)
                                    <span class="badge badge-past">Past</span>
                                @else
                                    <span class="badge badge-upcoming">Upcoming</span>
                                @endif
                            </td>

                            <td class="col-actions">
                                <div class="actions">

                                    <a
                                        href="{{ route('admin.events.edit', $event) }}"
                                        class="btn btn-sm btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.events.destroy', $event) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-delete"
                                            onclick="return confirm('Are you sure you want to delete this event?')"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        @else

            <div class="empty">
                <svg class="empty-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <polygon points="12,2 21,7 21,17 12,22 3,17 3,7" fill="#fff6dc" stroke="#f5b301" stroke-width="1.2" stroke-linejoin="round"/>
                </svg>

                <h2>No events yet</h2>
                <p>Create your first HiveSpace event to get started.</p>

                <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                    + Create event
                </a>
            </div>

        @endif

    </div>

</div>

</body>
</html>