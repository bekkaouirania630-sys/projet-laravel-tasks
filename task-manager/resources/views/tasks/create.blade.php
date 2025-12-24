@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add New Task</h1>

@if ($errors->any())
<div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold mb-1">Title</label>
        <input type="text" name="title" class="w-full border px-3 py-2 rounded" value="{{ old('title') }}" required>
    </div>
    <div class="mb-4">
        <label class="block font-semibold mb-1">Content</label>
        <textarea name="content" class="w-full border px-3 py-2 rounded" rows="4" required>{{ old('content') }}</textarea>
    </div>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add Task</button>
    <a href="{{ route('tasks.index') }}" class="bg-yellow-200 px-4 py-2  ml-2 text-gray-600 hover:underline">Cancel</a>
</form>
@endsection
