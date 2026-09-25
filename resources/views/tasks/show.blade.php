@extends('layouts.app')

@section('content')

<div class="details-card">

    <h1>
        {{ $task->title }}
    </h1>


    <div class="detail-row">

        <strong>
            Status
        </strong>


        @if($task->status == 'Completed')

            <span class="status status-completed">
                Completed
            </span>

        @else

            <span class="status status-pending">
                Pending
            </span>

        @endif

    </div>


    <div class="detail-row">

        <strong>
            Description
        </strong>

        <p>
            {{ $task->description ?? 'No description provided.' }}
        </p>

    </div>


    <div class="detail-row">

        <strong>
            Due Date
        </strong>

        <p>

            @if($task->due_date)

                {{ \Carbon\Carbon::parse($task->due_date)->format('F d, Y') }}

            @else

                No due date

            @endif

        </p>

    </div>


    <div class="detail-row">

        <strong>
            Created
        </strong>

        <p>
            {{ $task->created_at->format('F d, Y h:i A') }}
        </p>

    </div>


    <a href="{{ route('tasks.edit', $task) }}"
       class="btn btn-warning">

        Edit

    </a>


    <a href="{{ route('tasks.index') }}"
       class="btn btn-secondary">

        Back

    </a>

</div>

@endsection