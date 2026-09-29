@extends('layouts.app')

@section('content')

<div class="form-container">

    <div class="form-card">

        <h1>➕ Add Task</h1>

        <p>Create a new task.</p>

        @if($errors->any())
            <div class="error-box">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="task_name">Task Title</label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    class="form-control"
                    value="{{ old('task_name') }}"
                    placeholder="Enter task name"
                    required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                    class="form-control"
                    placeholder="Enter task description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    class="form-control"
                    value="{{ old('due_date') }}">
            </div>

            <button type="submit" class="btn btn-primary">
                Save Task
            </button>

            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection