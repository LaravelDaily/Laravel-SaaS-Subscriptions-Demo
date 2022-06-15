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

        $subscriptionPlan = auth()->user()->subscription->plan->name ?? null;

        if ($subscriptionPlan === null) {
            return redirect()->route('admin.tasks.index')->with('status', 'You have no active plan.');
        }

        $feature = match ($subscriptionPlan) {
            'Silver Monthly', 'Silver Yearly', 'Trial' => 'manage-tasks-limited',
            'Gold Monthly', 'Gold Yearly'              => 'manage-tasks-unlimited',
        };

        if (auth()->user()->cantConsume($feature, 1)) {
            $message = match ($subscriptionPlan) {
                'Silver Monthly', 'Silver Yearly' => 'You can create only 10 tasks on Silver plan',
                'Trial'                           => "You can create only 3 tasks on Free Trial, please [<a href='/admin/plan/' class='hover:underline'>choose your plan</a>]",
            };

            return redirect()->route('admin.tasks.index')->with('status', $message);
        }

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
