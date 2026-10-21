<x-layouts.app :title="__('Dashboard')">
    
    <h1 class="mb-3"> Hola, {{ auth()->user()->name }} </h1>

    <p class="mb-3"> Tus roles de usuario son: </p>

    <ul>
        @foreach( auth()->user()->roles as $role )
            <li class="mb-1"> {{ $role->name }} </li>
        @endforeach
    </ul>

</x-layouts.app>
