<!-- resources/views/errors/unauthorized.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unauthorized</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f4f6f8;
        }
        img {
            width: 300px;
        }
        h1 {
            font-size: 2.5rem;
            color: #555;
        }
        p {
            color: #777;
        }
    </style>
</head>
<body>
    <img src="{{ asset('images/unauthorized.png') }}" alt="Unauthorized">
    <h1>Unauthorized Access</h1>
    <p>You must be logged in to access this page.</p>
</body>
</html>
