<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 80px auto;
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            background: #4f46e5;
            color: white;
            border: none;
            padding: 12px;
            font-size: 15px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background: #4338ca;
        }

        label {
            font-size: 13px;
            color: #555;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>📝 Add New Task</h2>

    <form method="POST" action="/tasks">
        @csrf

        <label>Title</label>
        <input type="text" name="title" placeholder="Enter task title" required>

        <label>Description</label>
        <textarea name="description" placeholder="Optional description"></textarea>

        <label>Due Date</label>
        <input type="date" name="due_date">

        <label>Status</label>
        <select name="status">
            <option value="pending">Pending</option>
            <option value="done">Done</option>
        </select>

        <button type="submit">Save Task</button>
    </form>
</div>

</body>
</html>
