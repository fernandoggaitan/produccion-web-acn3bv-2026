<div>
    
    <h1 class="mb-5"> Lista de tareas </h1>

    <form class="mb-5" wire:submit="add()">
        <flux:input wire:model="title" type="text" class="mb-1" placeholder="Ingrese el título de la tarea" />
        <flux:button type="submit"> Agregar </flux:button>
    </form>

    <form class="mb-5">
        <flux:input wire:model.live.debounce.2000ms="search" type="text" class="mb-1" placeholder="Ingrese la tarea a buscar" />
    </form>

    <div wire:loading> 
       Actualizando lista de tareas...
    </div>

    <ul wire:loading.remove>
        @foreach($tasks as $task)
            <li class="mb-3">
                <input type="checkbox" @checked($task->completed) wire:change="change({{ $task }})" />
                {{ $task->title }} 
            </li>
        @endforeach
    </ul>

</div>
