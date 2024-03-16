@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
    <style>
        .error_message{
            color: red;
            font-size: 0, 8rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('task.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT') <!-- Usado Para Editar -->
        <div>
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div> 

        <div>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Descrição</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Update Task</button>
        </div>  
    </form>
@endsection