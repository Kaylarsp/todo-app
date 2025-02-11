<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    $tasks = Session::get('tasks', []);
    return view('todo', compact('tasks'));
});

Route::post('/add', function (Request $request) {
    $task = $request->input('task');
    if ($task) {
        $tasks = Session::get('tasks', []);
        $tasks[] = $task;
        Session::put('tasks', $tasks);
    }
    return redirect('/');
});

Route::post('/delete/{index}', function ($index) {
    $tasks = Session::get('tasks', []);
    array_splice($tasks, $index, 1);
    Session::put('tasks', $tasks);
    return redirect('/');
});

Route::get('/edit/{index}', function ($index) {
    $tasks = Session::get('tasks', []);
    $task = $tasks[$index] ?? null;

    if ($task === null) {
        return redirect('/')->with('error', 'Tugas tidak ditemukan.');
    }

    return view('edit', compact('task', 'index'));
});

Route::post('/update/{index}', function (Request $request, $index) {
    $request->validate([
        'task' => 'required|string|max:255',
    ]);

    $tasks = Session::get('tasks', []);
    if (!isset($tasks[$index])) {
        return redirect('/')->with('error', 'Tugas tidak ditemukan.');
    }

    $tasks[$index] = $request->task;
    Session::put('tasks', $tasks);

    return redirect('/')->with('success', 'Tugas berhasil diperbarui.');
});