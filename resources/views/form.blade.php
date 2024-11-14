@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create To-do</div>

            <div class="card-body">
                <form action="{{ (isset($todo) && $todo->id) ? route('todo.update', $todo) : route('todo.store') }}" method="POST">
                    @csrf
                    @if (isset($todo) && $todo->id)
                        @method('PATCH')
                    @endif

                    <label for="title">To-do Title</label>
                    <input placeholder="e.g. Wash" class="form-control w-100 mb-2" type="text" name="title" id="title"
                        value="{{ old('title', (isset($todo) && $todo) ? $todo->title : '') }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label for="content">To-do Content</label>
                    <textarea placeholder="e.g. Do laundry" class="mb-2 form-control" name="content" id="content" cols="30"
                        rows="10">{{ old('content', (isset($todo) && $todo) ? $todo->content : '') }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="priority">Priority</label>
                    <select class="form-select w-100 mb-2" name="priority" id="priority">
                        @foreach (App\Enums\PriorityEnum::getLabeledValues() as $value => $label)
                            <option @if(old('priority', (isset($todo) && $todo) ? $todo->priority : 0) === $value) selected @endif value="{{ $value }}">
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    <hr />

                    <div class="d-flex justify-content-between w-100 mt-2">
                        <button class="btn btn-danger" type="button"
                            onclick="window.location.href='{{ route('home') }}'">Cancel</button>
                        <button class="btn btn-success" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
