@extends('layouts.app')
@section('title', 'Tarefas')
@section('content')
   
        @forelse($tasks as $task)
            <div>
                <a href="{{ route('task.show', ['id' => $task->id]) }}"><h3>{{ $task->title }}</h3></a>
            </div>
        @empty
            <p>Sem Tarefas Disponiveis</p>
        @endforelse  
        
@endsection