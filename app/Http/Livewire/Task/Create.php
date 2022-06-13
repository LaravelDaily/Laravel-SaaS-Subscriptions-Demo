<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Create extends Component
{
    public Task $task;

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.task.create');
    }

    public function submit()
    {
        $this->validate();

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
