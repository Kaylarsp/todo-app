<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-900 text-gray-300">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-gray-100 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <div class="text-xl font-semibold flex items-center">
                <span class="text-blue-500 font-bold">To-Do</span> App
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-8">
        <div class="max-w-lg mx-auto bg-gray-800 text-gray-200 rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold text-center text-blue-500 mb-6">To-Do List</h2>

            <!-- Form Input -->
            <form action="/add" method="POST" class="flex items-center space-x-3 mb-6">
                @csrf
                <input type="text" name="task" class="flex-1 p-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-2 focus:ring-blue-400" placeholder="Tambahkan tugas...">
                <button type="submit" class="text-gray-900 px-4 py-2 rounded-md hover:bg-blue-500 transition font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m-8-8h16" />
                    </svg>
                </button>
            </form>

            <!-- Task List -->
            <ul>
                @foreach ($tasks as $index => $task)
                <li class="flex justify-between items-center p-4 bg-gray-700 rounded-md mb-2">
                    <span class="text-white">{{ $task }}</span>
                    <div class="flex gap-3">
                        <a href="/edit/{{ $index }}" class="relative group text-blue-400 hover:text-blue-300 transition">
                            <!-- Icon Pensil -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M4 16.5V20h3.5l10.768-10.768-3.536-3.536L4 16.5z" />
                            </svg>

                            <!-- Tooltip muncul saat hover -->
                            <span class="absolute left-1/2 -translate-x-1/2 top-8 opacity-0 group-hover:opacity-100 bg-gray-800 text-white text-xs rounded-md px-2 py-1 transition">
                                Edit
                            </span>
                        </a>
                        <form action="/delete/{{ $index }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:text-blue-400 transition flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </main>
</body>

</html>