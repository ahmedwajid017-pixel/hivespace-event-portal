```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HiveSpace Events</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .navbar {
            background: #ffffff;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #f59e0b;
        }

        .nav-link {
            color: #374151;
            text-decoration: none;
            font-size: 15px;
        }

        .hero {
            padding: 80px 8%;
            text-align: center;
            background: linear-gradient(135deg, #fff7ed, #fef3c7);
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 15px;
            color: #111827;
        }

        .hero p {
            font-size: 18px;
            color: #6b7280;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .events-section {
            padding: 60px 8%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #6b7280;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .event-card {
            background: white;
            border-radius: 15px;
            padding: 28px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .date {
            display: inline-block;
            background: #f59e0b;
            color: white;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .event-card h3 {
            font-size: 21px;
            margin-bottom: 12px;
            color: #111827;
        }

        .event-card p {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .event-button {
            display: inline-block;
            background: #111827;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            padding: 25px;
            background: #111827;
            color: #d1d5db;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .hero h1 {
                font-size: 36px;
            }

            .navbar {
                padding: 18px 5%;
            }

            .hero,
            .events-section {
                padding-left: 5%;
                padding-right: 5%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">HiveSpace</div>
        <a href="/" class="nav-link">Home</a>
    </nav>

    <section class="hero">
        <h1>Discover What's Happening at HiveSpace</h1>
        <p>
            Explore upcoming community events, connect with other members,
            and be part of the HiveSpace community.
        </p>
    </section>

    <section class="events-section">

        <div class="section-title">
            <h2>Upcoming Events</h2>
            <p>Find an event and join the community.</p>
        </div>

        <div class="events-grid">

            @foreach ($events as $event)

                <div class="event-card">

                    <span class="date">
                        {{ $event->event_date }}
                    </span>

                    <h3>{{ $event->title }}</h3>

                    <p>
                        {{ $event->description }}
                    </p>

                    <a href="#" class="event-button">
                        View Event
                    </a>

                </div>

            @endforeach

        </div>

    </section>

    <footer class="footer">
        <p>© {{ date('Y') }} HiveSpace. All rights reserved.</p>
    </footer>

</body>
</html>
```
