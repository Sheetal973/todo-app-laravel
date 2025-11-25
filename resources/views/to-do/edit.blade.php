@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="text-center text-light my-4">
            <h2 class="mb-4">Edit Todo</h2>
        </header>
        @include('to-do.form')
    </div>
@endsection
