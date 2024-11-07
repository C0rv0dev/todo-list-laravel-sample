@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create To-do</div>

            <div class="card-body">
                <form action="{{ route('todo.store') }}" method="POST">
                    <label for="title">To-do Title</label>
                    <input placeholder="e.g. Wash" class="form-control w-100 mb-2" type="text" name="title" id="title">

                    <label for="content">To-do Content</label>
                    <textarea placeholder="e.g. Do laundry" class="mb-2 form-control" name="content" id="content" cols="30" rows="10"></textarea>

                    <label for="priority">Priority</label>
                    <select class="form-select w-100 mb-2" name="priority" id="priority">
                        @foreach (App\Enums\PriorityEnum::getLabeledValues() as $value => $label)
                            <option value="{{ $value }}">
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
       </div>
@endsection
