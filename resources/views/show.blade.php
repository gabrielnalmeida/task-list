@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('task.index') }}"
            class="link">🡨 Voltar para a lista de tarefas</a>
    </div>

    <p class="mb-4 text-slate-700">{{$task->description}}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">
        Criado {{$task->created_at->diffForHumans() }} • Atualizado {{$task->updated_at->diffForHumans() }}
    </p>


    <p class="mb-4">
        @if($task->completed)
            <span class="font-medium text-green-500">Completa</span>
        @else
            <span class="font-medium text-red-500">Incompleta </span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('task.edit', ['task' => $task]) }}"
        class="btn">Editar</a>

        <form action="{{ route('task.complete', ['task' => $task]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Marcar como 
                {{ $task->completed ? 'Incompleta' : 'Completa' }}
            </button>
        </form>
 
        <form action="{{ route('task.delete', ['task' => $task]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn">Excluir</button>
        </form> 
    </div>
@endsection