@extends('layouts.app')

@section('content')
    <div class="container">
        <button class="btn btn-lg btn-success position-absolute bottom-0 end-0 m-5">
            <a href="{{ route('todo.create') }}" class="text-white text-decoration-none">Create Todo</a>
        </button>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="d-flex flex-column card-body">
                        @foreach ($todos as $todo)
                            <div class="mb-2 accordion" id="todoAccordion{{ $todo->id }}">
                                <div class="accordion-item">
                                    <h2 id="flush{{ $todo->id }}" class="accordion-header">
                                        <div class="d-flex justify-content-between">
                                            <div
                                                style="background: {{ $todo->priorityColor }}; min-width: 20px; min-height: 20px;">
                                            </div>
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#item{{ $todo->id }}"
                                                aria-expanded="false" aria-controls="item{{ $todo->id }}">
                                                {{ $todo->title }}
                                            </button>
                                        </div>
                                    </h2>
                                    <div id="item{{ $todo->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush{{ $todo->id }}"
                                        data-bs-parent="#todoAccordion{{ $todo->id }}">
                                        <div class="accordion-body">
                                            <div class="d-flex flex-column jusitfy-content-between">
                                                <div class="mb-2">
                                                    {{ $todo->content }}
                                                </div>
                                                <hr />
                                                <div class="d-flex justify-content-around align-items-center text-end">
                                                    <a class="btn btn-warning" href="{{ route('todo.edit', $todo) }}">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('todo.destroy', $todo) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
 
                    <div class="card-footer">
                        {{ $todos->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
