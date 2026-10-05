<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration Successful - HiveSpace</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
            margin: 0;
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
            max-width: 650px;
            margin: 80px auto;
        }

        .card {
            background: white;
            padding: 45px;
            border-radius: 14px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }

        .success {
            font-size: 50px;
            margin-bottom: 15px;
        }

        h1 {
            margin-bottom: 15px;
        }

        p {
            color: #6b7280;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 22px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">HiveSpace</div>
</nav>

<div class="container">

    <div class="card">

        <div class="success">✓</div>

        <h1>Thank You!</h1>

        <p>
            Thank you for registering for
            <strong>{{ $event->title }}</strong>.
        </p>

        <p>
            We look forward to seeing you at the event.
        </p>

        <a href="/" class="btn">
            Back to Events
        </a>

    </div>

</div>

</body>
</html>