<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function (){
    return view('index', [
        'tasks' => Task::latest()->get(),
    ]); 
})->name('task.index');

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => Task::findOrFail($id),
    ]);
})->name('task.show');

Route::post('/tasks', function (Request $request) {
   $request->validate([
         'title' => 'required|max:255',
         'description' => 'required',
         'long_description' => 'required',
   ]);

   $task = new Task();
   $task->title = $request->title;
   $task->description = $request->description;
   $task->long_description = $request->long_description;
   $task->save();
   
   return redirect()->route('task.show', ['id' => $task->id])
   ->with('success', 'Tarefa criada com sucesso!');
})->name('task.store');


