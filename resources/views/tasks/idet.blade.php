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


            <div class="form-group">

                <label>
                    Task Title
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ $task->title }}"
                    required>

            </div>


            <div class="form-group">

                <label>
                    Description
                </label>

                <textarea
                    name="description"
                    class="form-control">{{ $task->description }}</textarea>

            </div>


            <div class="form-group">

                <label>
                    Due Date
                </label>

                <input
                    type="date"
                    name="due_date"
                    class="form-control"
                    value="{{ $task->due_date }}">

            </div>


            <div class="form-group">

                <label>
                    Status
                </label>

                <select name="status"
                        class="form-control">

                    <option value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}>

                        Pending

                    </option>

                    <option value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}>

                        Completed

                    </option>

                </select>

            </div>


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