@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="text-center text-light my-4">
            <h2 class="mb-4">Add Todo</h2>
        </header>

        {{-- <form action="{{ route('todo.store') }}" method="POST" class="col-md-6 mx-auto" style="margin-top: 80px;">
            @csrf
            <div class="mb-3">
                <label class="form-label text-light">To-Do Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter task name" required
                    style="background-color: #ffffff; color: #000;">
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Date & Time</label>
                <input type="datetime-local" name="datetime" class="form-control" required
                    style="background-color: #ffffff; color: #000;">
            </div>
            <div class="text-center" style="margin-top: 50px;">
                <button type="submit" class="btn btn-primary">Add To-Do</button>
            </div>

        </form> --}}
        @include('to-do.form')
    </div>
@endsection
