<li class="mb-5">

    <div wire:loading> 
        Guardando, por favor espere...
    </div>

    <div wire:loading.remove>
        <input type="checkbox" wire:model="completed" />
        @if ($completed)
            <span class="line-through text-green-700"> Resuelta </span>
        @else
            <span class="text-red-700"> No resuelta </span>
        @endif
        <flux:input wire:model="title" type="text" class="mb-1" />
        <flux:button type="button" wire:click="update()"> Modificar </flux:button>
        <flux:button type="button" wire:click="destroy()"> Eliminar </flux:button>
    </div>
</li>