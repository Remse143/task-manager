@extends('layouts.app')

@section('content')

<div class="container">

    <div class="page-header">

        <div>
            <h1>📋 My Tasks</h1>

            <p>
                Manage your daily tasks easily.
            </p>
        </div>

        <a href="{{ route('tasks.create') }}"
           class="btn btn-primary">

            + Add Task

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    @if($tasks->count() > 0)

        <div class="task-grid">

            @foreach($tasks as $task)

                <div class="task-card">

                    <h2>
                        {{ $task->title }}
                    </h2>


                    @if($task->status == 'Completed')

                        <span class="status status-completed">
                            Completed
                        </span>

                    @else

                        <span class="status status-pending">
                            Pending
                        </span>

                    @endif


                    <p class="task-description">

                        {{ $task->description ?? 'No description.' }}

                    </p>


                    @if($task->due_date)

                        <p>

                            📅

                            <strong>Due:</strong>

                            {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}

                        </p>

                    @endif


                    <div class="actions">

                        <a href="{{ route('tasks.show', $task) }}"
                           class="btn btn-info">

                            View

                        </a>


                        <a href="{{ route('tasks.edit', $task) }}"
                           class="btn btn-warning">

                            Edit

                        </a>


                        @if($task->status == 'Pending')

                            <form action="{{ route('tasks.complete', $task) }}"
                                  method="POST">

                                @csrf

                                @method('PUT')

                                <button class="btn btn-success">

                                    Done

                                </button>

                            </form>

                        @endif


                        <form action="{{ route('tasks.destroy', $task) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this task?');">

                            @csrf

                            @method('DELETE')

                            <button class="btn btn-danger">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">

            <h2>No Tasks Yet</h2>

            <p>
                You don't have any tasks.
            </p>

            <a href="{{ route('tasks.create') }}"
               class="btn btn-primary">

                Create Your First Task

            </a>

        </div>

    @endif

</div>

@endsection