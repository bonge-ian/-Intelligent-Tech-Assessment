<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>
</head>

<body>
    <main class="uk-container">
        <h1>{{ $user-> name }}</h1>
        <article class="uk-tile uk-tile-default">

            <ul class="uk-list">
                <li>
                    Email: {{ $user->email }}
                </li>
                <li>
                    Phone: {{ $user->phone }}
                </li>
                <li>
                    Role: {{ implode(', ', $user->roles->pluck('name')->toArray() }}
                </li>
            </ul>
    </main>
</body>

</html>
