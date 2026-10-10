<h1>Edit Task</h1>

<form action="<?= site_url('index.php/tasks/update/' . $task['id']) ?>"
      method="post">

    <label>Title</label>
    <input type="text"
           name="title"
           value="<?= esc($task['title']) ?>"
           required>

    <label>Status</label>
    <select name="status">
        <option value="pending"
            <?= $task['status'] === 'pending' ? 'selected' : '' ?>>
            Pending
        </option>

        <option value="in progress"
            <?= $task['status'] === 'in progress' ? 'selected' : '' ?>>
            In Progress
        </option>

        <option value="completed"
            <?= $task['status'] === 'completed' ? 'selected' : '' ?>>
            Completed
        </option>
    </select>

    <label>Task Date</label>
    <input type="date"
           name="task_date"
           value="<?= esc($task['task_date']) ?>"
           required>

    <button type="submit">Update Task</button>
</form>