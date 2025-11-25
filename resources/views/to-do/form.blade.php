<form action="{{ isset($todo) ? route('todo.update', $todo->id) : route('todo.store') }}" method="POST"
    class="col-md-6 mx-auto" style="margin-top: 80px;">
    @csrf

    <div class="mb-3">
        <label class="form-label text-light">To-Do Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter task name" required
            value="{{ isset($todo) ? $todo->name : old('name') }}" style="background-color: #ffffff; color: #000;">
    </div>

    <div class="mb-3">
        <label class="form-label text-light">Date & Time</label>
        <input type="datetime-local" name="datetime" class="form-control" required
            value="{{ isset($todo) ? date('Y-m-d\TH:i', strtotime($todo->datetime)) : old('datetime') }}"
            style="background-color: #ffffff; color: #000;">
    </div>

    @if (isset($todo))
        <div class="mb-3">
            <label class="form-label text-light">Status</label>
            <select name="is_completed" class="form-control" style="background-color: #ffffff; color: #000;">
                <option value="0" {{ $todo->is_completed == 0 ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ $todo->is_completed == 1 ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
    @endif

    <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-primary">
            {{ isset($todo) ? 'Update' : 'Save' }}
        </button>

        <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">
            Cancel
        </a>
    </div>
</form>
