<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use OverflowException;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class Create extends Component
{
    public Task $task;

    public string $subscriptionPlan = '';

    public function mount(Task $task)
    {
        $this->task = $task;

        $this->subscriptionPlan = auth()->user()->subscription->plan->name ?? null;
    }

    public function render()
    {
        return view('livewire.task.create');
    }

    public function submit()
    {
        $this->validate();

        $feature = match ($this->subscriptionPlan) {
            'Silver Monthly', 'Silver Yearly', 'Trial' => 'manage-tasks-limited',
            'Gold Monthly', 'Gold Yearly'              => 'manage-tasks-unlimited',
        };

        try {
            auth()->user()->consume($feature, 1);
        } catch (OverflowException $e) {
            $message = match ($this->subscriptionPlan) {
                'Silver Monthly', 'Silver Yearly' => 'You can create only 10 tasks on Silver plan',
                'Trial'                           => "You can create only 3 tasks on Free Trial, please [<a href='/admin/plan/' class='hover:underline'>choose your plan</a>]",
            };

            return redirect()->route('admin.tasks.index')->with('status', $message);
        }

        $this->task->save();

        return redirect()->route('admin.tasks.index');
    }

    protected function rules(): array
    {
        return [
            'task.task' => [
                'string',
                'required',
            ],
        ];
    }
}
