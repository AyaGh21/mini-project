<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>
<body>

<h2>Add Task</h2>

<form method="POST" action="/tasks">
    @csrf

    <input type="text" name="title" placeholder="Title" required>
    <br><br>

    <textarea name="description" placeholder="Description"></textarea>
    <br><br>

    <input type="date" name="due_date">
    <br><br>

    <select name="status">
        <option value="pending">Pending</option>
        <option value="done">Done</option>
    </select>

    <br><br>
    <button type="submit">Save Task</button>
</form>

</body>
</html>
