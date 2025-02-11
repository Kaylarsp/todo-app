<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-300">
    <main class="container mx-auto p-8">
        <div class="max-w-lg mx-auto bg-gray-800 text-gray-200 rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold text-center text-yellow-400 mb-6">Edit Tugas</h2>

            <form action="/update/{{ $index }}" method="POST">
                @csrf
                <input type="text" name="task" value="{{ $task }}" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-2 focus:ring-yellow-400" required>
                
                <div class="flex justify-between mt-4">
                    <a href="/" class="text-gray-400 hover:text-gray-200">Batal</a>
                    <button type="submit" class="bg-yellow-500 text-gray-900 px-4 py-2 rounded-md hover:bg-yellow-600 transition font-semibold">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
