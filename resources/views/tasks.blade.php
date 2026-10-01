 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; }
        form.add { display: flex; gap: 8px; margin-bottom: 20px; }
        form.add input { flex: 1; padding: 8px; }
        button { padding: 8px 12px; cursor: pointer; }
        ul { list-style: none; padding: 0; }
        li { display: flex; align-items: center; gap: 8px; padding: 8px 0; border-bottom: 1px solid #ddd; }
        li span { flex: 1; }
        .done { text-decoration: line-through; color: gray; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>To-Do List</h1>

    <form class="add" method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="New task..." required>
        <button type="submit">Add</button>
    </form>

    @error('title') <p class="error">{{ $message }}</p> @enderror

    <ul>
        @forelse ($tasks as $task)
            <li>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf @method('PATCH')
                    <button type="submit">{{ $task->done ? '↩' : '✔' }}</button>
                </form>

                <span class="{{ $task->done ? 'done' : '' }}">{{ $task->title }}</span>

                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf @method('DELETE')
                    <button type="submit">✖</button>
                </form>
            </li>
        @empty
            <li>No tasks yet.</li>
        @endforelse
    </ul>
</body>
</html>