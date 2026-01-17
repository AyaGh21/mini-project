<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            padding: 30px;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin: auto;
            box-shadow: 0px 0px 10px #ccc;
        }
        h2 {
            text-align: center;
        }
        input, textarea, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
        }
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        .success {
            background: #d4edda;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn-edit {
            background: #0d6efd;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>✅ Task Manager</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Task Form --}}
    <form method="POST" action="/tasks">
        @csrf

        <input type="text" name="title" placeholder="Title" required>

        <textarea name="description" placeholder="Description"></textarea>

        <input type="date" name="due_date">

        <select name="status">
            <option value="pending">Pending</option>
            <option value="done">Done</option>
        </select>

        <button type="submit">➕ Add Task</button>
    </form>

    {{-- Tasks Table --}}
    <table>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Due</th>
            <th>Actions</th>
        </tr>

        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->due_date }}</td>
            <td>
                {{-- Delete --}}
                <form method="POST" action="/tasks/{{ $task->id }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">Delete</button>
                </form>

                {{-- Edit --}}
<form method="POST" action="/tasks/{{ $task->id }}" style="display:inline;">
    @csrf
    @method('PUT')
    <button class="btn-edit">Mark Done</button>
</form>

            </td>
        </tr>
        @endforeach
    </table>

</div>

</body>
</html>
