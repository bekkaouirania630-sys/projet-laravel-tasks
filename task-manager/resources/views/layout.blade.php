<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-gray-800 text-white">
        <div class="container mx-auto flex justify-between items-center py-4">
            <a href="{{ route('tasks.index') }}" class="text-xl font-bold">Tasks App</a>
            <div class="space-x-4">
                <a href="{{ route('tasks.index') }}" class="hover:text-gray-300">All Tasks</a>
                <a href="{{ route('tasks.create') }}" class="hover:text-gray-300">Add Task</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto mt-6">
        @yield('content')
    </main>

</body>
</html>