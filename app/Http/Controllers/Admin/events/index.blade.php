<!DOCTYPE html>
<html>
<head>
    <title>Admin Events</title>
</head>
<body>

    <h1>Admin Events</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.events.create') }}">Create New Event</a>

    <hr>

    @forelse($events as $event)

        <h2>{{ $event->title }}</h2>

        <p>{{ $event->description }}</p>

        <p>
            Date: {{ $event->event_date }}
        </p>

        <a href="{{ route('admin.events.edit', $event) }}">
            Edit
        </a>

        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')

            <button type="submit">Delete</button>
        </form>

        <hr>

    @empty

        <p>No events found.</p>

    @endforelse

</body>
</html>