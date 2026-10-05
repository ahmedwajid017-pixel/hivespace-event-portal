<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HiveSpace Events</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f2f4f3;
            --surface: #ffffff;
            --ink: #14201c;
            --muted: #4f5f58;
            --line: #dfe5e2;
            --brand: #0f5c4d;
            --brand-hover: #0b4a3e;
            --honey: #f5b301;
            --focus: rgba(15, 92, 77, 0.28);
            --font-display: "Bricolage Grotesque", "Segoe UI", system-ui, sans-serif;
            --font-body: "DM Sans", "Segoe UI", system-ui, -apple-system, sans-serif;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { font-size: 17px; }

        body {
            font-family: var(--font-body);
            background: var(--bg);
            color: var(--ink);
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
        }

        a:focus-visible {
            outline: 3px solid var(--focus);
            outline-offset: 3px;
            border-radius: 6px;
        }

        /* Navbar */
        .navbar {
            background: var(--surface);
            border-bottom: 1px solid var(--line);
            padding: 18px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: var(--font-display);
            font-size: 1.45rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            color: var(--ink);
            text-decoration: none;
        }

        .logo svg { width: 30px; height: 30px; }

        .nav-link {
            color: var(--ink);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 8px 4px;
            border-bottom: 2px solid transparent;
        }

        .nav-link:hover { border-bottom-color: var(--honey); }

        /* Hero */
        .hero {
            background: var(--ink);
            color: #fff;
            padding: 88px 8% 96px;
            position: relative;
            overflow: hidden;
        }

        .hero-inner {
            max-width: 760px;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-family: var(--font-display);
            font-size: clamp(2.4rem, 5.5vw, 3.6rem);
            font-weight: 700;
            line-height: 1.08;
            letter-spacing: -0.025em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            line-height: 1.65;
            color: #c9d6d0;
            max-width: 600px;
            margin-bottom: 32px;
        }

        .hero-cta {
            display: inline-block;
            background: var(--honey);
            color: var(--ink);
            font-weight: 700;
            font-size: 1.05rem;
            text-decoration: none;
            padding: 14px 26px;
            border-radius: 10px;
            transition: background 0.15s;
        }

        .hero-cta:hover { background: #ffc61f; }

        .hero-mark {
            position: absolute;
            right: -60px;
            top: 50%;
            width: 440px;
            height: 440px;
            transform: translateY(-50%);
            opacity: 0.16;
        }

        /* Events */
        .events-section { padding: 72px 8% 80px; }

        .section-title { margin-bottom: 36px; max-width: 640px; }

        .section-title h2 {
            font-family: var(--font-display);
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.15;
            margin-bottom: 8px;
        }

        .section-title p { color: var(--muted); font-size: 1.1rem; }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
            gap: 28px;
        }

        .event-card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 28px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 1px 2px rgba(20, 32, 28, 0.04), 0 12px 28px -18px rgba(20, 32, 28, 0.22);
            transition: border-color 0.15s;
        }

        .event-card:hover { border-color: var(--brand); }

        .card-top {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .date-chip {
            flex: 0 0 auto;
            width: 62px;
            border: 1px solid var(--line);
            border-radius: 12px;
            text-align: center;
            overflow: hidden;
            background: #fff;
        }

        .date-chip .month {
            background: var(--honey);
            color: var(--ink);
            font-size: 0.85rem;
            font-weight: 700;
            padding: 3px 0;
        }

        .date-chip .day {
            font-family: var(--font-display);
            font-size: 1.6rem;
            font-weight: 700;
            line-height: 1.5;
        }

        .date-chip.is-past .month { background: #e3e8e5; color: var(--muted); }
        .date-chip.is-past .day { color: var(--muted); }

        .date-text { font-size: 0.95rem; color: var(--muted); font-weight: 500; line-height: 1.4; }

        .event-card h3 {
            font-family: var(--font-display);
            font-size: 1.45rem;
            font-weight: 700;
            line-height: 1.25;
            letter-spacing: -0.01em;
            margin-bottom: 10px;
        }

        .event-card p {
            color: var(--muted);
            font-size: 1.02rem;
            line-height: 1.65;
            margin-bottom: 24px;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .event-button {
            margin-top: auto;
            align-self: flex-start;
            display: inline-block;
            background: var(--brand);
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 700;
            padding: 12px 22px;
            border-radius: 10px;
            transition: background 0.15s;
        }

        .event-button:hover { background: var(--brand-hover); }

        /* Empty state */
        .empty {
            background: var(--surface);
            border: 1px dashed #c4cec9;
            border-radius: 16px;
            text-align: center;
            padding: 64px 24px;
        }

        .empty h3 { font-family: var(--font-display); font-size: 1.5rem; margin-bottom: 6px; }
        .empty p { color: var(--muted); font-size: 1.05rem; }

        /* Footer */
        .footer {
            background: var(--ink);
            color: #c9d6d0;
            text-align: center;
            padding: 28px 8%;
            font-size: 0.95rem;
        }

        @media (max-width: 700px) {
            .navbar { padding: 16px 5%; }
            .hero { padding: 56px 5% 64px; }
            .hero-mark { display: none; }
            .events-section { padding: 48px 5% 56px; }
            .section-title h2 { font-size: 1.9rem; }
            .events-grid { grid-template-columns: 1fr; }
            .event-card { padding: 24px; }
        }

        @media (prefers-reduced-motion: reduce) {
            * { transition: none !important; }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="/" class="logo">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="12,2 21,7 21,17 12,22 3,17 3,7" fill="#f5b301"/>
            </svg>
            HiveSpace
        </a>
        <a href="/" class="nav-link">Home</a>
    </nav>

    <section class="hero">
        <svg class="hero-mark" viewBox="0 0 24 24" aria-hidden="true">
            <polygon points="12,2 21,7 21,17 12,22 3,17 3,7" fill="none" stroke="#f5b301" stroke-width="0.6" stroke-linejoin="round"/>
            <polygon points="12,6 17.5,9 17.5,15 12,18 6.5,15 6.5,9" fill="#f5b301"/>
        </svg>

        <div class="hero-inner">
            <h1>Discover what's happening at HiveSpace</h1>
            <p>
                Browse upcoming community events, meet other members,
                and find something to join.
            </p>
            <a href="#events" class="hero-cta">Browse events</a>
        </div>
    </section>

    <section class="events-section" id="events">

        <div class="section-title">
            <h2>Upcoming events</h2>
            <p>Pick an event to see the details and join in.</p>
        </div>

        @if ($events->count())

            <div class="events-grid">

                @foreach ($events as $event)

                    @php
                        $date = \Carbon\Carbon::parse($event->event_date);
                        $isPast = $date->copy()->startOfDay()->lt(today());
                    @endphp

                    <article class="event-card">

                        <div class="card-top">
                            <div class="date-chip {{ $isPast ? 'is-past' : '' }}">
                                <div class="month">{{ $date->format('M') }}</div>
                                <div class="day">{{ $date->format('d') }}</div>
                            </div>

                            <div class="date-text">
                                {{ $date->format('l') }}<br>
                                {{ $date->format('F j, Y') }}
                            </div>
                        </div>

                        <h3>{{ $event->title }}</h3>

                        <p>{{ $event->description }}</p>

                        <a href="{{ route('events.show', $event) }}" class="event-button">
                            View event
                        </a>

                    </article>

                @endforeach

            </div>

        @else

            <div class="empty">
                <h3>No events right now</h3>
                <p>New events will show up here. Check back soon.</p>
            </div>

        @endif

    </section>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} HiveSpace. All rights reserved.</p>
    </footer>

</body>
</html>