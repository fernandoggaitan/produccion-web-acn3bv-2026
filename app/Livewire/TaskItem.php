<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskItem extends Component
{

    public Task $task;
    public bool $completed;
    public string $title;

    public function mount(Task $task)
    {
        //Definimos el objeto Task
        $this->task = $task;
        //Definimos el inicio de la propiedad 'completed'
        $this->completed = $this->task->completed;
        //Definimos el inicio de la propiedad 'title'
        $this->title = $this->task->title;
    }

    public function update():void
    {
        $this->task->update([
            'title' => $this->title,
            'completed' => $this->completed
        ]);
    }

    public function destroy():void
    {

        $msj = "La tarea con el título: {$this->title} se eliminó correctamente";

        $this->task->delete();

        //Aviso al componente padre que pasó algo.
        $this->dispatch('task-deleted', $msj);

    }

    public function render()
    {
        return view('livewire.task-item');
    }

}
