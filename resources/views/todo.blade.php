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
                <span class="text-gold-500 font-bold">To-Do</span> App
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-8">
        <div class="max-w-lg mx-auto bg-gray-800 text-gray-200 rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold text-center text-gold-400 mb-6">To-Do List</h2>

            <!-- Form Input -->
            <form action="/add" method="POST" class="flex items-center space-x-3 mb-6">
                @csrf
                <input type="text" name="task" class="flex-1 p-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-2 focus:ring-gold-400" placeholder="Tambahkan tugas...">
                <button type="submit" class="bg-gold-500 text-gray-900 px-4 py-2 rounded-md hover:bg-gold-600 transition font-semibold flex items-center gap-2">
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
                    <form action="/delete/{{ $index }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gold-400 hover:text-gold-300 transition flex items-center gap-2">
                            Selesai
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
    </main>
</body>

</html>
