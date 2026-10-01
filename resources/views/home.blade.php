<!DOCTYPE html>
<html>
<head>
    <title>HiveSpace Events</title>
</head>
<body>

    <h1>Upcoming Events</h1>

    @foreach ($events as $event)
        <div>
            <h2>{{ $event->title }}</h2>
            <p>{{ $event->event_date }}</p>
        </div>
    @endforeach

</body>
</html>