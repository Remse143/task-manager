@extends('layouts.app')

@section('content')

<div class="container">

    <div class="details-card">

        <h1>Add New Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <!-- Task Name -->
            <div class="form-group">

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name') }}"
                    placeholder="Enter task name"
                    required
                >

                @error('task_name')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <!-- Description -->
            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Enter task description"
                >{{ old('description') }}</textarea>

                @error('description')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <!-- Due Date -->
            <div class="form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date') }}"
                >

                @error('due_date')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <!-- Buttons -->
            <div class="form-buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Add Task
                </button>


                <a
                    href="{{ route('tasks.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection