<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
</head>
<body>

    <h1>Create New Event</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.events.store') }}" method="POST">

        @csrf

        <div>
            <label>Event Title</label>
            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
            >
        </div>

        <br>

        <div>
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <br>

        <div>
            <label>Event Date</label>
            <input
                type="date"
                name="event_date"
                value="{{ old('event_date') }}"
            >
        </div>

        <br>

        <button type="submit">Create Event</button>

    </form>

    <br>

    <a href="{{ route('admin.events.index') }}">Back to Events</a>

</body>
</html>