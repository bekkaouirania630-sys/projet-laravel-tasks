@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Task</h1>

@if ($errors->any())
<div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label class="block font-semibold mb-1">Title</label>
        <input type="text" name="title" class="w-full border px-3 py-2 rounded" value="{{ old('title', $task->title) }}" required>
    </div>
    <div class="mb-4">
        <label class="block font-semibold mb-1">Description</label>
        <textarea name="description" class="w-full border px-3 py-2 rounded" rows="4" required>{{ old('description', $task->description) }}</textarea>
    </div>
    <div class="mb-4 flex items-center">
        <input type="checkbox" name="is_completed" value="1" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }} class="mr-2">
        <label class="font-semibold">Terminer</label>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Task</button>
    <a href="{{ route('tasks.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</form>
@endsection
