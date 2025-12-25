@extends('layout')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Task</a>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

{{-- Pending Tasks --}}
<h2 class="text-xl font-bold mb-2 text-yellow-600">Pending Tasks</h2>
<table class="min-w-full bg-white shadow-md rounded mb-8">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="py-2 px-4">Title</th>
            <th class="py-2 px-4">Content</th>
            <th class="py-2 px-4">Actions</th>
            <th class="py-2 px-4">Done</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tasks as $task)
            @if(!$task->is_completed)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $task->title }}</td>
                <td class="py-2 px-4">{{ $task->content }}</td>
                <td class="py-2 px-4">
    <div class="flex justify-center space-x-2">
        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</td>
                <td class="py-2 px-4 text-center">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="title" value="{{ $task->title }}">
                        <input type="hidden" name="content" value="{{ $task->content }}">
                        <input type="checkbox" name="is_completed" onchange="this.form.submit()">
                    </form>
                </td>
            </tr>
            @endif
        @empty
        <tr>
            <td colspan="4" class="text-center py-4">No pending tasks</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- Completed Tasks --}}
<h2 class="text-xl font-bold mb-2 text-green-600">Completed Tasks</h2>
<table class="min-w-full bg-white shadow-md rounded">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="py-2 px-4">Title</th>
            <th class="py-2 px-4">Content</th>
            <th class="py-2 px-4">Actions</th>
            <th class="py-2 px-4">Done</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tasks as $task)
            @if($task->is_completed)
            <tr class="border-b bg-green-50">
                <td class="py-2 px-4">{{ $task->title }}</td>
                <td class="py-2 px-4">{{ $task->content }}</td>
               <td class="py-2 px-4">
    <div class="flex justify-center space-x-2">
        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</td>
                <td class="py-2 px-4 text-center">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="title" value="{{ $task->title }}">
                        <input type="hidden" name="content" value="{{ $task->content }}">
                        <input type="checkbox" name="is_completed" onchange="this.form.submit()" checked>
                    </form>
                </td>
            </tr>
            @endif
        @empty
        <tr>
            <td colspan="4" class="text-center py-4">No completed tasks</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
