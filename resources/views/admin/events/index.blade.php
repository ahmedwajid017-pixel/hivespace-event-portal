<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Events - HiveSpace</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .admin-label {
            color: #cbd5e1;
            font-size: 14px;
        }

        .container {
            width: 84%;
            max-width: 1200px;
            margin: 45px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 6px;
        }

        .header p {
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            cursor: pointer;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            text-align: left;
            padding: 16px;
            color: #475569;
            font-size: 13px;
            text-transform: uppercase;
        }

        td {
            padding: 18px 16px;
            border-top: 1px solid #e5e7eb;
            vertical-align: top;
        }

        .event-title {
            font-weight: bold;
            color: #111827;
            margin-bottom: 5px;
        }

        .description {
            color: #6b7280;
            max-width: 350px;
            line-height: 1.5;
        }

        .date {
            color: #475569;
            font-weight: 500;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background: #e0f2fe;
            color: #0369a1;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-edit:hover {
            background: #bae6fd;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        .empty {
            text-align: center;
            padding: 50px;
            color: #6b7280;
        }

        @media (max-width: 800px) {
            .container {
                width: 94%;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .card {
                overflow-x: auto;
            }

            table {
                min-width: 700px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">HiveSpace</div>
    <div class="admin-label">Admin Event Management</div>
</nav>

<div class="container">

    <div class="header">
        <div>
            <h1>Events</h1>
            <p>Manage your HiveSpace community events.</p>
        </div>

        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
            + Create Event
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        @if($events->count())

            <table>
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($events as $event)

                        <tr>
                            <td>
                                <div class="event-title">
                                    {{ $event->title }}
                                </div>
                            </td>

                            <td>
                                <div class="description">
                                    {{ $event->description }}
                                </div>
                            </td>

                            <td>
                                <div class="date">
                                    {{ $event->event_date }}
                                </div>
                            </td>

                            <td>
                                <div class="actions">

                                    <a
                                        href="{{ route('admin.events.edit', $event) }}"
                                        class="btn btn-edit"
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
                                            class="btn btn-delete"
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
                <h2>No Events Yet</h2>
                <p>Create your first HiveSpace event to get started.</p>
            </div>

        @endif

    </div>

</div>

</body>
</html>