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
        <h1>All Users</h1>
        <article class="uk-tile uk-tile-default">

            <div class="uk-overflow-auto">

                <table class="uk-table uk-table-divider uk-table-hover uk-table-middle uk-table-justify">
                    <thead>
                        <tr>
                            <th></th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Phone</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="uk-table-link">
                                <a href="#" target="_blank" class="uk-link-reset">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>

                            <td>{{ $user->phone }}</td>

                            <td>
                                <a href="{{ route('admin.show', $user->id) }}"></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
    </main>
</body>

</html>
