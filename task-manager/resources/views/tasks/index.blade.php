@extends('layout')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">All Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Task</a>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<table class="min-w-full bg-white shadow-md rounded overflow-hidden">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="py-2 px-4 text-left">#</th>
            <th class="py-2 px-4 text-left">Title</th>
            <th class="py-2 px-4 text-left">Content</th>
            <th class="py-2 px-4 text-left">Actions</th>
            <th class="py-2 px-4 text-left">Done</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tasks as $task)
        <tr class="border-b">
            <td class="py-2 px-4">{{ $task->id }}</td>
            <td class="py-2 px-4">{{ $task->title }}</td>
            <td class="py-2 px-4">{{ $task->description }}</td>
            <td class="py-2 px-4 space-x-2">
                <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
            <td class="py-2 px-4 text-center">
                {{ $task->is_completed ? 'Terminé' : 'En cours' }}
            </td>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center py-4">No tasks found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
