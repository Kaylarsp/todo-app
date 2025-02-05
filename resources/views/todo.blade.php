<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-500 flex justify-center items-center h-screen text-white">
    <div class="bg-gray-950 p-6 rounded-lg shadow w-[500px]">
        <h2 class="text-xl font-bold mb-4 text-white">To-Do List</h2>

        <form action="/add" method="POST" class="mb-4">
            @csrf
            <input type="text" name="task" class="text-black border p-2 w-full rounded" placeholder="Tambahkan tugas...">
            <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded mt-2 w-full">Tambah</button>
        </form>

        <ul>
            @foreach ($tasks as $index => $task)
            <li class="flex justify-between items-center p-2 border-b">
                <span>{{ $task }}</span>
                <form action="/delete/{{ $index }}" method="POST">
                    @csrf
                    <button type="submit" class="text-green-500 flex items-center gap-2">
                        Done
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>