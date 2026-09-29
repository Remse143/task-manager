@extends('layouts.app')

@section('content')

<div class="form-container">

    <div class="form-card">

        <h1>✏️ Edit Task</h1>

        <p>Update your task information.</p>


        @if($errors->any())

            <div class="error-box">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('tasks.update', $task) }}"
              method="POST">

            @csrf

            @method('PUT')


            <!-- Task Name -->
            <div class="form-group">

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    class="form-control"
                    value="{{ old('task_name', $task->task_name) }}"
                    required>

            </div>


            <!-- Description -->
            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    class="form-control">{{ old('description', $task->description) }}</textarea>

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
                    class="form-control"
                    value="{{ old('due_date', $task->due_date) }}">

            </div>


            <!-- Status -->
            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    class="form-control">

                    <option value="Pending"
                        {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

            </div>


            <!-- Buttons -->
            <button type="submit"
                    class="btn btn-primary">

                Update Task

            </button>


            <a href="{{ route('tasks.index') }}"
               class="btn btn-secondary">

                Cancel

            </a>

        </form>

    </div>

</div>

@endsection