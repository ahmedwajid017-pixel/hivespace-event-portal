<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Event - HiveSpace</title>

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
            max-width: 750px;
            margin: 45px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }

        h1 {
            margin-bottom: 8px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        @media (max-width: 600px) {
            .card {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">HiveSpace</div>
</nav>

<div class="container">

    <div class="card">

        <h1>Edit Event</h1>

        <p class="subtitle">
            Update the details of this community event.
        </p>

        @if ($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:15px;border-radius:8px;margin-bottom:20px;">
                <strong>Please fix the following:</strong>

                <ul style="margin:10px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.events.update', $event) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Event Title</label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $event->title) }}"
                    placeholder="Enter event title"
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Describe your event..."
                >{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date</label>

                <input
                    type="date"
                    id="event_date"
                    name="event_date"
                    value="{{ old('event_date', $event->event_date) }}"
                >
            </div>

            <div class="actions">

                <button type="submit" class="btn btn-primary">
                    Update Event
                </button>

                <a
                    href="{{ route('admin.events.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>