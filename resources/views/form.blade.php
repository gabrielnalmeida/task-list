@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('task.update', ['task' => $task->id]) : route('task.store')}}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" 
            @class(['border-red-500' => $errors->has('title')])
            value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" 
            @class(['border-red-500' => $errors->has('description')])
            rows="5">{{ $task->description ?? old('description') }}</textarea>
            <!-- works only with post -->
            <!-- avoid using old with sensitive information -->
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Descrição</label>
            <textarea name="long_description" id="long_description"
            @class(['border-red-500' => $errors->has('long_description')]) 
            rows="10">{{ $task->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button type="submit" class="btn">
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
            </button>
            <a href="{{route('task.index')}}" class="link">Cancelar</a>
        </div>  
    </form>
@endsection