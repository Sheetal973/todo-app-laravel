@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="text-center text-light my-4">
            <h1 class="mb-4">Todo List</h1>

            <form id="searchForm" class="search d-flex justify-content-center align-items-center gap-2" method="GET"
                action="{{ route('home') }}">

                <input id="searchInput" class="form-control" type="text" name="search" placeholder="Search todos"
                    value="{{ request('search') }}" style="width: 250px;" />

                <a href="{{ route('add.todo') }}" class="btn btn-primary">Add</a>
            </form>
        </header>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($todos->count() > 0)
            <ul class="list-group todos mx-auto text-light">
                @foreach ($todos as $todo)
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center position-relative {{ $todo->is_completed ? 'bg-success bg-opacity-12' : '' }}">
                        <div class="d-flex flex-column">
                            <span>{{ $todo->name }}</span>
                            <small class="{{ $todo->is_completed ? 'text-white' : 'text-muted' }}"
                                style="font-size: 18px !important;">
                                {{ \Carbon\Carbon::parse($todo->datetime)->format('d M Y • h:i A') }}
                            </small>

                        </div>

                        <div>
                            {{-- Toggle --}}
                            @if ($todo->is_completed == 1)
                                <a href="{{ route('todo.toggle', $todo->id) }}"
                                    onclick="return confirm('Mark this task as pending?')"
                                    style="color: inherit; text-decoration: none;">
                                    <i class="fas fa-circle-check toggle-status {{ $todo->is_completed ? 'text-white' : 'text-success' }} mx-2"
                                        title="Mark as Pending"></i>
                                </a>
                            @else
                                <a href="{{ route('todo.toggle', $todo->id) }}"
                                    onclick="return confirm('Mark this task as completed?')"
                                    style="color: inherit; text-decoration: none;">
                                    <i class="fas fa-clock toggle-status text-warning mx-2" title="Mark as Completed"></i>
                                </a>
                            @endif

                            {{-- Edit --}}
                            <a href="{{ route('todo.edit', $todo->id) }}" style="text-decoration: none; color: inherit;">
                                <i class="far fa-edit edit mx-2" title="Edit"></i>
                            </a>

                            {{-- Delete --}}
                            <a href="{{ route('todo.delete', $todo->id) }}"
                                onclick="return confirm('Are you sure you want to delete?')"
                                style="text-decoration: none; color: #e63946;">
                                <i class="far fa-trash-alt delete mx-2" title="Delete"></i>
                            </a>
                        </div>

                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center text-light mt-5" style="font-size: 22px;">
                No to-do items yet — start by adding your first task! 📝
            </p>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        let timer;

        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');

        searchInput.addEventListener('input', function() {
            clearTimeout(timer);

            timer = setTimeout(() => {
                searchForm.submit();
            }, 500);
        });
    </script>

    <script>
        // Auto-hide success messages after 3 seconds
        setTimeout(() => {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.style.transition = "0.5s";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }
        }, 2000);
    </script>
@endpush
