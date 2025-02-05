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