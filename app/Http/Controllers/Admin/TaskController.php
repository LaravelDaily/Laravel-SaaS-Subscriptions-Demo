<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.task.index');
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.task.create');
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.task.edit', compact('task'));
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.task.show', compact('task'));
    }
}
