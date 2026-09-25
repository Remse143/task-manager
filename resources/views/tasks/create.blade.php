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

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('tasks.store') }}"
              method="POST">

            @csrf


            <div class="form-group">

                <label>
                    Task Title
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    placeholder="Enter task title"
                    required>

            </div>


            <div class="form-group">

                <label>
                    Description
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Enter task description">{{ old('description') }}</textarea>

            </div>


            <div class="form-group">

                <label>
                    Due Date
                </label>

                <input
                    type="date"
                    name="due_date"
                    class="form-control"
                    value="{{ old('due_date') }}">

            </div>


            <button type="submit"
                    class="btn btn-primary">

                Save Task

            </button>


            <a href="{{ route('tasks.index') }}"
               class="btn btn-secondary">

                Cancel

            </a>

        </form>

    </div>

</div>

@endsection