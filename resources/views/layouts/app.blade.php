<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Task Manager</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

</head>

<body>

    <nav class="navbar">

        <div class="nav-container">

            <a href="{{ route('tasks.index') }}"
               class="logo">
                Task Manager
            </a>

            <a href="{{ route('tasks.create') }}"
               class="nav-button">
                + Add Task
            </a>

        </div>

    </nav>

    <main>

        @yield('content')

    </main>

</body>

</html>