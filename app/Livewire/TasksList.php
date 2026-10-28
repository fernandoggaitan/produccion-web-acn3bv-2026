<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TasksList extends Component
{

    public string $title = '';
    public string $search = '';

    public function add():void
    {

        //Agregamos una tarea a la lista.
        $task = Task::create([
            'title' => $this->title
        ]);

        $this->title = '';

    }

    public function change( Task $task ):void
    {

        //toggle
        $completed = !($task->completed);

        $task->update([
            'completed' => $completed
        ]);

    }
    
    public function render()
    {

        $tasks = Task::select( ['id', 'title', 'completed'] )
            ->when($this->search, fn(Builder $query) =>
                $query->where('title', 'like', "%{$this->search}%")
            )
            ->get();

        return view('livewire.tasks-list', [
            'tasks' => $tasks
        ]);
    }

}
