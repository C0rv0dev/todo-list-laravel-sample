@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="d-flex flex-column card-body">
                        @foreach ($todos as $todo)
                            <div class="mb-2 accordion" id="todoAccordion{{ $todo->id }}">
                                <div class="accordion-item">
                                    <h2 
                                        id="flush{{$todo->id}}" 
                                        class="accordion-header"
                                    >
                                        <button 
                                            class="accordion-button collapsed" 
                                            type="button" 
                                            data-bs-toggle="collapse"
                                            data-bs-target="#item{{ $todo->id }}" 
                                            aria-expanded="false"
                                            aria-controls="item{{ $todo->id }}"
                                        >
                                            {{ $todo->title }}
                                        </button>
                                    </h2>
                                    <div 
                                        id="item{{ $todo->id }}" 
                                        class="accordion-collapse collapse"
                                        aria-labelledby="flush{{$todo->id}}" 
                                        data-bs-parent="#todoAccordion{{ $todo->id }}"
                                    >
                                        <div class="accordion-body">
                                            {{ $todo->content }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
