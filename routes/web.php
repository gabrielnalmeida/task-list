<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function (){
    return view('index', [
        'tasks' => Task::latest()->paginate(10),
    ]); 
})->name('task.index');

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' =>  $task,
    ]);
})->name('task.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' =>  $task,
    ]);
})->name('task.show');

Route::post('/tasks', function (TaskRequest $request) {

   $task = Task::create($request->validated());
   
   return redirect()->route('task.show', ['task' => $task->id])
   ->with('success', 'Tarefa criada com sucesso!');
})->name('task.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
    ->with('success', 'Tarefa atualizada com sucesso!');
 })->name('task.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('task.index')
    ->with('success', 'Tarefa deletada com sucesso!');
})->name('task.delete');

Route::put('/tasks/{task}/complete', function (Task $task) {
    $task->toogleComplete();

    return redirect()->back()->with('success', 'Tarefa completada com sucesso!');
})->name('task.complete');


