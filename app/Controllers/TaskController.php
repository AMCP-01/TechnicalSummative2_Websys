<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function tasks()
    {
        $taskModel = new TaskModel();

        return view('TasksView', [
            'tasks' => $taskModel
                ->where('is_archived', 0)
                ->orderBy('task_date', 'ASC')
                ->findAll()
        ]);
    }

    public function new()
    {
        return view('newTaskView');
    }

    public function create()
    {
        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('newTaskView', [
                'validation' => $this->validator
            ]);
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status') ?: 'pending',
            'task_date'   => $this->request->getPost('task_date'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()->to('index.php/tasks');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        return view('editTaskView', [
            'task' => $taskModel->find($id)
        ]);
    }

    public function update($id)
    {
        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('index.php/tasks');
    }

    public function archive($id)
    {
        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('index.php/tasks');
    }
}