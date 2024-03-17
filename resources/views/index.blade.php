@extends('layouts.app')
@section('title', 'Tarefas')
@section('content')

        <nav class="mb-4">
            <a href="{{ route('task.create') }}"
            class="link">Adicionar Tarefa</a>
        </nav>
        
        @forelse($tasks as $task)
            <div>
                <a href="{{ route('task.show', ['task' => $task->id]) }}"
                @class(['line-through' => $task->completed])>{{ $task->title }}</a>
            </div>
        @empty
            <p>Sem Tarefas Disponiveis</p>
        @endforelse  
        
        @if($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif
@endsection