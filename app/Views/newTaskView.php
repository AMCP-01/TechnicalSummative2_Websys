<h1>New Task</h1>

<form action="<?= site_url('index.php/tasks/create') ?>" method="post">

    <label>Title</label>
    <input type="text" name="title" value="<?= old('title') ?>" required>

    <label>Status</label>
    <select name="status">
        <option value="pending">Pending</option>
        <option value="in progress">In Progress</option>
        <option value="completed">Completed</option>
    </select>

    <label>Task Date</label>
    <input type="date" name="task_date" value="<?= old('task_date') ?>" required>

    <button type="submit">Create Task</button>
</form>