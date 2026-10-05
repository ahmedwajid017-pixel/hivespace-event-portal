<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $event->title }} - HiveSpace</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .navbar {
            background: #111827;
            color: white;
            padding: 18px 8%;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 850px;
            margin: 45px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .date {
            color: #2563eb;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .description {
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 35px;
        }

        .form-title {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }

        .btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .errors {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">HiveSpace</div>
</nav>

<div class="container">

    <div class="card">

        <h1>{{ $event->title }}</h1>

        <div class="date">
            Date: {{ $event->event_date }}
        </div>

        <div class="description">
            {{ $event->description }}
        </div>

        <h2 class="form-title">Register for this Event</h2>

        @if ($errors->any())
            <div class="errors">
                <strong>Please fix the following:</strong>

                <ul style="margin: 10px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.register', $event) }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="name">Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your name"
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                >
            </div>

            <button type="submit" class="btn">
                Register Now
            </button>

        </form>

    </div>

</div>

</body>
</html>