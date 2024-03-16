@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif

    <p>Criado Em: {{$task->created_at}}</p>
    <p>Atualizado Em: {{$task->updated_at}}</p>

    <p>Tarefa Completa?: {{$task->completed ? 'Sim' : 'Não'}}</p>

    <a href="{{ route('task.index') }}">Back to tasks</a>
    <div>
        <form action="{{ route('task.delete', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form> 
    </div>
@endsection